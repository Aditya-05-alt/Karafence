@extends('layouts.app')

@section('content')
<main class="flex-1 mt-20">
    <div class="bg-white dark:bg-background-dark border-b border-slate-200 dark:border-slate-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-8">
                <a href="{{ route('gallery.videos') }}" class="border-b-2 border-primary py-4 text-sm font-bold text-secondary dark:text-white flex items-center gap-2">
                    <span class="material-icons text-primary text-[20px]">movie</span>
                    Video Gallery
                </a>
                <a href="{{ route('gallery.images') }}" class="border-b-2 border-transparent py-4 text-sm font-medium text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 flex items-center gap-2 transition-all">
                    <span class="material-icons text-[20px]">photo_library</span>
                    Photo Gallery
                </a>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div class="relative w-full max-w-md">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <span class="material-icons text-[20px]">search</span>
                </span>
                <input class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-10 pr-4 text-sm focus:border-primary focus:ring-1 focus:ring-primary dark:border-slate-700 dark:bg-card-dark dark:text-white transition-colors" placeholder="Search videos by technique or event..." type="text"/>
            </div>
            <div class="flex flex-wrap gap-2">
                <button class="flex items-center gap-2 rounded-full bg-primary px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary/90 transition-all">
                    All Videos
                </button>
                <button class="flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-600 hover:border-primary hover:text-primary dark:border-slate-700 dark:bg-card-dark dark:text-slate-300 transition-all">
                    Kata
                </button>
                <button class="flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2 text-sm font-semibold text-slate-600 hover:border-primary hover:text-primary dark:border-slate-700 dark:bg-card-dark dark:text-slate-300 transition-all">
                    Kumite
                </button>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
            @forelse($videos as $video)
                <div class="group relative flex flex-col overflow-hidden rounded-xl border border-slate-200 bg-white transition-all hover:shadow-xl dark:border-slate-800 dark:bg-card-dark">
                    <button type="button"
                        class="relative aspect-video overflow-hidden bg-black w-full cursor-pointer"
                        onclick="openVideoViewer(@json($video->media_url), @json($video->title ?? 'Untitled Video'))">
                        @if($video->thumbnail_url)
                            <img class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                alt="{{ $video->title }}"
                                src="{{ $video->thumbnail_url }}"/>
                        @else
                            <video class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105 pointer-events-none" preload="metadata" muted>
                                <source src="{{ $video->media_url }}#t=0.1" type="video/mp4">
                            </video>
                        @endif
                        <div class="absolute inset-0 flex items-center justify-center bg-black/30 transition-colors group-hover:bg-black/20">
                            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-primary/90 text-white shadow-lg transition-transform group-hover:scale-110">
                                <span class="material-icons text-4xl pl-1">play_arrow</span>
                            </div>
                        </div>
                    </button>
                    <div class="flex flex-1 flex-col p-4">
                        <div class="mb-2 flex items-center justify-between">
                            <span class="rounded bg-primary/10 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-primary">Training</span>
                            <span class="text-xs text-slate-400">{{ $video->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-secondary dark:text-white leading-snug group-hover:text-primary transition-colors">
                            {{ $video->title ?? 'Untitled Video' }}
                        </h3>
                        <p class="mt-2 line-clamp-2 text-sm text-slate-500 dark:text-slate-400">
                            {{ $video->description ?? 'No description provided.' }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center text-slate-500">
                    <span class="material-icons text-6xl opacity-30 block mb-4">videocam_off</span>
                    <p>No videos have been uploaded yet.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12 flex items-center justify-center gap-2">
            {{ $videos->links() }}
        </div>
    </div>

    <div id="video-viewer" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/90 p-4 backdrop-blur-sm" onclick="closeVideoViewer(event)">
        <button type="button" class="absolute top-4 right-4 text-white/80 hover:text-white transition-colors z-10" onclick="closeVideoViewer()">
            <span class="material-icons text-4xl">close</span>
        </button>
        <div class="max-w-5xl w-full" onclick="event.stopPropagation()">
            <video id="video-viewer-player" controls class="w-full max-h-[80vh] rounded-lg bg-black mx-auto">
                <source id="video-viewer-source" src="" type="video/mp4">
            </video>
            <p id="video-viewer-title" class="mt-4 text-center text-white text-lg font-semibold"></p>
        </div>
    </div>
</main>

<script>
    function openVideoViewer(src, title) {
        var player = document.getElementById('video-viewer-player');
        var source = document.getElementById('video-viewer-source');
        source.src = src;
        player.load();
        document.getElementById('video-viewer-title').textContent = title;
        document.getElementById('video-viewer').classList.remove('hidden');
        document.getElementById('video-viewer').classList.add('flex');
        document.body.style.overflow = 'hidden';
        player.play();
    }

    function closeVideoViewer(event) {
        if (event && event.target !== event.currentTarget) return;
        var player = document.getElementById('video-viewer-player');
        player.pause();
        document.getElementById('video-viewer-source').src = '';
        player.load();
        document.getElementById('video-viewer').classList.add('hidden');
        document.getElementById('video-viewer').classList.remove('flex');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeVideoViewer();
    });
</script>
@endsection
