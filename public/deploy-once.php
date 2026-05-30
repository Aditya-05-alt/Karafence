<?php

/**
 * ONE-TIME DEPLOY HELPER — DELETE THIS FILE AFTER USE.
 *
 * 1. Add to your server .env:
 *    DEPLOY_SECRET=choose-a-long-random-password-here
 *
 * 2. Upload this file to public/deploy-once.php
 *
 * 3. Visit in browser:
 *    https://yourdomain.com/deploy-once.php?key=choose-a-long-random-password-here
 *
 * 4. Delete public/deploy-once.php immediately when done.
 */

declare(strict_types=1);

header('Content-Type: text/html; charset=utf-8');
header('X-Robots-Tag: noindex, nofollow');

function deploy_log(array &$logs, string $status, string $message): void
{
    $logs[] = ['status' => $status, 'message' => $message];
}

function deploy_html(array $logs, bool $success): void
{
    $title = $success ? 'Deploy completed' : 'Deploy failed';

    echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">';
    echo '<title>' . htmlspecialchars($title) . '</title>';
    echo '<style>
        body { font-family: system-ui, sans-serif; background:#0f172a; color:#e2e8f0; margin:0; padding:24px; }
        .wrap { max-width:720px; margin:0 auto; }
        h1 { color:#f8fafc; margin-bottom:8px; }
        .warn { background:#451a03; border:1px solid #d97706; color:#fed7aa; padding:12px 16px; border-radius:8px; margin:16px 0; }
        .ok { color:#4ade80; } .fail { color:#f87171; } .info { color:#93c5fd; }
        ul { list-style:none; padding:0; margin:20px 0; }
        li { padding:10px 12px; margin-bottom:8px; background:#1e293b; border-radius:8px; border-left:4px solid #334155; }
        li.ok { border-left-color:#22c55e; } li.fail { border-left-color:#ef4444; } li.info { border-left-color:#3b82f6; }
        code { background:#334155; padding:2px 6px; border-radius:4px; }
    </style></head><body><div class="wrap">';
    echo '<h1>' . htmlspecialchars($title) . '</h1>';

    if ($success) {
        echo '<div class="warn"><strong>Important:</strong> Delete <code>public/deploy-once.php</code> from your server now.</div>';
    }

    echo '<ul>';
    foreach ($logs as $log) {
        $class = htmlspecialchars($log['status']);
        echo '<li class="' . $class . '">' . htmlspecialchars($log['message']) . '</li>';
    }
    echo '</ul></div></body></html>';
}

$key = $_GET['key'] ?? '';

if (!is_string($key) || $key === '') {
    http_response_code(403);
    deploy_html([['status' => 'fail', 'message' => 'Missing key. Use: deploy-once.php?key=YOUR_DEPLOY_SECRET']], false);
    exit;
}

try {
    require __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
} catch (Throwable $e) {
    http_response_code(500);
    deploy_html([['status' => 'fail', 'message' => 'Could not boot Laravel: ' . $e->getMessage()]], false);
    exit;
}

$expected = env('DEPLOY_SECRET');

if (!$expected || $expected === 'change-me-before-deploy') {
    http_response_code(403);
    deploy_html([[
        'status' => 'fail',
        'message' => 'Set DEPLOY_SECRET in your server .env file first, then try again.',
    ]], false);
    exit;
}

if (!hash_equals($expected, $key)) {
    http_response_code(403);
    deploy_html([['status' => 'fail', 'message' => 'Invalid deploy key.']], false);
    exit;
}

$logs = [];
$failed = false;

try {
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

    deploy_run_album_migration($kernel, $logs, $failed);
    deploy_make_user_id_nullable($logs, $failed);

    deploy_log($logs, 'info', 'Creating storage link (public/storage)...');
    $linkPath = public_path('storage');
    $targetPath = storage_path('app/public');

    if (file_exists($linkPath) || is_link($linkPath)) {
        deploy_log($logs, 'ok', 'public/storage already exists — skipped.');
    } else {
        $linkExit = $kernel->call('storage:link');
        $linkOutput = trim($kernel->output());

        if (file_exists($linkPath) || is_link($linkPath)) {
            deploy_log($logs, 'ok', $linkOutput !== '' ? $linkOutput : 'Storage link created.');
        } else {
            deploy_log($logs, 'info', 'Symlink not supported — copying files to public/storage instead...');
            if (!is_dir($targetPath)) {
                mkdir($targetPath, 0755, true);
            }
            if (!is_dir($linkPath)) {
                mkdir($linkPath, 0755, true);
            }
            deploy_copy_directory($targetPath, $linkPath);
            deploy_log($logs, 'ok', 'Copied storage/app/public → public/storage (FTP-friendly fallback).');
        }
    }

    foreach (['config:clear', 'cache:clear', 'view:clear', 'route:clear'] as $command) {
        deploy_log($logs, 'info', 'Running php artisan ' . $command . '...');
        $code = $kernel->call($command);
        deploy_log($logs, $code === 0 ? 'ok' : 'fail', ucfirst(str_replace(':', ' ', $command)) . ' done.');
        if ($code !== 0) {
            $failed = true;
        }
    }

    deploy_log($logs, 'ok', 'All deploy steps finished.');
} catch (Throwable $e) {
    $failed = true;
    deploy_log($logs, 'fail', 'Error: ' . $e->getMessage());
}

deploy_html($logs, !$failed);

/**
 * Only adds the album column — does NOT re-run users/sessions migrations.
 */
function deploy_run_album_migration(Illuminate\Contracts\Console\Kernel $kernel, array &$logs, bool &$failed): void
{
    deploy_log($logs, 'info', 'Checking media table for album column...');

    if (!Illuminate\Support\Facades\Schema::hasTable('media')) {
        deploy_log($logs, 'fail', 'The media table does not exist. Your database must already be set up.');
        $failed = true;
        return;
    }

    if (Illuminate\Support\Facades\Schema::hasColumn('media', 'album')) {
        deploy_log($logs, 'ok', 'Column media.album already exists — skipped.');
        return;
    }

    deploy_log($logs, 'info', 'Adding media.album column (safe for existing live database)...');

    try {
        $exitCode = $kernel->call('migrate', [
            '--force' => true,
            '--path' => 'database/migrations/2026_05_24_000001_add_album_to_media_table.php',
        ]);
        $output = trim($kernel->output());

        if (Illuminate\Support\Facades\Schema::hasColumn('media', 'album')) {
            deploy_log($logs, 'ok', $output !== '' ? $output : 'Album column added.');
            return;
        }

        if ($exitCode !== 0 && $output !== '') {
            deploy_log($logs, 'info', $output);
        }
    } catch (Throwable $e) {
        deploy_log($logs, 'info', 'Migration file failed, trying direct SQL...');
    }

    try {
        Illuminate\Support\Facades\DB::statement(
            'ALTER TABLE `media` ADD COLUMN `album` VARCHAR(255) NULL AFTER `title`'
        );
        deploy_log($logs, 'ok', 'Album column added via SQL.');
    } catch (Throwable $e) {
        if (str_contains($e->getMessage(), 'Duplicate column')) {
            deploy_log($logs, 'ok', 'Album column already exists.');
            return;
        }

        deploy_log($logs, 'fail', 'Could not add album column: ' . $e->getMessage());
        $failed = true;
    }
}

/**
 * Allow uploads without a logged-in user (matches local migration).
 */
function deploy_make_user_id_nullable(array &$logs, bool &$failed): void
{
    deploy_log($logs, 'info', 'Checking media.user_id is nullable...');

    if (!Illuminate\Support\Facades\Schema::hasTable('media')
        || !Illuminate\Support\Facades\Schema::hasColumn('media', 'user_id')) {
        deploy_log($logs, 'info', 'media.user_id column not found — skipped.');
        return;
    }

    $column = Illuminate\Support\Facades\DB::selectOne(
        "SELECT IS_NULLABLE FROM information_schema.COLUMNS
         WHERE TABLE_SCHEMA = DATABASE()
           AND TABLE_NAME = 'media'
           AND COLUMN_NAME = 'user_id'"
    );

    if ($column && strtoupper((string) $column->IS_NULLABLE) === 'YES') {
        deploy_log($logs, 'ok', 'media.user_id is already nullable — skipped.');
        return;
    }

    deploy_log($logs, 'info', 'Making media.user_id nullable...');

    try {
        Illuminate\Support\Facades\DB::statement(
            'ALTER TABLE `media` MODIFY `user_id` BIGINT UNSIGNED NULL'
        );
        deploy_log($logs, 'ok', 'media.user_id is now nullable.');
    } catch (Throwable $e) {
        deploy_log($logs, 'fail', 'Could not update media.user_id: ' . $e->getMessage());
        $failed = true;
    }
}

/**
 * Recursively copy a directory (used when symlinks are not allowed).
 */
function deploy_copy_directory(string $source, string $destination): void
{
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    $items = scandir($source);
    if ($items === false) {
        return;
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $from = $source . DIRECTORY_SEPARATOR . $item;
        $to = $destination . DIRECTORY_SEPARATOR . $item;

        if (is_dir($from)) {
            deploy_copy_directory($from, $to);
            continue;
        }

        if (!file_exists($to) || filemtime($from) > filemtime($to)) {
            copy($from, $to);
        }
    }
}
