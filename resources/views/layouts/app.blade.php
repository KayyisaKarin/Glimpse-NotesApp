<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Glimpse Notes' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Rethink+Sans:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="shortcut icon" href="{{ asset('assets/Logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" integrity="sha512-XcIsjKMcuVe0Ucj/xgIXQnytNwBttJbNjltBV18IOnru2lDPe9KRRyvCXw6Y5H415vbBLRm8+q6fmLUU7DfO6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/csp@3.x.x/dist/cdn.min.js"></script>

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

<body class="font-['Rethink_Sans'] overflow-hidden h-screen">
    <div class="flex h-full w-full overflow-hidden">

        {{-- MAIN CONTENT --}}
        <main class="flex-1 bg-gray-100 overflow-y-auto">
            @yield('content')
        </main>

        {{-- SIDEBAR --}}
        <aside class="w-72 bg-white border-l shrink-0 font-['Plus_Jakarta_Sans'] flex flex-col justify-between overflow-y-auto">
            <div class="p-6">
                <div class="flex items-center justify-center gap-3 mt-6 mb-12 select-none">
                    <img src="{{ asset('assets/logo.svg') }}" alt="Glimpse Logo" class="w-10 h-10">
                    <h1 class="text-2xl font-bold text-brand-blue">Glimpse</h1>
                </div>

                <nav class="py-8 flex flex-col gap-2">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 bg-[#f0f4f9] text-[#2563eb] rounded-lg font-bold text-sm transition-colors group">
                        <i class="ri-dashboard-fill text-xl leading-none"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('notes.index') }}" class="flex items-center gap-3 px-4 py-3 text-[#2563eb] hover:bg-[#f0f4f9] rounded-lg font-bold text-sm transition-colors group">
                        <i class="ri-sticky-note-2-fill text-xl leading-none"></i>
                        <span>Notes</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-[#2563eb] hover:bg-[#f0f4f9] rounded-lg font-bold text-sm transition-colors group">
                        <i class="ri-grid-fill text-xl leading-none"></i>
                        <span>Activities</span>
                    </a>
                </nav>
            </div>

            <div class="bg-[#1d63ed] p-4 text-white rounded-t-none">
                <div class="flex items-center gap-3 mb-4 px-1.5 py-1">
                    <div class="w-11 h-11 rounded-full overflow-hidden shadow-inner shrink-0">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Han Taesan" class="w-full h-full object-cover" />
                    </div>
                    <div class="truncate">
                        <h3 class="text-lg font-['Plus_Jakarta_Sans'] font-semibold tracking-wide">Han Taesan</h3>
                    </div>
                </div>

                <button class="w-full bg-[#eb4343] hover:bg-red-600 active:scale-98 text-white font-semibold text-sm py-3 px-4 rounded-xl flex items-center justify-start gap-2.5 shadow-sm transition-all cursor-pointer">
                    <i class="ri-logout-box-r-line text-base leading-none"></i>
                    <span>Logout</span>
                </button>
            </div>
        </aside>

    </div>
</body>

</html>