@extends('layouts.app')

@section('content')
    <div class="flex-1 p-8 bg-[#f1f3f4] font-['Rethink_Sans'] h-screen overflow-hidden">
        <div class="h-full overflow-y-auto no-scrollbar">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                {{-- Card Name --}}
                <div
                    class="md:col-span-2 bg-[#2563eb] rounded-2xl p-8 text-white relative overflow-hidden flex flex-col justify-center min-h-[180px]">
                    <h1 class="text-5xl font-bold mb-2">Hi, {{ ucfirst(strtolower(auth()->user()->name)) }}!</h1>
                    <p class="text-blue-100 font-medium text-lg">Ready to sync your thoughts?</p>

                    <div class="absolute right-4 bottom-0 opacity-20 pointer-events-none">
                        <img src="{{ asset('assets/path-white.png') }}" alt="Notes Illustration"
                            class="w-64 h-60 object-cover">
                    </div>
                </div>

                {{-- Card kalender --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex">
                    <div
                        class="bg-[#2563eb] w-1/3 p-4 flex flex-col justify-between items-center text-white select-none text-center">
                        <div>
                            <span class="text-4xl font-bold block">{{ now()->format('d') }}</span>
                            <span class="text-lg opacity-80">{{ now()->format('l') }}</span>
                        </div>
                        <button id="add-event-btn"
                            class="bg-[#ff9f1c] hover:bg-[#f19719] text-white text-xs font-semibold px-3 py-1.5 rounded-lg transition-colors cursor-pointer z-10">
                            + Add Event
                        </button>
                    </div>
                    <div class="w-fit p-4 flex flex-col justify-between items-start relative">
                        <div class="w-fit">
                            <div class="flex justify-between items-center">
                                <h3 class="font-bold">{{ now()->translatedFormat('F Y') }}</h3>
                            </div>
                            <div class="grid grid-cols-7 gap-2 mt-2 text-center text-xs">
                                @foreach (['S', 'S', 'R', 'K', 'J', 'S', 'M'] as $day)
                                    <span class="text-black/30">{{ $day }}</span>
                                @endforeach
                            </div>
                            <div class="grid grid-cols-7 gap-2 mt-2">
                                @foreach (range(1, 31) as $date)
                                    <div
                                        class="aspect-square rounded-xl flex items-center justify-center text-sm transition {{ $date == now()->day ? 'bg-purple-500 text-white' : 'hover:bg-black/5' }}">
                                        {{ $date }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- bawah header --}}
            <div class="flex flex-row gap-4 h-full">
                {{-- col kiri --}}
                <div class="flex flex-col gap-4 flex-1 w-2/4">
                    {{-- card latets notes --}}
                    <div class="border-[#1761EC] w-full border rounded-2xl p-6 bg-white">
                        <div class="flex flex-row justify-between items-center mt-4 mb-8">
                            <h2 class="text-3xl font-bold">Your Latest Notes</h2>
                            <span class="text-white bg-[#1761EC] px-3 py-2 rounded-lg">
                                <i class="ri-add-large-line"></i>
                            </span>
                        </div>

                        <div class="grid grid-cols-3 gap-2 font-['Plus_Jakarta_Sans']">
                            {{-- Notes div --}}
                            <div class="bg-[#1761EC] p-4 rounded-xl text-white">
                                <div class=" flex flex-row justify-between items-center border-b-2 border-white/40 pb-2">
                                    <h4 class="text-lg font-semibold">Glimpse Screens</h4>
                                    <span class="opacity-90 text-xs">April 21</span>
                                </div>
                                <div class="py-4 text-xs opacity-85">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi eius delectus quidem
                                    iste eaque esse ullam incidunt iure corporis veritatis.
                                </div>
                                <a href="#">
                                    <button
                                        class="bg-white py-2 px-4 text-[#1761EC] font-semibold flex justify-end text-sm rounded-lg">Detail</button>
                                </a>
                            </div>
                            {{-- Notes div --}}
                            <div class="bg-[#1761EC] p-4 rounded-xl text-white">
                                <div class=" flex flex-row justify-between items-center border-b-2 border-white/40 pb-2">
                                    <h4 class="text-lg font-semibold">Glimpse Screens</h4>
                                    <span class="opacity-90 text-xs">April 21</span>
                                </div>
                                <div class="py-4 text-xs opacity-85">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi eius delectus quidem
                                    iste eaque esse ullam incidunt iure corporis veritatis.
                                </div>
                                <a href="#">
                                    <button
                                        class="bg-white py-2 px-4 text-[#1761EC] font-semibold flex justify-end text-sm rounded-lg">Detail</button>
                                </a>
                            </div>
                            {{-- Notes div --}}
                            <div class="bg-[#1761EC] p-4 rounded-xl text-white">
                                <div class=" flex flex-row justify-between items-center border-b-2 border-white/40 pb-2">
                                    <h4 class="text-lg font-semibold">Glimpse Screens</h4>
                                    <span class="opacity-90 text-xs">April 21</span>
                                </div>
                                <div class="py-4 text-xs opacity-85">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi eius delectus quidem
                                    iste eaque esse ullam incidunt iure corporis veritatis.
                                </div>
                                <a href="#">
                                    <button
                                        class="bg-white py-2 px-4 text-[#1761EC] font-semibold flex justify-end text-sm rounded-lg">Detail</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- col kanan --}}
                <div class="w-1/4 max-w-sm flex flex-col gap-4">
                    {{-- Activity This Week --}}
                    <div class="rounded-xl overflow-hidden bg-white flex flex-col border-2 border-gray-200">
                        <h3 class="bg-[#1761EC] overflow-hidden text-white font-['Rethink_Sans'] font-semibold p-4 text-xl">
                            Upcoming Events</h3>
                        <div id="event-list-wrapper" class="p-2 flex flex-col gap-2">
                            <div
                                class="flex gap-2 p-2 relative items-center rounded-lg bg-gray-100 hover:bg-gray-200 transition-all duration-300">
                                <div class="flex flex-col">
                                    <p class="font-semibold">Ied Al-Adha</p>
                                    <span class="text-xs">Wednesday, May 27</span>
                                </div>
                                <i class="ri-more-2-fill text-lg right-4 absolute"></i>
                            </div>
                        </div>
                    </div>

                    {{-- To-Do List --}}
                    <div id="todo-container"
                        class="rounded-xl overflow-hidden bg-white flex flex-col border-2 border-gray-200">
                        <div class="bg-[#1761EC] text-white flex flex-row p-4 justify-between items-center">
                            <h3 class="font-semibold text-xl">To-Do List</h3>
                            <button id="add-task-btn"
                                class="text-white font-bold text-sm hover:rotate-45 transition-all duration-300 cursor-pointer">
                                <i class="ri-add-large-line"></i>
                            </button>
                        </div>

                        <div id="todo-list-wrapper" class="p-4 flex flex-col gap-2">
                            @forelse ($todos as $todo)
                                {{-- Setiap item to-do dibungkus form DELETE kustom --}}
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <label class="todo-item flex items-center gap-4 cursor-pointer group select-none">
                                        <input type="checkbox" onchange="this.form.submit()"
                                            class="todo-checkbox border-2 border-gray-300 rounded-md w-5 h-5 checked:bg-[#1761EC] checked:border-[#1761EC] focus:ring-0 focus:ring-offset-0 transition-all cursor-pointer appearance-none flex items-center justify-center after:text-white after:text-xs after:font-bold after:hidden checked:after:block">
                                        <span
                                            class="todo-text text-gray-800 font-medium text-base transition-all group-hover:text-gray-600">
                                            {{ $todo->title }}
                                        </span>
                                    </label>
                                </form>
                            @empty
                                <span class="text-gray-400 text-sm text-center py-2">You Don't Have any To-do List
                                    Yet</span>
                            @endforelse
                        </div>
                    </div>

                    {{-- MODAL ADD TASK --}}
                    <div id="todo-modal"
                        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 invisible opacity-0 transition-all duration-300">
                        {{-- Overlay Clickable untuk menutup modal saat klik luar --}}
                        <div id="modal-overlay" class="absolute inset-0"></div>

                        <div class="bg-white rounded-xl p-6 w-full max-w-md mx-4 shadow-xl border border-gray-100 transition-all scale-95 duration-300 relative z-10"
                            id="modal-content">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-[#1761EC] font-bold text-2xl tracking-tight">Add New To-do List</h3>
                                <button id="close-modal-btn"
                                    class="text-gray-400 hover:text-gray-600 font-bold text-sm cursor-pointer">✕</button>
                            </div>

                            {{-- Menghubungkan Form ke Laravel Backend --}}
                            <form action="{{ route('todo.store') }}" method="POST">
                                @csrf
                                <input type="text" id="new-task-input" name="title"
                                    placeholder="Enter your task here..." required autocomplete="off"
                                    class="w-full bg-[#f1f3f4] border border-gray-200 rounded-lg py-3 px-4 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-gray-300 mb-5 text-base">
                                <div class="flex justify-center">
                                    <button type="submit" id="submit-task-btn"
                                        class="bg-[#1761EC] hover:bg-blue-700 text-white font-bold px-6 py-2 rounded-lg shadow-md transition-colors cursor-pointer text-sm">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- MODAL ADD EVENT --}}
                    <div id="event-modal"
                        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 invisible opacity-0 transition-all duration-300">
                        <div id="event-modal-overlay" class="absolute inset-0"></div>

                        <div class="bg-white rounded-xl p-6 w-full max-w-md mx-4 shadow-xl border border-gray-100 transition-all scale-95 duration-300 z-10"
                            id="event-modal-content">

                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-black font-bold text-2xl tracking-tight">Add New Event</h3>
                                <button id="close-event-modal-btn" type="button"
                                    class="text-gray-400 hover:text-gray-600 font-bold text-sm cursor-pointer">✕</button>
                            </div>

                            <form action="{{ route('events.store') }}" method="POST">
                                @csrf

                                <input type="text" name="title" id="new-event-input" required
                                    placeholder="Event name (e.g. Study Session)..."
                                    class="w-full bg-[#f1f3f4] border border-gray-200 rounded-lg py-3 px-4 text-gray-800 placeholder-gray-400 focus:outline-none focus:border-gray-300 mb-3 text-base">

                                <input type="date" name="event_date" id="event-date-input" required
                                    class="w-full bg-[#f1f3f4] border border-gray-200 rounded-lg py-2 px-4 text-gray-600 mb-5 text-sm focus:outline-none focus:border-gray-300">

                                <div class="flex justify-center">
                                    <button type="submit" id="submit-event-btn"
                                        class="bg-[#ff9f1c] hover:bg-amber-600 text-white font-bold px-8 py-2.5 rounded-lg shadow-md transition-colors cursor-pointer text-sm">
                                        Add Event
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            const todoModal = document.getElementById('todo-modal');
            const todoContent = document.getElementById('modal-content');
            const todoOpenBtn = document.getElementById('add-task-btn');
            const todoCloseBtn = document.getElementById('close-modal-btn');
            const todoOverlay = document.getElementById('modal-overlay');

            // === 2. ELEMEN MODAL EVENT ===
            const eventModal = document.getElementById('event-modal');
            const eventContent = document.getElementById('event-modal-content');
            const eventOpenBtn = document.getElementById('add-event-btn');
            const eventCloseBtn = document.getElementById('close-event-modal-btn');
            const eventOverlay = document.getElementById('event-modal-overlay');

            // === FUNGSI MODAL TODO (DIBEDAKAN NAMANYA) ===
            function openTodoModal() {
                todoModal.classList.remove('invisible', 'opacity-0');
                todoModal.classList.add('visible', 'opacity-100');
                todoContent.classList.remove('scale-95');
                todoContent.classList.add('scale-100');
            }

            function closeTodoModal() {
                todoModal.classList.remove('visible', 'opacity-100');
                todoModal.classList.add('invisible', 'opacity-0');
                todoContent.classList.remove('scale-100');
                todoContent.classList.add('scale-95');
            }

            // === FUNGSI MODAL EVENT (DIBEDAKAN NAMANYA) ===
            function openEventModal() {
                eventModal.classList.remove('invisible', 'opacity-0');
                eventModal.classList.add('visible', 'opacity-100');
                eventContent.classList.remove('scale-95');
                eventContent.classList.add('scale-100');
            }

            function closeEventModal() {
                eventModal.classList.remove('visible', 'opacity-100');
                eventModal.classList.add('invisible', 'opacity-0');
                eventContent.classList.remove('scale-100');
                eventContent.classList.add('scale-95');
            }

            // modal todo
            if (todoOpenBtn) todoOpenBtn.addEventListener('click', openTodoModal);
            if (todoCloseBtn) todoCloseBtn.addEventListener('click', closeTodoModal);
            if (todoOverlay) todoOverlay.addEventListener('click', closeTodoModal);

            // modal event
            if (eventOpenBtn) eventOpenBtn.addEventListener('click', openEventModal);
            if (eventCloseBtn) eventCloseBtn.addEventListener('click', closeEventModal);
            if (eventOverlay) eventOverlay.addEventListener('click', closeEventModal);
        });
    </script>
@endsection
