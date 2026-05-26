<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Glimpse</title>

    {{-- REMIXICON --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    {{-- IMPORTANT FAVICON!!! --}}
    <link rel="shortcut icon" href="{{ asset('assets/logo.svg') }}" type="image/x-icon">

    {{-- ALPINEJS FOR ABSOLUTE SWITCHING --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-brand-blue font-sans antialiased" x-data="{ isLogin: true }">
    <div>
        {{-- Your original top card decoration --}}
        <div class="max-w-7xl mx-auto my-16 bg-white rounded-[40px] shadow-lg h-150 w-full">
        </div>

        {{-- Background Image --}}
        <div class="fixed inset-0 z-5 w-full h-screen overflow-hidden">
            <img src="{{ asset('assets/login-bg.svg') }}" alt="login-bg" class="w-full h-full object-cover">
        </div>

        {{-- YOUR EXACT ORIGINAL CARD DIMENSIONS --}}
        <div
            class="fixed inset-0 z-10 max-w-3xl mx-auto my-16 mt-32 bg-white/70 border border-white rounded-[14px] h-100 w-full overflow-hidden">

            <div
                class="bg-white border-2 border-brand-purple rounded-[11px] py-3 mx-3 mt-5 flex items-center justify-center">
                <h1 class="font-bold text-2xl">Welcome back to
                    <img src="{{ asset('assets/logo.svg') }}" alt="logo" class="w-10 h-10 inline -mt-2">
                    <span class="text-brand-blue">Glimpse</span>
                </h1>
            </div>

            {{-- Relative wrapper container to hold both forms inside h-100 perfectly --}}
            <div class="relative w-full h-full">

                {{-- ==================== LOGIN VIEW (EXACTLY YOUR ORIGINAL) ==================== --}}
                <div class="absolute inset-x-0 top-0 grid grid-cols-2 mt-4 mx-10 gap-5" x-show="isLogin">
                    <div class="ml-12">
                        <h1 class="leading-[1.3] font-extrabold text-8xl">Log <br><span
                                class="text-white bg-brand-purple rounded-lg pr-6.5 px-2">in <i>!</i></span></h1>
                    </div>

                    <div class="mt-7">
                        <form action="" class="flex flex-col">
                            <h2 class="font-medium">Email</h2>
                            <input type="text" placeholder="Username"
                                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none mb-5 focus:ring-2 focus:ring-brand-blue">

                            <h2 class="font-medium">Password</h2>
                            <input type="password" placeholder="Password"
                                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none mb-6.5 focus:ring-2 focus:ring-brand-blue">
                            <button type="submit"
                                class="bg-brand-orange hover:bg-brand-orange-hover text-white font-semibold py-2 rounded-lg transition-all">Login</button>
                        </form>
                        <p class="mt-2 text-sm font-medium flex justify-center items-center text-gray-600">Don't have an
                            account? <a href="#" @click.prevent="isLogin = false"
                                class="text-brand-blue hover:underline ml-1">Sign up</a></p>
                    </div>
                </div>

                {{-- ==================== REGISTER VIEW (MIRRORED COPY) ==================== --}}
                <div class="absolute inset-x-0 top-0 grid grid-cols-2 mt-4 mx-10 gap-5" x-show="!isLogin" x-cloak>
                    <div class="ml-12">
                        <h1 class="leading-[1.3] font-extrabold text-8xl">Sign <br><span
                                class="text-white bg-brand-purple rounded-lg pr-4 px-2 pb-2">up <i>!</i></span></h1>
                    </div>

                    <div class="mt-7">
                        <form action="" class="flex flex-col">
                            <h2 class="font-medium">Email</h2>
                            <input type="text" placeholder="Email Address"
                                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none mb-5 focus:ring-2 focus:ring-brand-blue">

                            <h2 class="font-medium">Password</h2>
                            <input type="password" placeholder="Create Password"
                                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none mb-6.5 focus:ring-2 focus:ring-brand-blue">
                            <button type="submit"
                                class="bg-brand-orange hover:bg-brand-orange-hover text-white font-semibold py-2 rounded-lg transition-all">Register</button>
                        </form>
                        <p class="mt-2 text-sm font-medium flex justify-center items-center text-gray-600">Already have
                            an account? <a href="#" @click.prevent="isLogin = true"
                                class="text-brand-blue hover:underline ml-1">Log in</a></p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>
