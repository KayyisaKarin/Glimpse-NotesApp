@extends('layouts.app')

@section('content')
    <style>
        #richTextEditor:empty:before {
            content: attr(placeholder);
            display: block;
            color: rgba(255, 255, 255, 0.5);
        }
    </style>

    <section class="px-10 py-10 overflow-hidden">
        {{-- Back Button --}}
        <a href="{{ route('notes.index') }}" class="bg-brand-purple pl-6 pr-8 py-2 text-white rounded-md inline-block mb-5">
            <i class="ri-arrow-left-line"></i>
            Back
        </a>

        {{-- Main Note Form --}}
        <form id="noteForm" action="{{ route('notes.store') }}" method="POST" class="w-full h-150 bg-brand-purple px-10 py-8 my-5 rounded-2xl flex flex-col overflow-hidden transition-colors duration-200">
            @csrf

            <input type="hidden" name="content" id="hiddenNoteContent">

            <div class="flex items-center justify-between shrink-0">
                <input
                    name="title"
                    class="w-165 border-none bg-brand-purple text-white text-5xl font-bold placeholder:text-white/50 focus:outline-none transition-colors duration-200"
                    type="text" placeholder="Notes Title" required>
                
                <select class="border-none px-5 pr-9 py-1 bg-white/50 text-white rounded-full focus:outline-none cursor-pointer" name="category_id" id="category">
                    <option value="" selected disabled>Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="text-gray-900">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Timestamp--}}
            <div class="flex items-center text-white/70 mt-1 ml-4 gap-2 shrink-0 border-b border-white/30 pb-2">
                <i class="ri-calendar-event-fill text-xl"></i>
                <span class="ml-2">Created at: {{ now()->format('F j, Y') }}</span>
            </div>

            <div class="flex-1 overflow-y-auto my-4">
                <div id="richTextEditor" contenteditable="true" role="textbox" aria-multiline="true"
                    class="w-full h-full min-h-37.5 border-none bg-brand-purple text-white focus:outline-none resize-none overflow-y-auto outline-none transition-colors duration-200"
                    placeholder="Write your notes here..."></div>
            </div>

            <div class="flex items-center justify-between shrink-0">
                <div class="flex gap-3">
                    
                    <div class="relative">
                        <select name="bg_color" id="colorPicker" 
                            class="h-12 border-none bg-white text-gray-800 font-semibold rounded-xl px-4 pr-10 appearance-none focus:outline-none cursor-pointer shadow-sm">
                            <option value="bg-brand-purple" selected> Purple</option>
                            <option value="bg-brand-blue"> Blue</option>
                            <option value="bg-brand-green"> Green</option>
                        </select>
                        <i class="ri-arrow-down-s-line absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500 text-lg"></i>
                    </div>

                    <div class="flex bg-white rounded-xl p-1 shadow-sm h-12 items-center border border-gray-100">
                        <button type="button" onclick="formatText('bold')" class="w-10 h-10 flex items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 transition font-bold text-lg" title="Bold">B</button>
                        <button type="button" onclick="formatText('italic')" class="w-10 h-10 flex items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 transition italic font-serif text-lg" title="Italic">I</button>
                        <button type="button" onclick="formatText('underline')" class="w-10 h-10 flex items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 transition underline text-lg" title="Underline">U</button>
                    </div>
                </div>

                <a href="{{ route('notes.index') }}" class="bg-brand-red text-white px-8 py-3 font-semibold rounded-xl hover:bg-red-700 active:scale-98 transition shadow-sm">
                    Delete Note
                </a>
            </div>
        </form>
    </section>

    <script>
        function formatText(style) {
            document.execCommand(style, false, null);
            document.getElementById('richTextEditor').focus();
        }

        document.addEventListener('DOMContentLoaded', function () {
            const colorPicker = document.getElementById('colorPicker');
            const noteForm = document.getElementById('noteForm');
            const noteTitle = noteForm.querySelector('input[name="title"]');
            const richTextEditor = document.getElementById('richTextEditor');
            const hiddenContentInput = document.getElementById('hiddenNoteContent');

            const colorClasses = ['bg-brand-purple', 'bg-brand-blue', 'bg-brand-green'];

            colorPicker.addEventListener('change', function () {
                const selectedColor = this.value;

                colorClasses.forEach(cls => {
                    noteForm.classList.remove(cls);
                    noteTitle.classList.remove(cls);
                    richTextEditor.classList.remove(cls);
                });

                noteForm.classList.add(selectedColor);
                noteTitle.classList.add(selectedColor);
                richTextEditor.classList.add(selectedColor);
            });

            noteForm.addEventListener('submit', function() {
                hiddenContentInput.value = richTextEditor.innerHTML;
            });
        });
    </script>
@endsection