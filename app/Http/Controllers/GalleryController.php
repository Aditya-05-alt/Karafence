<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function imageGallery(Request $request)
    {
        $album = $request->query('album');

        if ($album) {
            $images = Media::where('type', 'image')
                ->where('album', $album)
                ->latest()
                ->paginate(24)
                ->withQueryString();

            return view('gallery.images', [
                'images' => $images,
                'albums' => collect(),
                'activeAlbum' => $album,
                'albumCover' => Media::albumCover($album),
            ]);
        }

        $albumNames = Media::albumNames();

        $albums = $albumNames->map(fn (string $name) => Media::albumSummary($name));

        $images = Media::where('type', 'image')
            ->whereNull('album')
            ->latest()
            ->paginate(12);

        return view('gallery.images', [
            'images' => $images,
            'albums' => $albums,
            'activeAlbum' => null,
            'albumCover' => null,
        ]);
    }

    public function videoGallery()
    {
        $videos = Media::where('type', 'video')->latest()->paginate(12);
        return view('gallery.videos', compact('videos'));
    }

    public function dashboard()
    {
        $photoAlbums = Media::where('type', 'image')
            ->whereNotNull('album')
            ->latest()
            ->get()
            ->groupBy('album');

        $standaloneItems = Media::where(function ($query) {
            $query->where('type', 'video')
                ->orWhere(function ($q) {
                    $q->where('type', 'image')->whereNull('album');
                });
        })->latest()->get();

        return view('admin.dashboard', compact('photoAlbums', 'standaloneItems'));
    }

    public function storeMedia(Request $request)
    {
        if ($request->type === 'image') {
            return $this->storePhotoAlbum($request);
        }

        return $this->storeSingleVideo($request);
    }

    protected function storePhotoAlbum(Request $request)
    {
        $request->validate([
            'media_files' => 'required|array|min:1|max:100',
            'media_files.*' => 'file|mimes:jpeg,png,jpg|max:20480',
            'thumbnail_file' => 'nullable|file|mimes:jpeg,png,jpg|max:10240',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $albumName = $request->title;
        $coverPath = null;

        if ($request->hasFile('thumbnail_file')) {
            $coverPath = $request->file('thumbnail_file')->store('media/thumbnails', 'public');
        }

        $uploaded = 0;

        foreach ($request->file('media_files') as $index => $file) {
            $path = $file->store('media', 'public');

            Media::create([
                'user_id' => auth()->id(),
                'title' => $albumName,
                'album' => $albumName,
                'description' => $request->description,
                'type' => 'image',
                'file_path' => $path,
                'thumbnail_path' => ($index === 0 && $coverPath) ? $coverPath : null,
            ]);

            $uploaded++;
        }

        return redirect()->back()->with(
            'success',
            "{$uploaded} photo" . ($uploaded === 1 ? '' : 's') . " uploaded to album \"{$albumName}\"."
        );
    }

    protected function storeSingleVideo(Request $request)
    {
        $request->validate([
            'media_file' => 'required|file|mimes:mp4,mov,webm|max:512000',
            'thumbnail_file' => 'nullable|file|mimes:jpeg,png,jpg|max:10240',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $path = $request->file('media_file')->store('media', 'public');

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail_file')) {
            $thumbnailPath = $request->file('thumbnail_file')->store('media/thumbnails', 'public');
        }

        Media::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'type' => 'video',
            'file_path' => $path,
            'thumbnail_path' => $thumbnailPath,
        ]);

        return redirect()->back()->with('success', 'Video uploaded successfully!');
    }

    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id);
        $this->deleteMediaFiles($media);
        $media->delete();

        return redirect()->back()->with('success', 'Media deleted successfully!');
    }

    public function deleteAlbum(Request $request, string $album)
    {
        $items = Media::where('album', $album)->where('type', 'image')->get();

        if ($items->isEmpty()) {
            return redirect()->back()->with('success', 'Album not found.');
        }

        $coverPath = $items->firstWhere('thumbnail_path', '!=', null)?->thumbnail_path;

        foreach ($items as $media) {
            $this->deleteMediaFiles($media);
            $media->delete();
        }

        if ($coverPath && !Media::where('thumbnail_path', $coverPath)->exists()) {
            Storage::disk('public')->delete($coverPath);
        }

        return redirect()->back()->with('success', "Album \"{$album}\" and all its photos were deleted.");
    }

    protected function deleteMediaFiles(Media $media): void
    {
        $storage = Storage::disk('public');
        $storage->delete($media->file_path);

        if ($media->thumbnail_path && !Media::where('thumbnail_path', $media->thumbnail_path)->where('id', '!=', $media->id)->exists()) {
            $storage->delete($media->thumbnail_path);
        }
    }
}
