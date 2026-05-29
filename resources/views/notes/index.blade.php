@extends('layouts.app')

@section('content')
    <div class="py-4 px-6 font-['Plus_Jakarta_Sans']">
        
        {{-- 1. BANNER HEADER --}}
        <div class="max-w-8xl mx-auto mb-6">
            <img src="{{ asset('assets/note-header.svg') }}" alt="Note Header" class="w-full object-cover rounded-3xl">
        </div>
        
        {{-- 2. CONTROL ROW (Search & Buttons) --}}
        <div class="flex items-center justify-between gap-5 max-w-8xl mx-auto mb-6">
            {{-- Search Input --}}
            <div class="flex-1 max-w-xl relative">
                <i class="ri-search-2-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-700"></i>
                <input type="text" placeholder="Search" 
                    class="w-full bg-white text-gray-700 font-medium px-10 py-3.5 rounded-xl border border-gray-200 shadow-sm  focus:outline-none focus:ring-2 focus:ring-brand-blue/50 transition-all text-lg">
            </div>

            {{-- Action Buttons --}}
            <div class="flex items-center gap-4 shrink-0">
                <a href="{{ route('notes.create') }}">
                <button class="bg-brand-blue hover:opacity-90 active:scale-98 text-white font-semibold px-6 py-3.5 rounded-xl shadow-md transition-all text-base flex items-center gap-2 cursor-pointer">
                    <i class="ri-add-line text-lg"></i> Add Note
                </button>
                </a>
                <button class="bg-brand-purple hover:opacity-90 active:scale-98 text-white font-semibold px-6 py-3.5 rounded-xl shadow-md transition-all text-base flex items-center gap-2 cursor-pointer">
                    <i class="ri-add-line text-lg"></i> Add Category
                </button>
            </div>
        </div>

        {{-- 3. MAIN DASHBOARD CONTENT GRID --}}
        <div class="grid grid-cols-3 gap-6 max-w-7xl mx-auto items-start">
            
            {{-- COL 1 & 2: NOTES SECTION (Left) --}}
            <div class="grid col-span-2 grid-cols-2 gap-5">
                
                <div class="bg-brand-purple text-white p-6 rounded-2xl shadow-sm flex flex-col justify-between min-h-65">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="text-xl font-bold tracking-wide">Glimpse Screens</h2>
                            <span class="text-sm opacity-80 font-medium">Date</span>
                        </div>
                        <hr class="opacity-20 mb-4">
                        <div class="text-sm opacity-90 space-y-1 font-medium">
                            <p>Lorem ipsum</p>
                           
                        </div>
                    </div>
                    <div class="flex justify-between items-end mt-6">
                        <p class="text-sm opacity-70 italic font-normal">Lorem ipsum mantap</p>
                        <button class="bg-white text-brand-purple font-bold text-xs px-5 py-2 rounded-lg shadow hover:bg-gray-50 transition-colors">Detail</button>
                    </div>
                </div>

                <div class="bg-brand-blue text-white p-6 rounded-2xl shadow-sm flex flex-col justify-between min-h-65">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="text-xl font-bold tracking-wide">Glimpse Screens</h2>
                            <span class="text-sm opacity-80 font-medium">Date</span>
                        </div>
                        <hr class="opacity-20 mb-4">
                        <div class="text-sm opacity-90 space-y-1 font-medium">
                            <p>Lorem ipsum</p>
                           
                        </div>
                    </div>
                    <div class="flex justify-between items-end mt-6">
                        <p class="text-sm opacity-70 italic font-normal">Lorem ipsum mantap</p>
                        <button class="bg-white text-brand-blue font-bold text-xs px-5 py-2 rounded-lg shadow hover:bg-gray-50 transition-colors">Detail</button>
                    </div>
                </div>

                <div class="bg-brand-blue text-white p-6 rounded-2xl shadow-sm flex flex-col justify-between min-h-65">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="text-xl font-bold tracking-wide">Glimpse Screens</h2>
                            <span class="text-sm opacity-80 font-medium">Date</span>
                        </div>
                        <hr class="opacity-20 mb-4">
                        <div class="text-sm opacity-90 space-y-1 font-medium">
                            <p>Lorem ipsuam</p>
                           
                        </div>
                    </div>
                    <div class="flex justify-between items-end mt-6">
                        <p class="text-sm opacity-70 italic font-normal">Lorem ipsum mantap</p>
                        <button class="bg-white text-brand-blue font-bold text-xs px-5 py-2 rounded-lg shadow hover:bg-gray-50 hover:scale-105 transition-colors">Detail</button>
                    </div>
                </div>

                <div class="bg-brand-green text-white p-6 rounded-2xl shadow-sm flex flex-col justify-between min-h-65">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <h2 class="text-xl font-bold tracking-wide">Glimpse Screens</h2>
                            <span class="text-sm opacity-80 font-medium">Date</span>
                        </div>
                        <hr class="opacity-20 mb-4">
                        <div class="text-sm opacity-90 space-y-1 font-medium">
                            <p>Lorem ipsum</p>
                           
                        </div>
                    </div>
                    <div class="flex justify-between items-end mt-6">
                        <p class="text-sm opacity-70 italic font-normal">Lorem ipsum mantap</p>
                        <button class="bg-white text-brand-green font-bold text-xs px-5 py-2 rounded-lg shadow hover:bg-gray-50 transition-colors">Detail</button>
                    </div>
                </div>

            </div>

            {{-- COL 3: CATEGORY SIDEBAR SECTION (Right) --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 min-h-135">
                <h2 class="text-xl font-bold text-brand-blue mb-5 tracking-wide">Category List</h2>
                
                <div class="space-y-3">
                    {{-- Item Kategori --}}
                    <div class="flex items-center justify-between border-2 border-gray-900 rounded-xl px-4 py-3 bg-white select-none">
                        <span class="font-bold text-gray-900 text-sm">Category Item 1</span>
                        <button class="text-gray-600 hover:text-gray-900 transition-colors">
                            <i class="ri-more-2-fill text-lg"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection