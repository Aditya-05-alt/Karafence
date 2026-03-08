<?php
namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Fetch latest 1 video
        $featuredVideo = Media::where('type', 'video')->latest()->first();
        
        // Fetch latest 1 image
        $featuredImage = Media::where('type', 'image')->latest()->first();

        return view('home', compact('featuredVideo', 'featuredImage'));
    }
}