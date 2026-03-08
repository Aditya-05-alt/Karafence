<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Karafence Academy - Martial Arts</title>
    
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,400&family=Noto+Serif+JP:wght@600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              primary: "#D97736", 
              secondary: "#1A2E40", 
              "background-light": "#FDF6E3", 
              "background-dark": "#121212", 
              "card-light": "#FFFDF5",
              "card-dark": "#1E1E1E",
            },
            fontFamily: {
              display: ["'Anton'", "sans-serif"],
              body: ["'Roboto Condensed'", "sans-serif"],
              japanese: ["'Noto Serif JP'", "serif"],
            },
            borderRadius: {
              DEFAULT: "0.5rem",
              xl: "1rem",
            },
          },
        },
      };
    </script>
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background-color: #D97736; border-radius: 4px; }
        .text-shadow { text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
        .clip-slant { clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%); }
    </style>

    <script>
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.remove('dark');
        } else {
            // Default to dark if not set
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="bg-background-light dark:bg-background-dark text-secondary dark:text-gray-200 font-body transition-colors duration-300 flex flex-col min-h-screen">

    <nav class="fixed w-full z-50 bg-background-light/95 dark:bg-background-dark/95 backdrop-blur-sm border-b-2 border-primary shadow-lg transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="font-display text-2xl tracking-wider text-secondary dark:text-white uppercase">Karafence</span>
                </div>
                
                <div class="hidden md:flex space-x-8 items-center">
                    <a class="text-secondary dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold uppercase tracking-wide transition-colors" href="{{ route('home') }}">Home</a>
                    <a class="text-secondary dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold uppercase tracking-wide transition-colors" href="{{ route('about') }}">About Us</a>
                    <a class="text-secondary dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold uppercase tracking-wide transition-colors" href="{{ route('gallery.images') }}">Gallery</a>
                    <a class="text-secondary dark:text-gray-300 hover:text-primary dark:hover:text-primary font-bold uppercase tracking-wide transition-colors" href="{{ route('contact') }}">Contact</a>
                    
                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5 transition-colors">
                        <span id="theme-toggle-dark-icon" class="hidden material-icons">dark_mode</span>
                        <span id="theme-toggle-light-icon" class="hidden material-icons">light_mode</span>
                    </button>

                    <a class="bg-primary hover:bg-orange-600 text-white px-5 py-2 rounded-full font-bold uppercase text-sm tracking-wider shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all" href="{{ route('contact') }}">
                        Join Now
                    </a>
                </div>

                <div class="md:hidden flex items-center space-x-4">
                    <button id="theme-toggle-mobile" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2 transition-colors">
                        <span id="theme-toggle-dark-icon-mobile" class="hidden material-icons">dark_mode</span>
                        <span id="theme-toggle-light-icon-mobile" class="hidden material-icons">light_mode</span>
                    </button>

                    <button class="text-secondary dark:text-gray-200 hover:text-primary focus:outline-none">
                        <span class="material-icons text-3xl">menu</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-card-light dark:bg-card-dark border-t border-primary/30 pt-16 pb-8 transition-colors duration-300 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mb-12">
                <div>
                    <span class="font-display text-2xl tracking-wider text-secondary dark:text-white uppercase">Karafence</span>
                    <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed">
                        Dedicated to preserving traditional martial arts values while adapting to modern self-defense needs. Join us to build character through effort.
                    </p>
                    <div class="mt-6 flex space-x-4">
                        <a class="w-10 h-10 rounded-full bg-secondary text-white flex items-center justify-center hover:bg-primary transition-colors" href="#"><span class="text-sm font-bold">FB</span></a>
                        <a class="w-10 h-10 rounded-full bg-secondary text-white flex items-center justify-center hover:bg-primary transition-colors" href="#"><span class="text-sm font-bold">IG</span></a>
                        <a class="w-10 h-10 rounded-full bg-secondary text-white flex items-center justify-center hover:bg-primary transition-colors" href="#"><span class="text-sm font-bold">YT</span></a>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold text-lg mb-4 text-secondary dark:text-white uppercase tracking-wide">Contact Us</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="material-icons text-primary mr-3">location_on</span>
                            <span class="text-gray-600 dark:text-gray-400">123 Dojo Way, Black Belt City, CA 90210</span>
                        </li>
                        <li class="flex items-center">
                            <span class="material-icons text-primary mr-3">phone</span>
                            <span class="text-gray-600 dark:text-gray-400">(555) 123-4567</span>
                        </li>
                        <li class="flex items-center">
                            <span class="material-icons text-primary mr-3">email</span>
                            <span class="text-gray-600 dark:text-gray-400">sensei@karafence.com</span>
                        </li>
                    </ul>
                </div>
                <div class="h-48 rounded-lg overflow-hidden shadow-md border border-gray-200 dark:border-gray-700">
                    <iframe allowfullscreen="" frameborder="0" height="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0636734183863!2d-122.41941548468165!3d37.77492927975974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c6c8f4459%3A0xb10ed6d9b5050fa5!2sTwitter+HQ!5e0!3m2!1sen!2sus!4v1530644080128" style="border:0" width="100%"></iframe>
                </div>
            </div>
            <div class="border-t border-gray-300 dark:border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 dark:text-gray-500 text-sm">
                    © {{ date('Y') }} Karafence Academy. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        var themeToggleDarkIcons = document.querySelectorAll('#theme-toggle-dark-icon, #theme-toggle-dark-icon-mobile');
        var themeToggleLightIcons = document.querySelectorAll('#theme-toggle-light-icon, #theme-toggle-light-icon-mobile');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'light') {
            themeToggleDarkIcons.forEach(function(el) { el.classList.remove('hidden'); });
        } else {
            themeToggleLightIcons.forEach(function(el) { el.classList.remove('hidden'); });
        }

        var themeToggleBtns = document.querySelectorAll('#theme-toggle, #theme-toggle-mobile');

        themeToggleBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                // toggle icons inside button
                themeToggleDarkIcons.forEach(function(el) { el.classList.toggle('hidden'); });
                themeToggleLightIcons.forEach(function(el) { el.classList.toggle('hidden'); });

                // if set via local storage previously
                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                // if NOT set via local storage previously, default is dark, so switch to light
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            });
        });
    </script>
</body>
</html>