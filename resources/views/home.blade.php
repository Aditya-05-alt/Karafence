@extends('layouts.app')

@section('content')
    <header class="relative pt-24 pb-16 lg:pt-32 lg:pb-24 overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-10 dark:opacity-5">
            <svg class="h-full w-full" height="100%" viewBox="0 0 800 800" width="100%" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" stroke="#D97736" stroke-width="1">
                    <path d="M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126 598 797 577 196 932 233 108 520 272 658 667 381 276 585 537 252 250 504 445 110 439 626 500 487 756 820 95 37 808 698 147 673 205 577 595 196 667 56 128 348 692 532 26 290 844 797 222 173 135 632 873 274 728 732 29 476 128 667 523 520 675 623 429 204 42 165 478 695 693 416 332 589 161 627 670 918 301 629 174 74 159 367 79 385 410 415 695 624 810"></path>
                </g>
            </svg>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-8 flex justify-center">
                <div class="relative w-64 h-64 md:w-80 md:h-80 lg:w-96 lg:h-96 rounded-full bg-white dark:bg-gray-800 shadow-2xl flex items-center justify-center p-4 ring-8 ring-primary/20">
                    <img alt="Karafence Academy Logo" class="object-contain w-full h-full rounded-full" src="{{ asset('/hero.jpeg') }}"/> </div>
            </div>
            <h1 class="text-5xl md:text-7xl font-display text-secondary dark:text-white mb-2 tracking-tight">
                KARAFENCE <span class="text-primary"> ACADEMY</span>
            </h1>
            <p class="text-3xl font-japanese text-secondary dark:text-gray-300 mb-8 opacity-90">鎮 力 道</p>
            <p class="max-w-2xl mx-auto text-xl text-gray-700 dark:text-gray-300 mb-10 leading-relaxed font-light">
                Master the art of discipline, strength, and self-defense. Join a community dedicated to physical excellence and mental fortitude.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-bold rounded-md text-white bg-primary hover:bg-orange-600 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all uppercase tracking-wider" href="#join">
                    Join the Dojo <span class="material-icons ml-2">arrow_forward</span>
                </a>
                <a class="inline-flex items-center justify-center px-8 py-4 border-2 border-secondary dark:border-gray-500 text-lg font-bold rounded-md text-secondary dark:text-gray-300 bg-transparent hover:bg-secondary hover:text-white dark:hover:bg-gray-700 transition-all uppercase tracking-wider" href="#video">
                    Watch Demo <span class="material-icons ml-2">play_circle_outline</span>
                </a>
            </div>
        </div>
    </header>

    <section class="py-16 bg-white dark:bg-card-dark border-t border-gray-200 dark:border-gray-800" id="video">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-primary font-bold tracking-widest uppercase text-sm">Training Highlights</span>
                <h2 class="text-4xl font-display text-secondary dark:text-white mt-2">Latest Session</h2>
                <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="relative w-full aspect-video rounded-xl overflow-hidden shadow-2xl ring-4 ring-gray-100 dark:ring-gray-800 bg-black group">
                @if($featuredVideo)
                    <video controls class="w-full h-full object-cover">
                        <source src="{{ asset('storage/' . $featuredVideo->file_path) }}" type="video/mp4">
                    </video>
                @else
                    <img alt="Dojo training session group class" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApuXpc5iu0WO_3gId7jxq3hOzobmkaRfsXNP36pQPZImj9qoAHA6-0WWnXfAkkuoje60kzvrpHcSIXYz-3gF-lVmIOe_Q4aUkWwr6j5Y3LInyDG-2yxJZk8kvepFuoex2gDMaPniGM9v60JXPfhB1jTNxQ5LMVtnFNS2w6xHcyNzbh9RU8KZhEF0W0YB2k9orkN-YkOoRWmYwRZUPDisvpcaZZHoCCwJChXygitQSS8V8eiChytRbFjj7zJMVHbP6lAAIao8wFI9rt"/>
                    <div class="absolute inset-0 bg-black/40 group-hover:bg-black/30 transition-colors flex items-center justify-center pointer-events-none">
                        <div class="w-20 h-20 bg-primary/90 rounded-full flex items-center justify-center text-white shadow-lg backdrop-blur-sm group-hover:scale-110 transition-transform duration-300">
                            <span class="material-icons text-5xl ml-2">play_arrow</span>
                        </div>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 text-center">
                <div class="p-6 bg-background-light dark:bg-background-dark rounded-lg shadow-sm border border-orange-100 dark:border-gray-700">
                    <span class="material-icons text-primary text-4xl mb-4">self_improvement</span>
                    <h3 class="text-xl font-bold mb-2 dark:text-white">Mental Focus</h3>
                    <p class="text-gray-600 dark:text-gray-400">Sharpen your mind and improve concentration through traditional kata.</p>
                </div>
                <div class="p-6 bg-background-light dark:bg-background-dark rounded-lg shadow-sm border border-orange-100 dark:border-gray-700">
                    <span class="material-icons text-primary text-4xl mb-4">fitness_center</span>
                    <h3 class="text-xl font-bold mb-2 dark:text-white">Physical Strength</h3>
                    <p class="text-gray-600 dark:text-gray-400">Build core strength, flexibility, and endurance with intense conditioning.</p>
                </div>
                <div class="p-6 bg-background-light dark:bg-background-dark rounded-lg shadow-sm border border-orange-100 dark:border-gray-700">
                    <span class="material-icons text-primary text-4xl mb-4">shield</span>
                    <h3 class="text-xl font-bold mb-2 dark:text-white">Self Defense</h3>
                    <p class="text-gray-600 dark:text-gray-400">Practical techniques to protect yourself and your loved ones in any situation.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-background-light dark:bg-background-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-4xl font-display text-secondary dark:text-white">Dojo Gallery</h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 font-japanese text-lg">武道館の様子</p>
                </div>
                <a class="hidden md:flex items-center text-primary font-bold hover:text-orange-700 transition-colors uppercase text-sm tracking-wide" href="{{ route('gallery.images') }}">
                    View Full Gallery <span class="material-icons text-sm ml-1">arrow_forward_ios</span>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 auto-rows-[200px]">
                <div class="col-span-1 md:col-span-2 row-span-2 relative group overflow-hidden rounded-lg">
                    @if($featuredImage)
                        <img alt="{{ $featuredImage->title ?? 'Featured Dojo Image' }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ asset('storage/' . $featuredImage->file_path) }}"/>
                    @else
                        <img alt="Placeholder" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIax70COEU7fvZEJR0QBI1fY7jUEUVKbuTHcFPbRHv8plnngi---B1Ae9S-d2no4xMWKyAkVYZHjv7qp2P_vfWw_uQ67ib4nYJlxPwz3pJkajADPy5MbeWLksX_U2X2OqVtDkAL25e6n0a2eaoPECLbvb4AOVlrlqlvHiq_4GYEvnkFloixUNBRS6_XAHwBMdnnEImYziAhmd1YkRpo_85UXdEWuEiGz2Ld5fn8IKSZEIHZpCcRIPtK2rCEk_ynJ9HSoNDu2RJV6ew"/>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <p class="text-white font-bold text-lg">Featured Upload</p>
                    </div>
                </div>

                <div class="relative group overflow-hidden rounded-lg">
                    <img alt="Kids martial arts class" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVzX3ClztmHBwAqACGkf8CagLL3v0MpOsdMs7HhI0WyFaOA3jZ7uXEQVjO4LyWi1moVOvAetAUUZsTNaM-6YjIKwFTOZbqsYHhmVwLEk2VAG5FAl7H6a7sIjj6eXV-MNquBAReVTgsCZYOe_mGbsXLTinzv1ykn-gngwnY8NQA7knBm_N7d7Vi-PWtkB0IfETG2KbNE25-9Akby6cn6-eYMprLdPHgLoskcgTbd8MflEUG8aAE8KAVOKZo1QUydinYMzTJQfoUGogA"/>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="material-icons text-white">zoom_in</span>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-lg">
                    <img alt="Meditation before training" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPPVqOAuxlA0lf_o6r8AUnlaijo1E-3X0hutz8xMV9fNQ2rfumCqLlq11HXFVIzjvHPreUX3wIGxiQYSTzqLPGqO59dde89_k0TIlCIpx46nvzLnUVdP002lM4LgbR7KWfOXzV85nlIl13ZqD-QZ18B-cmo3H3jWxVDnVSK87oTj1HwmaABpY32ALwvXyVRc2uH2cmBXHPC0KaxOo58ZkjbOwwcZAEF6sKBvYWcdI2qQs2wpPegPBL_TFSFIsVEkB31AtagYrIaX9s"/>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="material-icons text-white">zoom_in</span>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2 relative group overflow-hidden rounded-lg">
                    <img alt="Rows of black belts" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBWV4OtJAcCqXkCNdAskcG0wz5AXkbvcCmW1bDijmO8FpF4ecOxsto432Fw8QZ3-TFtDCFAs5L0sksm6HMicIgGWQBsb-LWk-YM2IVLnur2JcXE0hlZdE0zD9QtJRNTldHVr5eLfhMwmMrpTAZCk4y3dJN_1HqRsMbxkoUDYVXh8vwMm6vdKgUdreQw6EfBoBS_8Bt1dPZPABvOeDbOnH13FW1nkU5IHkNvTWlaSoAcx-vBZN6ciI4vYHh6LgzeMB8UH8Z9Tbsm-j9"/>
                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="material-icons text-white">zoom_in</span>
                    </div>
                </div>
            </div>
            
            <a class="md:hidden mt-6 flex justify-center items-center text-primary font-bold hover:text-orange-700 transition-colors uppercase text-sm tracking-wide" href="{{ route('gallery.images') }}">
                View Full Gallery <span class="material-icons text-sm ml-1">arrow_forward_ios</span>
            </a>
        </div>
    </section>

    <section class="py-16 bg-secondary text-white relative overflow-hidden" id="join">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-primary rounded-full opacity-10 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-primary rounded-full opacity-10 blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-display mb-6">Dojo Details</h2>
                    <p class="text-gray-300 text-lg mb-8 font-light">
                        Our academy offers a variety of classes suitable for all ages and skill levels. Whether you are looking to compete or just stay fit, Karafence has a spot for you.
                    </p>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4 p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors border-l-4 border-primary">
                            <span class="material-icons text-primary text-3xl">school</span>
                            <div>
                                <h4 class="font-bold text-xl mb-1">Beginner Classes</h4>
                                <p class="text-gray-400 text-sm">Mon & Wed: 5:00 PM - 6:30 PM</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4 p-4 bg-white/5 rounded-lg hover:bg-white/10 transition-colors border-l-4 border-primary">
                            <span class="material-icons text-primary text-3xl">sports_martial_arts</span>
                            <div>
                                <h4 class="font-bold text-xl mb-1">Advanced Kumite</h4>
                                <p class="text-gray-400 text-sm">Tue & Thu: 7:00 PM - 9:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-card-dark text-secondary dark:text-gray-200 p-8 rounded-xl shadow-2xl">
                    <h3 class="text-2xl font-display mb-6 text-center text-primary uppercase">Start Your Journey</h3>
                    <form class="space-y-4" action="#" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold mb-2">First Name</label>
                                <input class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-primary" type="text" name="first_name"/>
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Last Name</label>
                                <input class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-primary" type="text" name="last_name"/>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold mb-2">Email Address</label>
                            <input class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-primary" type="email" name="email"/>
                        </div>
                        <button class="w-full bg-primary hover:bg-orange-600 text-white font-bold py-3 px-4 rounded shadow-md transform active:scale-95 transition-all mt-4" type="submit">
                            Book Free Trial
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection