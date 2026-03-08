@extends('layouts.app')

@section('content')
    <header class="bg-secondary text-white py-16 pt-32 relative overflow-hidden border-b border-slate-800">
        <div class="absolute inset-0 opacity-10" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDmxfY3LOki24D36tC71J-061DBwwNiVfOpq44E4puzX9R5bOpQWJTmoFiRWQHFTvZqAVsIeQ4fey5-XnyoahKOMNZkfFAeis6JTCb_amce_47LgJmo_77u7ZLoqMeocTl4W8J5aRyMjRmlw624CJU-RZfNeS9jYpsu8tTJaP7wD7KmkiyldgX5SIAdiwQL-tuu9IHNNxxDMVyfyX9_LvkokbZjZbhbwO743NrqJpB-40pit0kUny6RR0snAIUw2OUMR0joXPyS4sPq');"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-display font-black tracking-tight mb-4 text-white">Get In Touch</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto font-light">Whether you're a beginner looking to start your journey or an experienced martial artist, we're here to answer your questions.</p>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-lg p-8 border-t-4 border-primary border border-transparent dark:border-slate-800">
                <h2 class="text-2xl font-display font-bold text-secondary dark:text-white mb-6 flex items-center">
                    <span class="material-icons text-primary mr-2">mail_outline</span> Send us a Message
                </h2>
                <form action="#" class="space-y-6" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="first-name">First Name</label>
                            <input autocomplete="given-name" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring-primary dark:bg-background-dark dark:border-slate-700 dark:text-white sm:text-sm py-3 px-4 transition-colors" id="first-name" name="first_name" type="text" required/>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="last-name">Last Name</label>
                            <input autocomplete="family-name" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring-primary dark:bg-background-dark dark:border-slate-700 dark:text-white sm:text-sm py-3 px-4 transition-colors" id="last-name" name="last_name" type="text" required/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="email">Email Address</label>
                        <input autocomplete="email" class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring-primary dark:bg-background-dark dark:border-slate-700 dark:text-white sm:text-sm py-3 px-4 transition-colors" id="email" name="email" type="email" required/>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="program">Interested Program</label>
                        <select class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring-primary dark:bg-background-dark dark:border-slate-700 dark:text-white sm:text-sm py-3 px-4 transition-colors cursor-pointer" id="program" name="program">
                            <option>Karate for Kids</option>
                            <option>Adult Self-Defense</option>
                            <option>Competition Training</option>
                            <option>Private Lessons</option>
                            <option>General Inquiry</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300" for="message">Message</label>
                        <textarea class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-primary focus:ring-primary dark:bg-background-dark dark:border-slate-700 dark:text-white sm:text-sm py-3 px-4 transition-colors" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <div>
                        <button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all uppercase tracking-wider font-display font-bold" type="submit">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <div class="space-y-8">
                <div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-lg p-8 border-l-4 border-secondary dark:border-primary border-y border-r border-transparent dark:border-y-slate-800 dark:border-r-slate-800">
                    <h2 class="text-2xl font-display font-bold text-secondary dark:text-white mb-6">Dojo Information</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <span class="material-icons text-primary text-3xl">location_on</span>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Visit Us</h3>
                                <p class="text-slate-600 dark:text-slate-300 mt-1">
                                    123 Sensei Way, Dojo District<br/>
                                    Martial City, MC 90210
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <span class="material-icons text-primary text-3xl">phone</span>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Call Us</h3>
                                <p class="text-slate-600 dark:text-slate-300 mt-1">
                                    <a class="hover:text-primary transition-colors" href="tel:+15551234567">+1 (555) 123-4567</a>
                                </p>
                                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Mon-Fri from 9am to 8pm</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <span class="material-icons text-primary text-3xl">email</span>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Email Us</h3>
                                <p class="text-slate-600 dark:text-slate-300 mt-1">
                                    <a class="hover:text-primary transition-colors" href="mailto:info@karafence.com">info@karafence.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-surface-light dark:bg-surface-dark rounded-xl shadow-lg p-8 relative overflow-hidden border border-transparent dark:border-slate-800">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 text-primary opacity-10">
                        <span class="material-icons" style="font-size: 150px;">schedule</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-secondary dark:text-white mb-6 relative z-10">Training Hours</h2>
                    <ul class="space-y-3 relative z-10 text-slate-600 dark:text-slate-300">
                        <li class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-2">
                            <span>Monday - Thursday</span>
                            <span class="font-bold text-secondary dark:text-white">3:00 PM - 9:00 PM</span>
                        </li>
                        <li class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-2">
                            <span>Friday</span>
                            <span class="font-bold text-secondary dark:text-white">3:00 PM - 7:00 PM</span>
                        </li>
                        <li class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-2">
                            <span>Saturday</span>
                            <span class="font-bold text-secondary dark:text-white">9:00 AM - 2:00 PM</span>
                        </li>
                        <li class="flex justify-between text-primary">
                            <span>Sunday</span>
                            <span class="font-bold">Closed</span>
                        </li>
                    </ul>
                </div>

                <div class="rounded-xl shadow-lg overflow-hidden h-64 bg-slate-200 dark:bg-surface-dark relative group border border-transparent dark:border-slate-800">
                    <iframe allowfullscreen="" class="group-hover:filter-none transition-all duration-500" height="100%" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509374!2d144.9537353153169!3d-37.81732344202115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sus!4v1620022222222!5m2!1sen!2sus" style="border:0; filter: grayscale(1) contrast(1.2) opacity(0.8);" title="Dojo Location Map" width="100%"></iframe>
                    <div class="absolute bottom-4 right-4 bg-white dark:bg-background-dark px-3 py-1 text-xs font-bold rounded shadow-md text-slate-800 dark:text-white pointer-events-none border dark:border-slate-700">
                        Karafence Academy HQ
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-20 text-center">
            <h3 class="text-2xl font-display font-bold text-secondary dark:text-white mb-4">Frequently Asked Questions</h3>
            <p class="text-slate-600 dark:text-slate-400 mb-8">Have a quick question? Check our FAQ before sending a message.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                <div class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg shadow-sm border border-slate-200 dark:border-slate-800 hover:border-primary dark:hover:border-primary transition-colors cursor-pointer group">
                    <h4 class="font-bold text-secondary dark:text-white mb-2 group-hover:text-primary transition-colors">What age can my child start?</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400">We accept students as young as 4 years old in our Little Ninjas program.</p>
                </div>
                <div class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg shadow-sm border border-slate-200 dark:border-slate-800 hover:border-primary dark:hover:border-primary transition-colors cursor-pointer group">
                    <h4 class="font-bold text-secondary dark:text-white mb-2 group-hover:text-primary transition-colors">Do I need a uniform?</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400">For your first trial class, comfortable workout clothes are perfectly fine.</p>
                </div>
                <div class="bg-surface-light dark:bg-surface-dark p-6 rounded-lg shadow-sm border border-slate-200 dark:border-slate-800 hover:border-primary dark:hover:border-primary transition-colors cursor-pointer group">
                    <h4 class="font-bold text-secondary dark:text-white mb-2 group-hover:text-primary transition-colors">Is there a contract?</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400">We offer flexible month-to-month memberships as well as term commitments.</p>
                </div>
            </div>
        </div>
    </main>
@endsection