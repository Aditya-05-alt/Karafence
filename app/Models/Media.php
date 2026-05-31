<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'album',
        'description',
        'file_path',
        'thumbnail_path',
    ];

    public function getMediaUrlAttribute(): string
    {
        return asset('storage/' . ltrim($this->file_path, '/'));
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->thumbnail_path) {
            return asset('storage/' . ltrim($this->thumbnail_path, '/'));
        }

        if ($this->type === 'image') {
            return $this->media_url;
        }

        return null;
    }

    public static function albumNames(): Collection
    {
        return static::query()
            ->where('type', 'image')
            ->whereNotNull('album')
            ->distinct()
            ->orderBy('album')
            ->pluck('album');
    }

    public static function albumCover(string $album): ?self
    {
        return static::query()
            ->where('type', 'image')
            ->where('album', $album)
            ->whereNotNull('thumbnail_path')
            ->first()
            ?? static::query()
                ->where('type', 'image')
                ->where('album', $album)
                ->oldest()
                ->first();
    }

    public static function albumSummary(string $album): array
    {
        $photos = static::query()
            ->where('type', 'image')
            ->where('album', $album)
            ->get();

        $cover = static::albumCover($album);

        return [
            'name' => $album,
            'count' => $photos->count(),
            'description' => $photos->first()?->description,
            'cover_url' => $cover?->thumbnail_url,
            'created_at' => $photos->max('created_at'),
        ];
    }
}
