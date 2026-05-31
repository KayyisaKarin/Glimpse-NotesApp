<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ config('app.name', 'Glimpse') }}</title>
<link rel="shortcut icon" href="{{ asset('assets/Logo.png') }}" type="image/x-icon">

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative pt-2 overflow-x-hidden font-plusjakarta">
    <img class="absolute w-200 -z-50 right-0 top-0" src="{{ asset('assets/Hero Img.png') }}" alt="Hero Img">

    {{-- Navbar --}}
    <header
        class="fixed z-50 left-0 right-0 bg-gray-100/50 flex items-center justify-between mx-6 px-8 py-2 rounded-full shadow-xs backdrop-blur-xs">
        <div class="flex items-center">
            <img class="w-8" src="{{ asset('assets/Logo.png') }}" alt="Logo">
            <h1 class="font-rethink text-brand-blue text-xl font-bold pl-2">Glimpse</h1>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('login') }}" class="bg-brand-blue text-white px-6 py-1 rounded-lg">login</a>
            <a href="{{ route('login', ['mode' => 'register']) }}" class="bg-brand-blue text-white px-6 py-1 rounded-lg">register</a>
        </div>
        
    </header>

    {{-- Hero --}}
    <section class="pt-85 space-y-4 px-10">
        <h1 class="font-rethink font-bold text-7xl lg:text-8xl"><span
                class="font-playball bg-brand-blue text-white pl-2 pr-4">W</span>rite Everything.</h1>
        <h1 class="font-rethink font-bold text-7xl lg:text-8xl"><span
                class="font-playball bg-brand-blue text-white pl-2 pr-8">F</span>orget Nothing.</h1>
        <p class="text-2xl">Save ideas, tasks, and memories instantly in a smart and colorful <br> workspace built for
            everyday productivity.</p>
    </section>

    <img class="w-full absolute bottom-0 -z-50" src="{{ asset('assets/Vector.png') }}" alt="">

    {{-- Why Choose Us --}}
    <section class="py-20 px-10">
        <h2 class="font-rethink text-6xl font-bold">Smarter Notes, <br>Better Workflow</h2>
        <div class="py-10 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4 place-items-center">
            <div
                class="relative w-70 h-70 bg-white/50 border-4 border-brand-yellow rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs 
                transition-all duration-500 ease-in-out hover:bg-brand-yellow group">
                <h3
                    class="text-2xl font-bold text-brand-orange text-center transition-all duration-500 ease-in-out group-hover:opacity-0">
                    Smart <br>Organization</h3>
                <p
                    class="absolute px-4 text-xl font-semibold text-brand-red opacity-0 transition-all duration-500 ease-in-out group-hover:opacity-100">
                    Keep your thoughts, tasks, and reminders neatly arranged without extra effort.</p>
            </div>
            <div
                class="relative w-70 h-70 bg-white/50 border-4 border-brand-green rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs
                transition-all duration-500 ease-in-out hover:bg-brand-green group">
                <h3
                    class="text-2xl font-bold text-brand-green text-center transition-all duration-500 ease-in-out group-hover:opacity-0">
                    Creative <br>Workspace</h3>
                <p
                    class="absolute px-4 text-xl font-semibold text-white opacity-0 transition-all duration-500 ease-in-out group-hover:opacity-100">
                    A colorful environment designed to make studying and planning more fun.</p>
            </div>
            <div
                class="relative w-70 h-70 bg-white/50 border-4 border-brand-red rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs
                transition-all duration-500 ease-in-out hover:bg-brand-red group">
                <h3
                    class="text-2xl font-bold text-brand-red text-center transition-all duration-500 ease-in-out group-hover:opacity-0">
                    Distraction-Free Design</h3>
                <p
                    class="absolute px-4 text-xl font-semibold text-white opacity-0 transition-all duration-500 ease-in-out group-hover:opacity-100">
                    Focused layouts help you stay productive while keeping everything visually clean.</p>
            </div>
            <div
                class="relative w-70 h-70 bg-white/50 border-4 border-brand-blue rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs
                transition-all duration-500 ease-in-out hover:bg-brand-blue group">
                <h3
                    class="text-2xl font-bold text-brand-purple text-center transition-all duration-500 ease-in-out group-hover:opacity-0">
                    Flexible for Everyone</h3>
                <p
                    class="absolute px-4 text-xl font-semibold text-white opacity-0 transition-all duration-500 ease-in-out group-hover:opacity-100">
                    Perfect for students, creators, and anyone who wants better note organization.</p>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="pb-20 px-10">
        <div class="block lg:flex items-center justify-between pt-10">
            <h2 class="font-rethink text-6xl font-bold">Simple Notes, <br>Happy Users</h2>
            <img class="pt-10 lg:pt-0" src="{{ asset('assets/Orange Tomato.png') }}" alt="Orange Tomato">
        </div>
        <div class="flex flex-col md:flex-row pt-10">
            <div class="pb-10 relative md:w-85 lg:w-90 shrink-0">
                <i class="absolute ri-double-quotes-l text-brand-purple text-[230px]"></i>
                <h2 class="text-brand-purple text-5xl/18 font-bold pt-65">What They <br>Say About Us</h2>
            </div>
            <div class="flex-1 overflow-x-auto scrollbar-none shrink-0 pb-4">
                <div class="flex gap-5" style="width: max-content;">
                    {{-- Item --}}
                    <div
                        class="relative w-90 h-100 bg-white/50 border-4 border-brand-pink rounded-2xl backdrop-blur-xs shadow-xs">
                        <div class="absolute w-20 h-20 bg-black rounded-full left-1/2 -translate-x-1/2 top-4"></div>
                        <div class="flex text-brand-yellow text-4xl items-center justify-center space-x-1 pt-28">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="text-brand-purple text-center text-lg px-4 py-4">This website makes organizing my
                            school notes so much easier. The colorful design feels fun and motivates me to stay
                            productive every day.</p>
                        <p class="text-brand-purple text-center text-xl font-semibold">Nana, Student</p>
                    </div>
                    {{-- Item --}}
                    <div
                        class="relative w-90 h-100 bg-white/50 border-4 border-brand-pink rounded-2xl backdrop-blur-xs shadow-xs">
                        <div class="absolute w-20 h-20 bg-black rounded-full left-1/2 -translate-x-1/2 top-4"></div>
                        <div class="flex text-brand-yellow text-4xl items-center justify-center space-x-1 pt-28">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="text-brand-purple text-center text-lg px-4 py-4">This website makes organizing my
                            school notes so much easier. The colorful design feels fun and motivates me to stay
                            productive every day.</p>
                        <p class="text-brand-purple text-center text-xl font-semibold">Nana, Student</p>
                    </div>
                    {{-- Item --}}
                    <div
                        class="relative w-90 h-100 bg-white/50 border-4 border-brand-pink rounded-2xl backdrop-blur-xs shadow-xs">
                        <div class="absolute w-20 h-20 bg-black rounded-full left-1/2 -translate-x-1/2 top-4"></div>
                        <div class="flex text-brand-yellow text-4xl items-center justify-center space-x-1 pt-28">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="text-brand-purple text-center text-lg px-4 py-4">This website makes organizing my
                            school notes so much easier. The colorful design feels fun and motivates me to stay
                            productive every day.</p>
                        <p class="text-brand-purple text-center text-xl font-semibold">Nana, Student</p>
                    </div>
                    {{-- Item --}}
                    <div
                        class="relative w-90 h-100 bg-white/50 border-4 border-brand-pink rounded-2xl backdrop-blur-xs shadow-xs">
                        <div class="absolute w-20 h-20 bg-black rounded-full left-1/2 -translate-x-1/2 top-4"></div>
                        <div class="flex text-brand-yellow text-4xl items-center justify-center space-x-1 pt-28">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p class="text-brand-purple text-center text-lg px-4 py-4">This website makes organizing my
                            school notes so much easier. The colorful design feels fun and motivates me to stay
                            productive every day.</p>
                        <p class="text-brand-purple text-center text-xl font-semibold">Nana, Student</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA & Step by step --}}
    <section class="pb-20 px-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-brand-blue px-10 py-24 rounded-2xl space-y-10">
            <div class="space-y-10">
                <h3 class="font-rethink bold text-4xl text-white">We make note-taking simple, colorful, and easy to
                    enjoy every day.</h3>
                <a href="#"
                    class="bg-brand-yellow font-medium text-lg text-center px-8 py-3 rounded-lg lg:text-left">
                    Start Now!
                </a>
            </div>
            <div class="space-y-10">
                <div class="flex items-center">
                    <i class="ri-sticky-note-add-line bg-brand-yellow px-4 py-4 text-4xl rounded-full"></i>
                    <div class="block text-white pl-4">
                        <h4 class="text-xl font-bold">Create Your First Note</h4>
                        <p>Quickly write down ideas and thoughts whenever inspiration comes.</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <i class="ri-folder-5-line bg-brand-yellow px-4 py-4 text-4xl rounded-full"></i>
                    <div class="block text-white pl-4">
                        <h4 class="text-xl font-bold">Organize Everything</h4>
                        <p>Sort your notes into categories to keep your workspace neat and stress-free.</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <i class="ri-file-edit-line bg-brand-yellow px-4 py-4 text-4xl rounded-full"></i>
                    <div class="block text-white pl-4">
                        <h4 class="text-xl font-bold">Update Notes Status</h4>
                        <p>Track your progress by updating note statuses to manage your tasks more efficiently.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="w-full px-10 py-4 bg-gray-100 shadow-xs">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 place-items-center text-center">
            <div class="flex items-center">
                <img class="w-8" src="{{ asset('assets/Logo.png') }}" alt="Logo">
                <h1 class="font-rethink text-brand-blue text-xl font-bold pl-2">Glimpse</h1>
            </div>
            <div class="flex space-x-4 items-center">
                <p>Privacy Police</p>
                <p>Terms of Service</p>
            </div>
            <div class="flex space-x-4 items-center">
                <div class="my-2">
                    <i class="ri-instagram-line ml-1 px-2 py-2 bg-brand-green text-white text-3xl rounded-full"></i>
                    <i class="ri-youtube-fill ml-1 px-2 py-2 bg-brand-green text-white text-3xl rounded-full"></i>
                    <i class="ri-twitter-fill ml-1 px-2 py-2 bg-brand-green text-white text-3xl rounded-full"></i>
                    <i
                        class="ri-facebook-circle-fill ml-1 px-2 py-2 bg-brand-green text-white text-3xl rounded-full"></i>
                </div>
            </div>
            <div>
                <p class="text-black/50">Copyright © 2026 Glimpse</p>
            </div>
        </div>
    </footer>
</body>

</html>
