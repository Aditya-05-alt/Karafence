@extends('layouts.app')

@section('content')
<div class="flex-1 mt-20">
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
        @if($activeAlbum)
            <div class="mb-8">
                <a href="{{ route('gallery.images') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-primary hover:text-orange-600 transition-colors mb-4">
                    <span class="material-icons text-base">arrow_back</span>
                    Back to all albums
                </a>
                <h2 class="text-3xl font-extrabold text-secondary dark:text-white font-display uppercase tracking-wide">{{ $activeAlbum }}</h2>
                @if($albumCover?->description)
                    <p class="mt-2 text-gray-500 dark:text-slate-400">{{ $albumCover->description }}</p>
                @endif
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse($images as $image)
                    <button type="button"
                        class="gallery-image-trigger group relative overflow-hidden rounded-xl bg-slate-200 dark:bg-card-dark aspect-[4/5] shadow-sm border border-transparent dark:border-slate-800 text-left cursor-pointer w-full"
                        data-src="{{ $image->media_url }}"
                        data-title="{{ $image->title ?? $activeAlbum }}"
                        data-file-key="{{ pathinfo($image->file_path, PATHINFO_FILENAME) }}">
                        <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110 pointer-events-none"
                            alt="{{ $image->title }}"
                            src="{{ $image->thumbnail_url }}"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 via-transparent to-transparent opacity-0 transition-opacity group-hover:opacity-100 flex flex-col items-start justify-end p-6 pointer-events-none">
                            <span class="flex items-center gap-1 text-xs text-white/80">
                                <span class="material-icons text-sm">zoom_in</span> View full image
                            </span>
                        </div>
                    </button>
                @empty
                    <div class="col-span-full py-20 text-center text-slate-500">
                        <span class="material-icons text-6xl opacity-30 block mb-4">photo_camera</span>
                        <p>No photos in this album yet.</p>
                    </div>
                @endforelse
            </div>
        @else
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-3xl font-extrabold text-secondary dark:text-white font-display uppercase tracking-wide">Captured Moments</h2>
                    <p class="mt-1 text-gray-500 dark:text-slate-400">Browse event albums and photo collections from the dojo.</p>
                </div>
            </div>

            @if($albums->isNotEmpty())
                <h3 class="mt-10 text-lg font-bold text-secondary dark:text-white uppercase tracking-wide">Event Albums</h3>
                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($albums as $album)
                        <a href="{{ route('gallery.images', ['album' => $album['name']]) }}"
                            class="group relative overflow-hidden rounded-xl bg-slate-200 dark:bg-card-dark aspect-[4/5] shadow-sm border border-transparent dark:border-slate-800">
                            @if($album['cover_url'])
                                <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    alt="{{ $album['name'] }}"
                                    src="{{ $album['cover_url'] }}"/>
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-slate-300 dark:bg-slate-700">
                                    <span class="material-icons text-6xl text-slate-500">photo_library</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 via-secondary/20 to-transparent flex flex-col justify-end p-6">
                                <p class="text-white font-semibold text-lg">{{ $album['name'] }}</p>
                                <p class="text-white/80 text-sm mt-1">{{ $album['count'] }} photo{{ $album['count'] === 1 ? '' : 's' }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

            @if($images->count() > 0)
                <h3 class="mt-10 text-lg font-bold text-secondary dark:text-white uppercase tracking-wide">Single Photos</h3>
                <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($images as $image)
                        <button type="button"
                            class="gallery-image-trigger group relative overflow-hidden rounded-xl bg-slate-200 dark:bg-card-dark aspect-[4/5] shadow-sm border border-transparent dark:border-slate-800 text-left cursor-pointer w-full"
                            data-src="{{ $image->media_url }}"
                            data-title="{{ $image->title ?? 'Dojo Archive' }}"
                            data-file-key="{{ pathinfo($image->file_path, PATHINFO_FILENAME) }}">
                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110 pointer-events-none"
                                alt="{{ $image->title }}"
                                src="{{ $image->thumbnail_url }}"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-secondary/90 via-transparent to-transparent opacity-0 transition-opacity group-hover:opacity-100 flex flex-col items-start justify-end p-6 pointer-events-none">
                                <p class="text-white font-semibold">{{ $image->title ?? 'Dojo Archive' }}</p>
                                <span class="mt-1 flex items-center gap-1 text-xs text-white/80">
                                    <span class="material-icons text-sm">zoom_in</span> View full image
                                </span>
                            </div>
                        </button>
                    @endforeach
                </div>
            @elseif($albums->isEmpty())
                <div class="mt-10 py-20 text-center text-slate-500">
                    <span class="material-icons text-6xl opacity-30 block mb-4">photo_camera</span>
                    <p>No photos have been uploaded yet.</p>
                </div>
            @endif
        @endif

        <div class="mt-12 flex justify-center">
            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection

@push('modals')
<div id="image-viewer" class="fixed inset-0 z-[99999] hidden flex-col items-center justify-center bg-black/95 p-4 sm:p-8" role="dialog" aria-modal="true" aria-label="Full size image">
    <button type="button" id="image-viewer-close" class="absolute top-4 right-4 z-10 text-white/80 hover:text-white transition-colors" aria-label="Close">
        <span class="material-icons text-4xl">close</span>
    </button>

    <button type="button" id="image-viewer-prev" class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 z-10 flex h-12 w-12 items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-colors disabled:opacity-30 disabled:pointer-events-none" aria-label="Previous image">
        <span class="material-icons text-3xl">chevron_left</span>
    </button>

    <button type="button" id="image-viewer-next" class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 z-10 flex h-12 w-12 items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-colors disabled:opacity-30 disabled:pointer-events-none" aria-label="Next image">
        <span class="material-icons text-3xl">chevron_right</span>
    </button>

    <div class="flex flex-col items-center justify-center w-full max-w-6xl max-h-full pointer-events-none">
        <img id="image-viewer-img" src="" alt="" class="max-w-full max-h-[80vh] w-auto h-auto object-contain rounded-lg shadow-2xl pointer-events-auto select-none">
        <div class="mt-4 flex flex-col items-center gap-3 pointer-events-auto">
            <p id="image-viewer-title" class="text-center text-white text-lg font-semibold px-4"></p>
            <p id="image-viewer-counter" class="text-sm text-white/60"></p>
            <div class="flex flex-wrap items-center justify-center gap-3">
                <button type="button" id="image-viewer-download" class="inline-flex items-center gap-2 rounded-full bg-primary px-5 py-2 text-sm font-bold text-white hover:bg-orange-600 transition-colors">
                    <span class="material-icons text-lg">download</span>
                    Download
                </button>
                <a id="image-viewer-open-tab" href="#" target="_blank" rel="noopener" class="inline-flex items-center gap-2 rounded-full border border-white/30 px-5 py-2 text-sm font-semibold text-white/80 hover:text-white hover:border-white/60 transition-colors">
                    <span class="material-icons text-lg">open_in_new</span>
                    Open in tab
                </a>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    var viewer = document.getElementById('image-viewer');
    var viewerImg = document.getElementById('image-viewer-img');
    var viewerTitle = document.getElementById('image-viewer-title');
    var viewerCounter = document.getElementById('image-viewer-counter');
    var viewerOpenTab = document.getElementById('image-viewer-open-tab');
    var downloadBtn = document.getElementById('image-viewer-download');
    var closeBtn = document.getElementById('image-viewer-close');
    var prevBtn = document.getElementById('image-viewer-prev');
    var nextBtn = document.getElementById('image-viewer-next');

    var galleryItems = [];
    var currentIndex = 0;

    function getGalleryItems() {
        return Array.from(document.querySelectorAll('.gallery-image-trigger')).map(function (el) {
            return {
                src: el.dataset.src,
                title: el.dataset.title || 'Gallery photo',
                fileKey: el.dataset.fileKey || '',
            };
        });
    }

    function sanitizeFilename(name) {
        return (name || 'photo').replace(/[^\w\s\-().]/g, '').trim().replace(/\s+/g, '-') || 'photo';
    }

    function fileExtensionFromUrl(url) {
        var match = url.match(/\.(jpe?g|png|gif|webp)(\?|$)/i);
        return match ? match[1].toLowerCase() : 'jpg';
    }

    function buildDownloadFilename(title, index, total, fileKey, ext) {
        var safeTitle = sanitizeFilename(title);
        var paddedIndex = String(index + 1).padStart(String(total).length, '0');
        var safeKey = (fileKey || 'img').replace(/[^\w\-]/g, '').slice(0, 32);

        return safeTitle + '-' + paddedIndex + '-' + safeKey + '.' + ext;
    }

    function updateNavButtons() {
        var hasMultiple = galleryItems.length > 1;
        prevBtn.classList.toggle('hidden', !hasMultiple);
        nextBtn.classList.toggle('hidden', !hasMultiple);
        prevBtn.disabled = currentIndex <= 0;
        nextBtn.disabled = currentIndex >= galleryItems.length - 1;
        viewerCounter.textContent = galleryItems.length > 1
            ? (currentIndex + 1) + ' / ' + galleryItems.length
            : '';
    }

    function showImageAt(index) {
        if (!galleryItems.length || index < 0 || index >= galleryItems.length) return;

        currentIndex = index;
        var item = galleryItems[index];
        var ext = fileExtensionFromUrl(item.src);

        viewerImg.src = item.src;
        viewerImg.alt = item.title;
        viewerTitle.textContent = item.title;
        viewerOpenTab.href = item.src;
        downloadBtn.dataset.src = item.src;
        downloadBtn.dataset.filename = buildDownloadFilename(
            item.title,
            index,
            galleryItems.length,
            item.fileKey,
            ext
        );
        updateNavButtons();
    }

    function openImageViewer(index) {
        galleryItems = getGalleryItems();
        if (!galleryItems.length) return;

        showImageAt(index);
        viewer.classList.remove('hidden');
        viewer.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeImageViewer() {
        viewer.classList.add('hidden');
        viewer.classList.remove('flex');
        viewerImg.removeAttribute('src');
        viewerImg.alt = '';
        viewerTitle.textContent = '';
        viewerCounter.textContent = '';
        viewerOpenTab.href = '#';
        galleryItems = [];
        currentIndex = 0;
        document.body.style.overflow = '';
    }

    function goToPrev() {
        if (currentIndex > 0) showImageAt(currentIndex - 1);
    }

    function goToNext() {
        if (currentIndex < galleryItems.length - 1) showImageAt(currentIndex + 1);
    }

    function downloadCurrentImage() {
        var src = downloadBtn.dataset.src;
        var filename = downloadBtn.dataset.filename || 'photo.jpg';
        if (!src) return;

        var link = document.createElement('a');
        link.href = src;
        link.download = filename;
        link.rel = 'noopener';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    document.addEventListener('click', function (e) {
        var trigger = e.target.closest('.gallery-image-trigger');
        if (trigger) {
            e.preventDefault();
            var triggers = Array.from(document.querySelectorAll('.gallery-image-trigger'));
            openImageViewer(triggers.indexOf(trigger));
        }
    });

    viewer.addEventListener('click', function (e) {
        if (e.target === viewer) closeImageViewer();
    });

    closeBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        closeImageViewer();
    });

    prevBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        goToPrev();
    });

    nextBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        goToNext();
    });

    downloadBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        downloadCurrentImage();
    });

    document.addEventListener('keydown', function (e) {
        if (viewer.classList.contains('hidden')) return;

        if (e.key === 'Escape') {
            closeImageViewer();
        } else if (e.key === 'ArrowLeft') {
            goToPrev();
        } else if (e.key === 'ArrowRight') {
            goToNext();
        }
    });
})();
</script>
@endpush
