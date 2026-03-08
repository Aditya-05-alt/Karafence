@extends('layouts.app')

@section('content')
    <header class="relative bg-gradient-to-b from-orange-100 to-transparent dark:from-orange-900/20 dark:to-transparent pb-12 pt-24 lg:pt-32 border-b border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-display font-bold text-secondary dark:text-white mb-4">
                Media Gallery
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Exclusive training footage, belt ceremonies, and photo archives from Karafence Academy.
            </p>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-center mb-12 border-b border-gray-200 dark:border-gray-700">
            <nav aria-label="Tabs" class="-mb-px flex space-x-8">
                <a class="border-primary text-primary whitespace-nowrap py-4 px-1 border-b-2 font-medium text-lg flex items-center" href="#">
                    <span class="material-icons mr-2">grid_view</span> All Media
                </a>
                <a class="border-transparent text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-lg flex items-center" href="#">
                    <span class="material-icons mr-2">videocam</span> Videos
                </a>
                <a class="border-transparent text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-lg flex items-center" href="#">
                    <span class="material-icons mr-2">photo_library</span> Photos
                </a>
            </nav>
        </div>

        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-display font-semibold text-secondary dark:text-white">Recent Uploads</h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            
            @forelse($mediaItems as $media)
                <div class="group relative bg-surface-light dark:bg-surface-dark rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 dark:border-gray-800">
                    
                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 relative">
                        @if($media->type === 'video')
                            <video class="object-cover w-full h-48 group-hover:scale-105 transition-transform duration-500" preload="metadata">
                                <source src="{{ asset('storage/' . $media->file_path) }}#t=0.1" type="video/mp4">
                            </video>
                            <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all flex items-center justify-center pointer-events-none">
                                <div class="w-12 h-12 bg-primary/90 rounded-full flex items-center justify-center text-white shadow-lg transform group-hover:scale-110 transition-transform">
                                    <span class="material-icons text-2xl pl-1">play_arrow</span>
                                </div>
                            </div>
                        @else
                            <img alt="{{ $media->title }}" class="object-cover w-full h-48 group-hover:scale-105 transition-transform duration-500" src="{{ asset('storage/' . $media->file_path) }}"/>
                        @endif
                    </div>

                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-primary uppercase tracking-wide">{{ $media->type }}</span>
                            <span class="text-xs text-gray-400">{{ $media->created_at->diffForHumans() }}</span>
                        </div>
                        <h4 class="text-lg font-semibold text-secondary dark:text-gray-100 leading-tight mb-2 group-hover:text-primary transition-colors">
                            {{ $media->title ?? 'Untitled Media' }}
                        </h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 line-clamp-2">
                            {{ $media->description ?? 'No description provided.' }}
                        </p>
                        <div class="flex items-center justify-between border-t border-gray-100 dark:border-gray-700 pt-3">
                            <div class="flex items-center space-x-2">
                                <span class="material-icons text-gray-400 text-sm">visibility</span>
                                <span class="text-xs text-gray-500 dark:text-gray-400">Public</span>
                            </div>
                            <button class="text-gray-400 hover:text-primary transition-colors">
                                <span class="material-icons">share</span>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500 dark:text-gray-400">
                    <span class="material-icons text-6xl mb-4 opacity-50">videocam_off</span>
                    <p class="text-xl">No media has been uploaded yet.</p>
                </div>
            @endforelse

        </div>

        <div class="flex items-center justify-center mt-16">
            {{ $mediaItems->links() }}
        </div>
    </main>
@endsection