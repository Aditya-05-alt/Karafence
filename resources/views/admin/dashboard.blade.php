<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Sensei Video Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#D97736",
                        secondary: "#111827",
                        "background-light": "#FDF6E3",
                        "background-dark": "#0F172A",
                        "surface-light": "#FFFFFF",
                        "surface-dark": "#1E293B",
                    },
                    fontFamily: {
                        display: ["Merriweather", "serif"],
                        body: ["Roboto", "sans-serif"],
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-gray-100 dark:bg-background-dark text-gray-800 dark:text-gray-200 font-body transition-colors duration-300 min-h-screen flex overflow-hidden">

    <aside class="w-64 bg-secondary flex-shrink-0 flex flex-col h-screen fixed left-0 top-0 z-20 shadow-xl hidden md:flex">
        <div class="h-20 flex items-center justify-center border-b border-gray-800">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-primary rounded-full flex items-center justify-center text-white font-display font-bold text-xl">K</div>
                <span class="font-display font-black text-xl text-white tracking-wide uppercase">Karafence</span>
            </div>
        </div>
        <div class="flex-grow overflow-y-auto py-6 px-4 space-y-2">
            <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 pl-2">Main Menu</div>
            <a class="flex items-center gap-3 px-3 py-3 rounded-lg bg-primary text-white shadow-md transition-colors" href="#">
                <span class="material-symbols-outlined">dashboard</span>
                <span class="font-medium">Media Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-3 py-3 rounded-lg text-gray-300 hover:bg-gray-800 hover:text-white transition-colors" href="{{ route('gallery.images') }}" target="_blank">
                <span class="material-symbols-outlined">open_in_new</span>
                <span class="font-medium">View Live Gallery</span>
            </a>
        </div>
        <div class="p-4 border-t border-gray-800">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center text-white">
                    <span class="material-symbols-outlined">person</span>
                </div>
                <div>
                    <p class="text-sm font-bold text-white">Sensei</p>
                    <p class="text-xs text-gray-400">Admin</p>
                </div>
            </div>
        </div>
    </aside>

    <div class="flex-grow md:ml-64 flex flex-col h-screen overflow-hidden">

        <header class="bg-surface-light dark:bg-surface-dark shadow-sm z-10 h-20 flex items-center justify-between px-8">
            <h1 class="text-2xl font-display font-bold text-secondary dark:text-white">Media Library Manager</h1>
            <div class="flex items-center gap-4">
                <button class="p-2 text-gray-500 hover:text-primary focus:outline-none" onclick="document.documentElement.classList.toggle('dark')">
                    <span class="material-symbols-outlined">brightness_4</span>
                </button>
            </div>
        </header>

        <main class="flex-grow overflow-y-auto bg-gray-50 dark:bg-background-dark p-8">

            @if($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 mb-8">
                <div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-md p-6 border-l-4 border-primary flex flex-col md:flex-row items-center justify-between">
                    <div class="mb-4 md:mb-0">
                        <h2 class="text-xl font-bold text-secondary dark:text-white mb-1">Upload New Content</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Create a photo album for an event or upload a single video.</p>
                    </div>
                    <label class="cursor-pointer bg-primary hover:bg-orange-700 text-white px-6 py-3 rounded-lg shadow-lg transition-all flex items-center gap-2 font-bold transform hover:scale-105 active:scale-95" for="upload-modal-toggle">
                        <span class="material-symbols-outlined">cloud_upload</span> Upload
                    </label>
                </div>
            </div>

            <input class="peer hidden" id="upload-modal-toggle" type="checkbox"/>
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 z-50 hidden peer-checked:flex items-center justify-center p-4 backdrop-blur-sm transition-all">
                <div class="bg-surface-light dark:bg-surface-dark rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto relative">

                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center bg-gray-50 dark:bg-slate-800 rounded-t-2xl">
                        <h3 class="text-xl font-display font-bold text-secondary dark:text-white">Upload Media</h3>
                        <label class="text-gray-400 hover:text-gray-600 dark:hover:text-white cursor-pointer transition-colors" for="upload-modal-toggle">
                            <span class="material-symbols-outlined">close</span>
                        </label>
                    </div>

                    <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" id="upload-form">
                        @csrf
                        <div class="p-8 space-y-6">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Media Type</label>
                                <select name="type" id="media-type" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:bg-slate-800 dark:border-gray-600 dark:text-white py-2 px-3">
                                    <option value="image" selected>Photo Album (multiple photos)</option>
                                    <option value="video">Single Video</option>
                                </select>
                            </div>

                            <div id="photo-upload-fields" class="space-y-6">
                                <label for="media_files" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-10 flex flex-col items-center justify-center text-center hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors cursor-pointer group">
                                    <div class="bg-orange-100 dark:bg-slate-700 p-4 rounded-full mb-4 group-hover:bg-orange-200 dark:group-hover:bg-slate-600 transition-colors">
                                        <span class="material-symbols-outlined text-primary text-4xl">photo_library</span>
                                    </div>
                                    <p class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">Select multiple photos for an event</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">JPG, PNG — up to 100 photos at once (20MB each)</p>
                                    <p id="photo-count-label" class="text-sm font-semibold text-primary hidden"></p>
                                    <input type="file" id="media_files" name="media_files[]" accept="image/jpeg,image/png,image/jpg" multiple required class="hidden">
                                </label>

                                <label for="thumbnail_file" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 flex flex-col items-center justify-center text-center hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors cursor-pointer group">
                                    <div class="bg-orange-100 dark:bg-slate-700 p-3 rounded-full mb-3 group-hover:bg-orange-200 dark:group-hover:bg-slate-600 transition-colors">
                                        <span class="material-symbols-outlined text-primary text-3xl">image</span>
                                    </div>
                                    <p class="text-base font-medium text-gray-700 dark:text-gray-300 mb-1">Album Cover (Optional)</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Cover image shown on the gallery page for this event</p>
                                    <input type="file" id="thumbnail_file" name="thumbnail_file" accept="image/jpeg,image/png,image/jpg" class="hidden">
                                </label>
                            </div>

                            <div id="video-upload-fields" class="space-y-6 hidden">
                                <label for="media_file" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-10 flex flex-col items-center justify-center text-center hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors cursor-pointer group">
                                    <div class="bg-orange-100 dark:bg-slate-700 p-4 rounded-full mb-4 group-hover:bg-orange-200 dark:group-hover:bg-slate-600 transition-colors">
                                        <span class="material-symbols-outlined text-primary text-4xl">upload_file</span>
                                    </div>
                                    <p class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">Click to select a video</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">MP4, MOV, WEBM (Max 500MB)</p>
                                    <input type="file" id="media_file" name="media_file" accept="video/*" class="hidden" disabled>
                                </label>

                                <label for="video_thumbnail_file" class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 flex flex-col items-center justify-center text-center hover:bg-gray-50 dark:hover:bg-slate-800/50 transition-colors cursor-pointer group">
                                    <div class="bg-orange-100 dark:bg-slate-700 p-3 rounded-full mb-3 group-hover:bg-orange-200 dark:group-hover:bg-slate-600 transition-colors">
                                        <span class="material-symbols-outlined text-primary text-3xl">image</span>
                                    </div>
                                    <p class="text-base font-medium text-gray-700 dark:text-gray-300 mb-1">Video Thumbnail (Optional)</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">JPG or PNG cover image for gallery display</p>
                                    <input type="file" id="video_thumbnail_file" name="thumbnail_file" accept="image/jpeg,image/png,image/jpg" class="hidden" disabled>
                                </label>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1" id="title-label">Event / Album Name</label>
                                    <input name="title" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:bg-slate-800 dark:border-gray-600 dark:text-white py-2 px-3" placeholder="e.g. Belt Ceremony 2026" type="text"/>
                                </div>
                                <div class="col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                                    <textarea name="description" class="w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary dark:bg-slate-800 dark:border-gray-600 dark:text-white py-2 px-3" placeholder="Describe this event or media..." rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 dark:bg-slate-800 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-3 rounded-b-2xl">
                            <label class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-slate-700 cursor-pointer font-medium transition-colors" for="upload-modal-toggle">Cancel</label>
                            <button type="submit" class="px-6 py-2 rounded-lg bg-primary text-white hover:bg-orange-700 font-bold shadow-sm transition-colors">Upload</button>
                        </div>
                    </form>
                </div>
            </div>

            @if($photoAlbums->isNotEmpty())
                <div class="mb-8">
                    <h2 class="text-xl font-bold text-secondary dark:text-white mb-4">Photo Albums</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach($photoAlbums as $albumName => $photos)
                            @php $cover = \App\Models\Media::albumCover($albumName); @endphp
                            <div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-md overflow-hidden border border-transparent hover:border-gray-200 dark:hover:border-gray-700 flex flex-col">
                                <div class="relative h-48 bg-gray-200 dark:bg-gray-800 overflow-hidden">
                                    @if($cover?->thumbnail_url)
                                        <img src="{{ $cover->thumbnail_url }}" alt="{{ $albumName }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-300 dark:bg-gray-700">
                                            <span class="material-symbols-outlined text-6xl text-gray-500">photo_library</span>
                                        </div>
                                    @endif
                                    <div class="absolute top-3 right-3 bg-primary text-white text-xs font-bold px-2 py-1 rounded uppercase tracking-wider">
                                        {{ $photos->count() }} photos
                                    </div>
                                </div>
                                <div class="p-5 flex flex-col flex-grow">
                                    <h3 class="text-lg font-bold text-secondary dark:text-white mb-1">{{ $albumName }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-4">{{ $photos->first()->description }}</p>
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700 mt-auto">
                                        <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-sm">calendar_today</span>
                                            {{ $photos->max('created_at')->format('M d, Y') }}
                                        </span>
                                        <div class="flex gap-2">
                                            <a href="{{ route('gallery.images', ['album' => $albumName]) }}" target="_blank" class="p-1.5 text-primary hover:bg-orange-50 dark:hover:bg-orange-900/30 rounded transition-colors" title="View album">
                                                <span class="material-symbols-outlined text-lg">open_in_new</span>
                                            </a>
                                            <form action="{{ route('admin.album.destroy', ['album' => $albumName]) }}" method="POST" onsubmit="return confirm('Delete this entire album and all {{ $photos->count() }} photos?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 rounded transition-colors" title="Delete album">
                                                    <span class="material-symbols-outlined text-lg">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex items-center mb-6">
                <h2 class="text-xl font-bold text-secondary dark:text-white">Videos & Single Photos</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse($standaloneItems as $media)
                    <div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-md overflow-hidden group hover:shadow-xl transition-all duration-300 border border-transparent hover:border-gray-200 dark:hover:border-gray-700 flex flex-col">
                        <div class="relative h-48 bg-gray-200 dark:bg-gray-800 overflow-hidden">
                            @if($media->thumbnail_url)
                                <img src="{{ $media->thumbnail_url }}" alt="{{ $media->title }}" class="w-full h-full object-cover">
                                @if($media->type === 'video')
                                    <div class="absolute inset-0 flex items-center justify-center text-white drop-shadow-lg bg-black/20">
                                        <span class="material-symbols-outlined text-6xl">play_circle</span>
                                    </div>
                                @endif
                            @elseif($media->type === 'video')
                                <video class="w-full h-full object-cover opacity-80" preload="metadata">
                                    <source src="{{ $media->media_url }}#t=0.1" type="video/mp4">
                                </video>
                                <div class="absolute inset-0 flex items-center justify-center text-white drop-shadow-lg">
                                    <span class="material-symbols-outlined text-6xl">play_circle</span>
                                </div>
                            @else
                                <img src="{{ $media->media_url }}" alt="{{ $media->title }}" class="w-full h-full object-cover">
                            @endif
                            <div class="absolute top-3 right-3 bg-primary text-white text-xs font-bold px-2 py-1 rounded backdrop-blur-sm uppercase tracking-wider">
                                {{ $media->type }}
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-secondary dark:text-white leading-tight mb-2 group-hover:text-primary transition-colors">{{ $media->title }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 mb-4">{{ $media->description }}</p>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700 mt-auto">
                                <span class="text-xs text-gray-500 dark:text-gray-400 flex items-center gap-1">
                                    <span class="material-symbols-outlined text-sm">calendar_today</span>
                                    {{ $media->created_at->format('M d, Y') }}
                                </span>
                                <form action="{{ route('admin.media.destroy', $media->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this file?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 rounded transition-colors" title="Delete">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    @if($photoAlbums->isEmpty())
                        <div class="col-span-full py-12 text-center text-gray-500 dark:text-gray-400 border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-xl">
                            <span class="material-symbols-outlined text-5xl opacity-50 block mb-2">folder_open</span>
                            <p>No media uploaded yet. Use the upload button above.</p>
                        </div>
                    @else
                        <div class="col-span-full py-6 text-center text-gray-500 dark:text-gray-400">
                            <p>No standalone videos or single photos yet.</p>
                        </div>
                    @endif
                @endforelse
            </div>

        </main>
    </div>

<script>
    (function () {
        var mediaType = document.getElementById('media-type');
        var photoFields = document.getElementById('photo-upload-fields');
        var videoFields = document.getElementById('video-upload-fields');
        var mediaFiles = document.getElementById('media_files');
        var mediaFile = document.getElementById('media_file');
        var thumbnailFile = document.getElementById('thumbnail_file');
        var videoThumbnailFile = document.getElementById('video_thumbnail_file');
        var titleLabel = document.getElementById('title-label');
        var photoCountLabel = document.getElementById('photo-count-label');

        function toggleUploadMode() {
            var isPhoto = mediaType.value === 'image';

            photoFields.classList.toggle('hidden', !isPhoto);
            videoFields.classList.toggle('hidden', isPhoto);

            mediaFiles.disabled = !isPhoto;
            thumbnailFile.disabled = !isPhoto;
            mediaFile.disabled = isPhoto;
            videoThumbnailFile.disabled = isPhoto;
            mediaFiles.required = isPhoto;
            mediaFile.required = !isPhoto;

            titleLabel.textContent = isPhoto ? 'Event / Album Name' : 'Video Title';

            if (isPhoto) {
                mediaFile.removeAttribute('name');
                videoThumbnailFile.removeAttribute('name');
                mediaFiles.setAttribute('name', 'media_files[]');
                thumbnailFile.setAttribute('name', 'thumbnail_file');
            } else {
                mediaFiles.removeAttribute('name');
                thumbnailFile.removeAttribute('name');
                mediaFile.setAttribute('name', 'media_file');
                videoThumbnailFile.setAttribute('name', 'thumbnail_file');
            }
        }

        mediaType.addEventListener('change', toggleUploadMode);

        mediaFiles.addEventListener('change', function () {
            var count = mediaFiles.files.length;
            if (count > 0) {
                photoCountLabel.textContent = count + ' photo' + (count === 1 ? '' : 's') + ' selected';
                photoCountLabel.classList.remove('hidden');
            } else {
                photoCountLabel.classList.add('hidden');
            }
        });

        toggleUploadMode();
    })();
</script>
</body>
</html>
