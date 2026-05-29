<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Glimpse Notes' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
        integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="font-['Rethink_Sans']">
    <div class="flex min-h-screen w-full">

        <main class="flex-1 bg-gray-100 p-2">
            @yield('content')
        </main>

        <aside
            class="w-72 bg-white border-l min-h-screen shrink-0 font-['Plus_Jakarta_Sans'] flex flex-col justify-between">
            <div class="p-6">
                <div class="flex items-center justify-center scale-80 gap-3 mt-6 mb-12 select-none">
                    <img src="{{ asset('assets/glimpse-logo-text.png') }}" alt="Glimpse Logo">
                </div>

                <nav class="py-8 flex flex-col gap-2">
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 bg-[#f0f4f9] text-[#2563eb] rounded-lg font-bold text-sm transition-colors group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M3 12C3 12.5523 3.44772 13 4 13H10C10.5523 13 11 12.5523 11 12V4C11 3.44772 10.5523 3 10 3H4C3.44772 3 3 3.44772 3 4V12ZM3 20C3 20.5523 3.44772 21 4 21H10C10.5523 21 11 20.5523 11 20V16C11 15.4477 10.5523 15 10 15H4C3.44772 15 3 15.4477 3 16V20ZM13 20C13 20.5523 13.4477 21 14 21H20C20.5523 21 21 20.5523 21 20V12C21 11.4477 20.5523 11 20 11H14C13.4477 11 13 11.4477 13 12V20ZM14 3C13.4477 3 13 3.44772 13 4V8C13 8.55228 13.4477 9 14 9H20C20.5523 9 21 8.55228 21 8V4C21 3.44772 20.5523 3 20 3H14Z">
                            </path>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-[#2563eb] hover:bg-[#f0f4f9] rounded-lg font-bold text-sm transition-colors group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M15 14L14.8834 14.0067C14.4243 14.0601 14.0601 14.4243 14.0067 14.8834L14 15V21H3.99826C3.44694 21 3 20.5551 3 20.0066V3.9934C3 3.44476 3.44495 3 3.9934 3H20.0066C20.5552 3 21 3.44749 21 3.9985V14H15ZM21 16L16 20.997V16H21Z">
                            </path>
                        </svg>
                        <span>Notes</span>
                    </a>

                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-[#2563eb] hover:bg-[#f0f4f9] rounded-lg font-bold text-sm transition-colors group">
                        <svg class="w-5 h-5 text-[#2563eb]" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M4 11h5V5H4v6zm0 7h5v-5H4v5zm6 0h5v-5h-5v5zm6 0h5v-5h-5v5zm-6-7h5V5h-5v6zm6-6v6h5V5h-5z" />
                        </svg>
                        <span>Activities</span>
                    </a>

                </nav>
            </div>

            <div class="bg-[#1d63ed] p-4 text-white rounded-t-none">

                <div class="flex items-center gap-3 mb-4 px-1.5 py-1">
                    <div
                        class="w-9 h-9 rounded-full bg-white/80 flex items-center justify-center text-blue-600 font-semibold text-xl">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="truncate">
                        <h3 class="text-lg font-['Plus_Jakarta_Sans'] font-semibold tracking-wide">
                            {{ ucfirst(strtolower(auth()->user()->name)) }}</h3>

                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="w-full bg-[#eb4343] hover:bg-red-600 active:scale-98 text-white font-semibold text-sm py-3 px-4 rounded-xl flex items-center justify-start gap-2.5 shadow-sm transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>

        </aside>

    </div>
</body>

</html>
