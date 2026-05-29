<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Astra Archives | E-Library</title>

    <link rel="shortcut icon" href="{{ asset('storage/assets/AstraArchiveLogo.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#050b18] font-sans text-white">
    <a href="{{ route('login') }}"
                        class="flex items-center gap-2 bg-[#1132a8] hover:bg-[#1132a8]/80 text-white px-4 md:px-6 py-2 md:py-2.5 rounded-full text-sm md:text-base font-semibold transition-all shadow-[0_0_15px_rgba(17,50,168,0.4)] border border-blue-400/20">
                        Admin <i class="ri-arrow-right-line hidden sm:inline"></i>
                    </a>

</body>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Glimpse') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/Logo.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative py-2 overflow-x-hidden font-plusjakarta">
    <img class="absolute w-200 -z-50 right-0 top-0" src="{{ asset('assets/Hero Img.png') }}" alt="Hero Img">

    {{-- Navbar --}}
    <header
        class="fixed z-50 w-full bg-gray-100/50 flex items-center justify-between px-6 py-2 rounded-full shadow-xs backdrop-blur-xs">
        <div class="flex items-center">
            <img class="w-8" src="{{ asset('assets/Logo.png') }}" alt="Logo">
            <h1 class="font-rethink text-blue text-xl font-bold pl-2">Glimpse</h1>
        </div>
        <div class="flex space-x-2">
            <a href="#" class="bg-blue text-white px-6 py-1 rounded-lg">login</a>
            <a href="#" class="bg-blue text-white px-6 py-1 rounded-lg">register</a>
        </div>
    </header>

    {{-- Hero --}}
    <section class="pt-85 space-y-4 px-4">
        <h1 class="font-rethink font-bold text-8xl"><span
                class="font-playball bg-blue text-white pl-2 pr-4">W</span>rite Everything.</h1>
        <h1 class="font-rethink font-bold text-8xl"><span
                class="font-playball bg-blue text-white pl-2 pr-8">F</span>orget Nothing</h1>
        <p class="text-2xl">Save ideas, tasks, and memories instantly in a smart and colorful <br> workspace built for
            everyday productivity.</p>
    </section>

    <img class="w-full absolute bottom-0 -z-50" src="{{ asset('assets/Vector.png') }}" alt="">

    {{-- Why Choose Us --}}
    <section class="py-20 px-4">
        <h2 class="font-rethink text-6xl font-bold">Smarter Notes, <br>Better Workflow</h2>
        <div class="py-10 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
            <div
                class="w-70 h-70 bg-white/50 border-4 border-yellow rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs">
                <h3 class="text-2xl font-bold text-orange align-middle">Smart <br>Organization</h3>
            </div>
            <div
                class="w-70 h-70 bg-white/50 border-4 border-green rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs">
                <h3 class="text-2xl font-bold text-green align-middle">Creative <br>Workspace</h3>
            </div>
            <div
                class="w-70 h-70 bg-white/50 border-4 border-red rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs">
                <h3 class="text-2xl font-bold text-red align-middle">Distraction-Free Design</h3>
            </div>
            <div
                class="w-70 h-70 bg-white/50 border-4 border-blue rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs">
                <h3 class="text-2xl font-bold text-violet align-middle">Flexible for Everyone</h3>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="pb-20 px-4">
        <h2 class="font-rethink text-6xl font-bold">Simple Notes, <br>Happy Users</h2>
        <div class="block md:flex">
        <div class="space-y-0">
            <i class="ri-double-quotes-l text-violet text-[230px]"></i>
            <h2 class="text-violet text-5xl font-bold">What They <br>Say About Us</h2>
        </div>
        </div>
    </section>
</body>

</html>