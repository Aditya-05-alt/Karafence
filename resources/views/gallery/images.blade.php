@extends('layouts.app')

@section('content')
<main class="flex-1 mt-20">
    <div class="bg-white dark:bg-background-dark border-b border-secondary/10 dark:border-white/10">
        <div class="mx-auto max-w-7xl px-6 lg:px-12">
            <div class="flex gap-8 overflow-x-auto no-scrollbar">
                <a href="{{ route('gallery.videos') }}" class="group flex flex-col items-center justify-center border-b-2 border-transparent py-4 text-gray-500 hover:text-secondary transition-all dark:text-slate-400 dark:hover:text-slate-200">
                    <span class="text-sm font-bold tracking-wide">VIDEO GALLERY</span>
                </a>
                <a href="{{ route('gallery.images') }}" class="flex flex-col items-center justify-center border-b-2 border-primary py-4 text-primary">
                    <span class="text-sm font-bold tracking-wide">PHOTO GALLERY</span>
                </a>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 py-8 lg:px-12">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-3xl font-extrabold text-secondary dark:text-white font-display uppercase tracking-wide">Captured Moments</h2>
                <p class="mt-1 text-gray-500 dark:text-slate-400">Experience the discipline and spirit of our martial arts community.</p>
            </div>
            <div class="flex flex-wrap gap-2">
                <button class="flex items-center gap-2 rounded-full bg-primary px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-600 transition-colors">
                    <span>All Photos</span>
                </button>
                <button class="flex items-center gap-2 rounded-full border border-secondary/10 bg-white px-4 py-2 text-sm font-semibold text-secondary hover:border-primary/50 transition-colors dark:bg-card-dark dark:text-slate-200 dark:border-white/10">
                    <span>Belt Ceremonies</span>
                </button>
                <button class="flex items-center gap-2 rounded-full border border-secondary/10 bg-white px-4 py-2 text-sm font-semibold text-secondary hover:border-primary/50 transition-colors dark:bg-card-dark dark:text-slate-200 dark:border-white/10">
                    <span>Classes</span>
                </button>
            </div>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse($images as $image)
                <div class="group relative overflow-hidden rounded-xl bg-slate-200 dark:bg-card-dark aspect-[4/5] shadow-sm border border-transparent dark:border-slate-800">
                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $image->title }}" src="{{ asset('storage/' . $image->file_path) }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 via-transparent to-transparent opacity-0 transition-opacity group-hover:opacity-100 flex items-end p-6">
                        <p class="text-white font-semibold">{{ $image->title ?? 'Dojo Archive' }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center text-slate-500">
                    <span class="material-icons text-6xl opacity-30 block mb-4">photo_camera</span>
                    <p>No photos have been uploaded yet.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12 flex justify-center">
            {{ $images->links() }}
        </div>
    </div>
</main>
@endsection