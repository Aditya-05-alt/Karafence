@extends('layouts.app')

@section('content')
    <header class="relative bg-secondary text-white overflow-hidden clip-slant pb-24 pt-32 lg:pt-40 dark:bg-gray-800">
        <div class="absolute inset-0 opacity-20">
            <img alt="Dojo background texture" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuARWDzj1_AjT9Gci7quMD0cQbCnAa4T9R96AgayV34BXocGhj07MUJbUqbj1lz5raGq1Rd7_hjpjxQl3kEV6amBW7BfxENm1Cxt59W7OTJSCJ2FaQekKbCQy3czP2slRsD8Jf7M225tGHMNj8PNTePtYcdLvgvSAYJYGcV4MDAK8-ERn1yIxU9zlwfvyhvFQB2J7yB2evQ2e9gKjLwKbZUEgqIrHtQFD9sL3nbsWCy7eIfsHXiJe1gUKJl2Hi9C9skFhgAoax6Xi-fp"/>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center">
            <h1 class="text-5xl md:text-7xl font-display uppercase tracking-wider mb-4 text-[#FBE6C4] drop-shadow-lg">
                The Way of Strength
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl font-light">
                Discover the history, philosophy, and spirit that drives Karafence Academy.
            </p>
            <div class="mt-8 flex justify-center">
                <span class="text-4xl text-primary font-bold">鎮 力 道</span>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-10">
        <section class="mb-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="bg-surface-light dark:bg-surface-dark p-8 rounded-xl shadow-xl border-t-4 border-primary relative">
                    <div class="absolute -top-6 -left-6 bg-secondary text-white p-4 rounded-lg shadow-lg">
                        <span class="material-icons text-3xl">emoji_objects</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-display text-secondary dark:text-white mb-6 uppercase">Our Mission</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed text-lg">
                        At Karafence Academy, we believe martial arts is more than just fighting; it is a path to self-discovery. Our mission is to empower individuals through the discipline of karate, fostering physical strength, mental resilience, and unwavering character.
                    </p>
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                        We strive to create a supportive community where students of all ages can challenge themselves, respect others, and achieve their personal best both inside and outside the dojo.
                    </p>
                </div>
                <div class="relative h-96 rounded-xl overflow-hidden shadow-2xl group">
                    <img alt="Students practicing karate" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAThqkQzSSX_AN8W6wRfuvtA0IuRt9d9p4pFBkWUnODegx863__GDdoef3UHZoEotWAgUrnKF5Wc6lU0tcr5XmTmHPvILJh27BgFluz98V2pW83rHAPhBnGv3hqSdU13uYnk2RpXCYHBJ_cEwaIZtm4dHUdd5Q3ntGW0tbljVAk2nAdQ5VxAaapawKEkKPEg6KIrc725bcr5IuF0R814wy3mQGnMGUxBPZpZzBkSOowixEnqwG97rWx85D3rk6WY-a7Yt-E8J6Oxhl1"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-secondary/80 to-transparent flex items-end p-6">
                        <p class="text-white font-display text-xl tracking-wide">Focus. Discipline. Respect.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="bg-secondary dark:bg-gray-800 rounded-2xl shadow-lg p-10 mb-24 text-white">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/20">
                <div>
                    <span class="block text-4xl md:text-5xl font-display text-primary mb-2">25+</span>
                    <span class="uppercase text-sm tracking-widest text-gray-300">Years of History</span>
                </div>
                <div>
                    <span class="block text-4xl md:text-5xl font-display text-primary mb-2">500+</span>
                    <span class="uppercase text-sm tracking-widest text-gray-300">Black Belts</span>
                </div>
                <div>
                    <span class="block text-4xl md:text-5xl font-display text-primary mb-2">12</span>
                    <span class="uppercase text-sm tracking-widest text-gray-300">Masters</span>
                </div>
                <div>
                    <span class="block text-4xl md:text-5xl font-display text-primary mb-2">1</span>
                    <span class="uppercase text-sm tracking-widest text-gray-300">Philosophy</span>
                </div>
            </div>
        </div>

        <section class="mb-24">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-display text-secondary dark:text-white uppercase mb-4">Meet The Sensei</h2>
                <div class="h-1 w-24 bg-primary mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">Led by world-class instructors dedicated to passing down the ancient traditions of martial arts.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-surface-light dark:bg-surface-dark rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow border border-gray-100 dark:border-gray-700 group">
                    <div class="h-80 overflow-hidden relative">
                        <img alt="Master Kenji" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCc3R7EVg9wJ6BgPez7XFBW-bF_Huk26IQTQn3Fkd_kh-G2XGpoNI5QIVGAe5eZwvVBKhEH7Lp8WoXB8vZDFrifoxc6n8lbFTzX5o2m2MUs_Q9mLDJKw-wWne4CuHE495oaeYvvfJHMdxHMnBocYXN27bBqaVWOHNrFhrHx7lJ8nHy2_3x0E9b_L_GxnyDhCbBCJDQhXHzR22aF8_fhaAeXsnuOgVzVYmmjhyy7b71Rvot1uARdooGBW6nCuFuhS5GbrKbQLIj9SdXq"/>
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent p-4">
                            <h3 class="text-white font-display text-2xl">Master Kenji</h3>
                            <p class="text-primary font-medium">Head Instructor, 7th Dan</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                            With over 40 years of experience, Master Kenji founded Karafence Academy to bring authentic karate to the modern world. His teaching focuses on precision and spirit.
                        </p>
                        <div class="flex space-x-3">
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-xs rounded text-gray-600 dark:text-gray-300">Shotokan</span>
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-xs rounded text-gray-600 dark:text-gray-300">Kata Expert</span>
                        </div>
                    </div>
                </div>

                <div class="bg-surface-light dark:bg-surface-dark rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow border border-gray-100 dark:border-gray-700 group">
                    <div class="h-80 overflow-hidden relative">
                        <img alt="Sensei Sarah" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB5t0H87a9Pru80oaTnZpmKLXJvNq_EjqjCYgpP7UhAIOnXiLSLyVdIURMsf0RkX_zH3TFKKQDUzTeU1hmE1nGX4wHNa8mc2cTS70RdVnLoo--e4P8QUqGMzy2xqfvLGF6-mgr40y55bB40QpmIBLXqhpr8atHkS_Rdf7kysI3FKRE21t2jQ5d0X8VsdDrpjOunnVNRR5BmBttsshnMIy8lL15TKuGrzBMFWW8N1HJUT0H5YskuNAmigtFnRLKTpBnykIhMnrIW4hhZ"/>
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent p-4">
                            <h3 class="text-white font-display text-2xl">Sensei Sarah</h3>
                            <p class="text-primary font-medium">Senior Instructor, 4th Dan</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                            A former national champion, Sensei Sarah specializes in kumite (sparring) and self-defense techniques. She leads our youth competition team.
                        </p>
                        <div class="flex space-x-3">
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-xs rounded text-gray-600 dark:text-gray-300">Kumite</span>
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-xs rounded text-gray-600 dark:text-gray-300">Youth Lead</span>
                        </div>
                    </div>
                </div>

                <div class="bg-surface-light dark:bg-surface-dark rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow border border-gray-100 dark:border-gray-700 group">
                    <div class="h-80 overflow-hidden relative">
                        <img alt="Sensei David" class="w-full h-full object-cover object-center transition-transform duration-500 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAfV180mCCTBEX7I7HGzhFFB5g7vX9O4-WUAYQMT5jonZVr-CoGfgrF685E8KZW07SddBfhs_5aVM8WrBSizKuDr4PMHiVFFu68W9IPX2uTyiKrS3uVcjccPqzhS6lUL5v_GjZwWWu_iIZY6YklEXHuVKyUQHeuJe2DTuta7v6LgTOJcdkMCovlIW58S0AbJhbrZDi5CJPRv-YrRuJfU1o41gJMBgijqTFQHOel3X-VPMjtIQ2v2QdLZ9G1NJFWIc4CpW9-vt69awnz"/>
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent p-4">
                            <h3 class="text-white font-display text-2xl">Sensei David</h3>
                            <p class="text-primary font-medium">Instructor, 3rd Dan</p>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4">
                            Focusing on the philosophical and meditative aspects of martial arts, Sensei David helps students find balance and mental clarity through movement.
                        </p>
                        <div class="flex space-x-3">
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-xs rounded text-gray-600 dark:text-gray-300">Meditation</span>
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-xs rounded text-gray-600 dark:text-gray-300">Conditioning</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-16">
            <div class="bg-secondary text-white rounded-2xl overflow-hidden shadow-2xl flex flex-col lg:flex-row dark:bg-gray-800">
                <div class="lg:w-1/2 relative h-64 lg:h-auto">
                    <img alt="Old black and white dojo photo" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBeswOxyjxKcDU1DFxjlfGNmUUZps4wumZmN3yvgg6KyZByhJHHMvfsgBocqS8EhtxcQJ1jRyoe6BLUOow5VqfXrbIRzVTmAj6wl7p3-U7WlATk4--AmYL6RW96OOog54KFDXl31q84Bu0Te2uDLoQAkFqe5nW58WQR3oPlQwTyucc90oM-Ku7-51QQun8YzEUWBaZKWKhV-6BnU876Hy3eImKP-paQaHS5RY7DLJVzlh9k6WBifCqxCle_zLrCIKIwb19OjqyEldrc"/>
                    <div class="absolute inset-0 bg-secondary/40 dark:bg-gray-900/40"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="border-4 border-[#FBE6C4] p-6 rotate-3">
                            <h3 class="text-4xl font-display uppercase tracking-widest text-[#FBE6C4] text-center">Since<br/>1998</h3>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 p-10 lg:p-16 flex flex-col justify-center">
                    <h2 class="text-3xl font-display text-primary mb-6 uppercase">Dojo History</h2>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Karafence Academy was established in a small garage in 1998. What started as a humble gathering of five students passionate about the art of self-defense has grown into a premier institution for martial arts excellence.
                    </p>
                    <p class="text-gray-300 mb-8 leading-relaxed">
                        Over the decades, we have maintained our core values while adapting our facilities to provide a state-of-the-art training environment. Our walls have witnessed thousands of students earn their belts through sweat, determination, and perseverance.
                    </p>
                    <div class="flex items-center gap-4">
                        <button class="text-[#FBE6C4] border border-[#FBE6C4] hover:bg-[#FBE6C4] hover:text-secondary px-6 py-2 rounded uppercase text-sm font-bold transition-colors">
                            View Timeline
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2 class="text-center text-3xl font-display text-secondary dark:text-white mb-12 uppercase">The Karafence Philosophy</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md border-b-4 border-primary text-center">
                    <div class="w-16 h-16 bg-background-light dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-4 text-secondary dark:text-primary">
                        <span class="material-icons text-3xl">psychology</span>
                    </div>
                    <h3 class="font-display text-xl text-secondary dark:text-white mb-2">Mind</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Cultivating focus, awareness, and mental resilience.</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md border-b-4 border-primary text-center">
                    <div class="w-16 h-16 bg-background-light dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-4 text-secondary dark:text-primary">
                        <span class="material-icons text-3xl">fitness_center</span>
                    </div>
                    <h3 class="font-display text-xl text-secondary dark:text-white mb-2">Body</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Building strength, flexibility, and physical capability.</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md border-b-4 border-primary text-center">
                    <div class="w-16 h-16 bg-background-light dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-4 text-secondary dark:text-primary">
                        <span class="material-icons text-3xl">favorite</span>
                    </div>
                    <h3 class="font-display text-xl text-secondary dark:text-white mb-2">Spirit</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Developing character, humility, and indomitable will.</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-md border-b-4 border-primary text-center">
                    <div class="w-16 h-16 bg-background-light dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-4 text-secondary dark:text-primary">
                        <span class="material-icons text-3xl">groups</span>
                    </div>
                    <h3 class="font-display text-xl text-secondary dark:text-white mb-2">Community</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Forging bonds through shared struggle and triumph.</p>
                </div>
            </div>
        </section>
    </main>
@endsection