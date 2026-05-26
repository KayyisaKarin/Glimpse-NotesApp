<!DOCTYPE html>
<html lang="en">

<head>
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
            <h1 class="font-rethink text-bluee text-xl font-bold pl-2">Glimpse</h1>
        </div>
        <div class="flex space-x-2">
            <a href="#" class="bg-bluee text-white px-6 py-1 rounded-lg">login</a>
            <a href="#" class="bg-bluee text-white px-6 py-1 rounded-lg">register</a>
        </div>
    </header>

    {{-- Hero --}}
    <section class="pt-85 space-y-4 px-4">
        <h1 class="font-rethink font-bold text-8xl"><span
                class="font-playball bg-bluee text-white pl-2 pr-4">W</span>rite Everything.</h1>
        <h1 class="font-rethink font-bold text-8xl"><span
                class="font-playball bg-bluee text-white pl-2 pr-8">F</span>orget Nothing</h1>
        <p class="text-2xl">Save ideas, tasks, and memories instantly in a smart and colorful <br> workspace built for
            everyday productivity.</p>
    </section>

    <img class="w-full absolute -bottom-150" src="{{ asset('assets/Vector.png') }}" alt="">

    {{-- Why Choose Us --}}
    <section class="py-20 px-4">
        <h2 class="font-rethink text-6xl font-bold">Smarter Notes, <br>Better Workflow</h2>
        <div class="py-10 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
            <div
                class="w-70 h-70 bg-white/50 border-4 border-yollow rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs">
                <h3 class="text-2xl font-bold text-jeruk align-middle">Smart <br>Organization</h3>
            </div>
            <div
                class="w-70 h-70 bg-white/50 border-4 border-plant rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs">
                <h3 class="text-2xl font-bold text-plant align-middle">Creative <br>Workspace</h3>
            </div>
            <div
                class="w-70 h-70 bg-white/50 border-4 border-mad rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs">
                <h3 class="text-2xl font-bold text-mad align-middle">Distraction-Free Design</h3>
            </div>
            <div
                class="w-70 h-70 bg-white/50 border-4 border-bluee rounded-2xl flex flex-col items-center justify-center text-center p-4 backdrop-blur-xs">
                <h3 class="text-2xl font-bold text-violet align-middle">Flexible for Everyone</h3>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="pb-20 px-4">
        <h2 class="font-rethink text-6xl font-bold">Simple Notes, <br>Happy Users</h2>
        <div>
            
        </div>
    </section>
</body>

</html>
