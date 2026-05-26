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