@extends('layouts.app')

@section('content')
    <section class="px-10 py-10 overflow-hidden">
        <a href="{{ route('notes.index') }}" class="bg-brand-purple pl-6 pr-8 py-2 text-white rounded-md inline-block mb-5">
            <i class="ri-arrow-left-line"></i>
            Back
        </a>

        <form id="noteForm" action="{{ route('notes.update', $note->id) }}" method="POST"
            class="w-full h-150 px-10 py-8 my-5 rounded-2xl flex flex-col overflow-hidden transition-colors duration-200 {{ $note->bg_color ?? 'bg-brand-purple' }}">
            @method('PUT')
            @csrf

            <input type="hidden" name="bg_color" id="selectedBgColor" value="{{ $note->bg_color ?? 'bg-brand-purple' }}">

            <div class="flex items-center justify-between shrink-0">
                <input value="{{ old('title', $note->title) }}" name="title"
                    class="w-165 border-none text-white text-5xl font-bold placeholder:text-white/50 focus:outline-none transition-colors duration-200 {{ $note->bg_color ?? 'bg-brand-purple' }}"
                    type="text" placeholder="Notes Title">

                <select
                    class="border-none px-3 pl-4 py-1 bg-white/50 text-white rounded-full focus:outline-none cursor-pointer"
                    name="category_id" id="category">
                    <option value="" disabled>Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="text-gray-900" {{ (old('category_id', $note->category_id) == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center text-white/70 mt-1 ml-4 gap-2 shrink-0 border-b border-white/30 pb-2">
                <i class="ri-calendar-event-fill text-xl"></i>
                <span class="ml-2">Last updated: {{ $note->updated_at->format('F j, Y') }}</span>
            </div>

            <div class="flex-1 overflow-y-auto my-4">
                <textarea id="contentEditor" name="content" rows="12"
                    class="w-full h-full min-h-20 border-none text-white focus:outline-none resize-none overflow-y-auto outline-none transition-colors duration-200 {{ $note->bg_color ?? 'bg-brand-purple' }} placeholder:text-white/60"
                    placeholder="Write your notes here...">{{ old('content', $note->content) }}</textarea>
            </div>

            <div class="flex items-center justify-between shrink-0">
                <div class="flex gap-3">

                    <div class="relative">
                        <select id="colorPicker"
                            class="h-12 border-none bg-white text-gray-800 font-semibold rounded-xl px-4 pr-10 appearance-none focus:outline-none cursor-pointer shadow-sm">
                            <option value="bg-brand-purple"
                                {{ ($note->bg_color ?? 'bg-brand-purple') == 'bg-brand-purple' ? 'selected' : '' }}> Purple
                            </option>
                            <option value="bg-brand-blue"
                                {{ ($note->bg_color ?? '') == 'bg-brand-blue' ? 'selected' : '' }}> Blue</option>
                            <option value="bg-brand-green"
                                {{ ($note->bg_color ?? '') == 'bg-brand-green' ? 'selected' : '' }}> Green</option>
                        </select>
                    </div>

                </div>

                <div class="flex items-center gap-4 shrink-0">
                    <button type="submit" id="saveNoteBtn"
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
            const categorySelect = document.getElementById('category');
            const selectedBgColor = document.getElementById('selectedBgColor');
            const saveNoteBtn = document.getElementById('saveNoteBtn');

            const colorClasses = ['bg-brand-purple', 'bg-brand-blue', 'bg-brand-green'];

            // Function to validate and update button state
            function validateForm() {
                const titleValue = noteTitle.value.trim();
                const contentValue = contentEditor.value.trim();
                const categoryValue = categorySelect.value;

                if (titleValue.length > 0 && contentValue.length > 0 && categoryValue) {
                    saveNoteBtn.disabled = false;
                    saveNoteBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    saveNoteBtn.disabled = true;
                    saveNoteBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }

            // Validate on input change
            noteTitle.addEventListener('input', validateForm);
            contentEditor.addEventListener('input', validateForm);
            categorySelect.addEventListener('change', validateForm);

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
                selectedBgColor.value = selectedColor;
            });

            // Initial validation
            validateForm();
        });
    </script>
@endsection
