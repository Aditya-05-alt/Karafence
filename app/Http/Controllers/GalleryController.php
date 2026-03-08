<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Fetches ONLY images for the Photo Gallery tab
    public function imageGallery()
    {
        $images = Media::where('type', 'image')->latest()->paginate(12);
        return view('gallery.images', compact('images'));
    }

    // Fetches ONLY videos for the Video Gallery tab
    public function videoGallery()
    {
        $videos = Media::where('type', 'video')->latest()->paginate(12);
        return view('gallery.videos', compact('videos'));
    }
    // Show the Sensei Dashboard
    public function dashboard()
    {
        $mediaItems = Media::latest()->get();
        return view('admin.dashboard', compact('mediaItems'));
    }

    // Handle File Uploads
    public function storeMedia(Request $request)
    {
        $request->validate([
            'media_file' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,webm|max:512000', // 500MB max
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video',
            'description' => 'nullable|string'
        ]);

        // Save file to storage/app/public/media folder
        $path = $request->file('media_file')->store('media', 'public');

        // Save to database
        Media::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Media uploaded successfully!');
    }

    // Handle File Deletion
    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id);
        
        // Delete the actual file from storage
        \Illuminate\Support\Facades\Storage::disk('public')->delete($media->file_path);
        
        // Delete from database
        $media->delete();

        return redirect()->back()->with('success', 'Media deleted successfully!');
    }
}