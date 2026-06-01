@extends('layouts.app')

@section('content')
    <section class="px-10 py-10 overflow-hidden">
        <a href="{{ route('notes.index') }}" class="bg-brand-purple pl-6 pr-8 py-2 text-white rounded-md inline-block mb-5">
            <i class="ri-arrow-left-line"></i>
            Back
        </a>

        <form class="w-full h-150 bg-brand-purple px-10 py-8 my-5 rounded-2xl flex flex-col overflow-hidden">
            <div class="flex items-center justify-between shrink-0">
                <input
                    class="w-165 border-none bg-brand-purple text-white text-5xl font-bold placeholder:text-white focus:outline-none"
                    type="text" placeholder="Notes Title">
                <select class="border-none px-5 pr-9 py-1 bg-white/50 text-white rounded-full" name="category"
                    id="category">
                    <option value="0" selected>Category</option>
                </select>
            </div>

            <div class="px-3 py-2 bg-white/50 text-white rounded-lg mt-4 w-max">
                <i class="ri-calendar-event-fill text-xl"></i>
                <span class="ml-2">Created at: {{ now()->format('F j, Y') }}</span>
                {{-- <p class="text-white/50 text-xl pb-4 border-b-2 border-white mt-4 shrink-0">Made in...</p> --}}

                <div class="flex-1 overflow-y-auto my-4">
                    <textarea name="" id=""
                        class="w-full h-150 border-none bg-brand-purple text-white placeholder:text-white focus:outline-none resize-none"
                        placeholder="Write your notes here..."></textarea>
                </div>
            </div>
        
            <div class="flex items-center justify-end shrink-0">
                <a href="#" class="bg-brand-red px-8 py-2 font-medium rounded-lg hover:bg-red-700 transition">Delete Note</a>
            </div>
        </form>
    </section>
@endsection
