@extends('layouts.app')

@section('content')
    <section class="px-10 py-10 overflow-hidden">
        {{-- Back --}}
        <a href="{{ route('notes.index') }}" class="bg-brand-purple pl-6 pr-8 py-2 text-white rounded-md inline-block mb-5">
            <i class="ri-arrow-left-line"></i>
            Back
        </a>

        {{-- Form --}}
        <form id="noteForm" action="{{ route('notes.store') }}" method="POST"
            class="w-full h-150 bg-brand-purple px-10 py-8 my-5 rounded-2xl flex flex-col overflow-hidden transition-colors duration-200">
            @csrf

            <input type="hidden" name="bg_color" id="selectedBgColor" value="bg-brand-purple">

            <div class="flex items-center justify-between shrink-0">
                <input value="{{ old('title') }}" name="title"
                    class="w-165 border-none bg-brand-purple text-white text-5xl font-bold placeholder:text-white/50 focus:outline-none transition-colors duration-200"
                    type="text" placeholder="Notes Title">

                <select
                    class="border-none px-3 pl-4 py-1 bg-white/50 text-white rounded-full focus:outline-none cursor-pointer"
                    name="category_id" id="category">
                    <option value="" selected disabled>Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="text-gray-900">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('title')
                <p class="px-2 py-1 bg-brand-red text-white text-xs mt-1 rounded-md">{{ $message }}</p>
            @enderror
            @error('category_id')
                <p class="px-2 py-1 bg-brand-red text-white text-xs mt-1 rounded-md">{{ $message }}</p>
            @enderror

            <div class="flex items-center text-white/70 mt-1 ml-4 gap-2 shrink-0 border-b border-white/30 pb-2">
                <i class="ri-calendar-event-fill text-xl"></i>
                <span class="ml-2">Created at: {{ now()->format('F j, Y') }}</span>
            </div>

            <div class="flex-1 overflow-y-auto my-4">
                <textarea id="contentEditor" name="content" rows="12"
                    class="w-full h-full min-h-20 border-none bg-brand-purple text-white focus:outline-none resize-none overflow-y-auto outline-none transition-colors duration-200 placeholder:text-white/60"
                    placeholder="Write your notes here...">{{ old('content') }}</textarea>
            </div>
            @error('content')
                <p class="mb-2 px-2 py-1 bg-brand-red text-white text-xs mt-1 rounded-md">{{ $message }}</p>
            @enderror

            <div class="flex items-center justify-between shrink-0">
                <div class="flex gap-3">

                    <input type="hidden" name="bg_color" id="selectedBgColor" value="bg-brand-purple">
                    <div class="relative">
                        <select id="colorPicker"
                            class="h-12 border-none bg-white text-gray-800 font-semibold rounded-xl px-4 pr-10 appearance-none focus:outline-none cursor-pointer shadow-sm">
                            <option value="bg-brand-purple" selected> Purple</option>
                            <option value="bg-brand-blue"> Blue</option>
                            <option value="bg-brand-green"> Green</option>
                        </select>

                    </div>

                </div>

                <div class="flex items-center gap-4 shrink-0">
                    <button type="submit"
                        class="bg-brand-yellow text-black px-8 py-3 font-semibold rounded-xl hover:bg-brand-orange active:scale-98 transition shadow-sm">
                        Save Note
                    </button>
                </div>
            </div>
        </form>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colorPicker = document.getElementById('colorPicker');
            const noteForm = document.getElementById('noteForm');
            const noteTitle = noteForm.querySelector('input[name="title"]');
            const contentEditor = document.getElementById('contentEditor');
            const selectedBgColor = document.getElementById('selectedBgColor');

            const colorClasses = ['bg-brand-purple', 'bg-brand-blue', 'bg-brand-green'];

            colorPicker.addEventListener('change', function() {
                const selectedColor = this.value;

                colorClasses.forEach(cls => {
                    noteForm.classList.remove(cls);
                    noteTitle.classList.remove(cls);
                    contentEditor.classList.remove(cls);
                });

                noteForm.classList.add(selectedColor);
                noteTitle.classList.add(selectedColor);
                contentEditor.classList.add(selectedColor);

                // Simpan warna yang dipilih ke hidden input
                selectedBgColor.value = selectedColor;
            });
        });
    </script>
@endsection
