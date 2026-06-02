@extends('layouts.app')

@section('content')
    <div class="py-4 px-6 font-['Plus_Jakarta_Sans']">



        {{-- 1. BANNER HEADER --}}
        <div class="max-w-8xl mx-auto mb-6">
            <img src="{{ asset('assets/note-header.svg') }}" alt="Note Header" class="w-full object-cover rounded-3xl">
        </div>

        {{-- 2. CONTROL ROW --}}
        <div class="flex items-center justify-between gap-5 max-w-8xl mx-auto mb-6">
            <div class="flex-1 max-w-xl relative">
                <i class="ri-search-2-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-700"></i>
                <input type="text" placeholder="Search"
                    class="w-full bg-white text-gray-700 font-medium px-10 py-3.5 rounded-xl border border-gray-200 shadow-sm focus:outline-none focus:ring-2 focus:ring-brand-blue/50 transition-all text-lg">
            </div>

            <div class="flex items-center gap-4 shrink-0">
                <a href="{{ route('notes.create') }}">
                    <button
                        class="bg-brand-blue hover:opacity-90 active:scale-98 text-white font-semibold px-6 py-3.5 rounded-xl shadow-md transition-all text-base flex items-center gap-2 cursor-pointer">
                        <i class="ri-add-line text-lg"></i> Add Note
                    </button>
                </a>
                {{-- Add Button --}}
                <button onclick="openAddModal()"
                    class="bg-brand-purple hover:opacity-90 active:scale-98 text-white font-semibold px-6 py-3.5 rounded-xl shadow-md transition-all text-base flex items-center gap-2 cursor-pointer">
                    <i class="ri-add-line text-lg"></i>Add Category
                </button>
            </div>
        </div>

        {{-- Success Alert --}}
        @if (session('success'))
            <div class="max-w-8xl mx-auto mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        {{-- 3. MAIN DASHBOARD CONTENT GRID --}}
        <div class="grid grid-cols-3 gap-6 max-w-7xl mx-auto items-start">

            {{-- NOTES SECTION (Left) --}}
            <div class="grid col-span-2 grid-cols-2 gap-5 overflow-y-auto scrollbar-none max-h-135">
                @forelse ($notes as $note)
                    <div class="w-75 h-58 rounded-xl px-4 py-4 flex flex-col {{ $note->bg_color ?? 'bg-brand-purple' }}">
                        <!-- Header -->
                        <div class="flex items-center justify-between pb-2 border-b border-white shrink-0">
                            <h1 class="text-white text-lg font-bold truncate">{{ $note->title }}</h1>
                            <p class="text-sm text-white/50">{{ $note->created_at->format('d/m/Y') }}</p>
                        </div>

                        <!-- Content -->
                        <div class="flex-1 overflow-y-auto my-2 px-1 scrollbar-none">
                            <div class="text-white text-sm prose prose-invert max-w-none">
                                @php
                                    $limitedContent = Str::limit($note->content, 150);
                                @endphp
                                {!! $limitedContent !!}
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="flex items-center justify-between shrink-0">
                            <div>
                                <p class="px-4 py-1.5 bg-white/30 text-white text-xs rounded-full">
                                    {{ $note->category->name ?? 'Uncategorized' }}
                                </p>
                            </div>
                            <div class="flex items-center justify-between space-x-2">
                            <a href="{{ route('notes.edit', $note->id) }}">
                                <i class="ri-edit-line block bg-brand-orange text-white px-3 py-2 font-semibold rounded-lg shadow-sm transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-md"></i>
                            </a>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Delete this note?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="ri-delete-bin-7-line block bg-brand-red text-white px-3 py-2 font-semibold rounded-lg shadow-sm transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-md"></i>
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-10 bg-white/50 rounded-xl">
                        <p class="text-gray-500">No notes yet. Click "Add Note" to create one!</p>
                    </div>
                @endforelse
            </div>

            {{-- COL 3: CATEGORY SIDEBAR SECTION (Right) --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 min-h-135">
                <h2 class="text-2xl font-extrabold text-brand-blue mb-5 tracking-wide">Category List</h2>

                <div class="space-y-3">
                    @forelse ($categories as $cat)
                        <div
                            class="flex items-center justify-between border-2  rounded-xl px-4 py-3 bg-white group transition-all hover:bg-brand-yellow/70 hover:border-gray-400/80 select-none">
                            <span class="font-bold text-gray-900 text-sm">{{ $cat->name }}</span>
                            <div class="flex gap-2">
                                {{-- Edit Button --}}
                                <button onclick="openEditModal({{ $cat->id }}, '{{ $cat->name }}')"
                                    class="text-gray-400 group-hover:text-gray-600 hover:text-brand-purple transition-colors">
                                    <i class="ri-pencil-line text-lg hover:text-xl transition-all"></i>
                                </button>
                                {{-- Delete Button --}}
                                <button onclick="openDeleteModal({{ $cat->id }})"
                                    class="text-gray-400 group-hover:text-gray-600 hover:text-red-500 transition-colors">
                                    <i class="ri-delete-bin-line text-lg hover:text-xl transition-all"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-400 text-sm text-center py-4">No categories found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- ════ MODALS ════ --}}

    {{-- ADD MODAL --}}
    <div id="addModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-3xl shadow-xl w-full max-w-md overflow-hidden border-2 ">
            <div class="flex items-center justify-between px-6 py-4 bg-brand-purple/10 border-b-2 ">
                <h3 class="font-extrabold mt-1 text-gray-900">Add New Category</h3>
                <button onclick="closeModal('addModal')" class="text-gray-500 hover:text-gray-900"><i
                        class="ri-close-line text-xl"></i></button>
            </div>
            <form action="{{ route('categories.store') }}" method="POST" class="p-6">
                @csrf
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Category Name</label>
                    <input id="addName" name="name" type="text" placeholder="e.g. Work, Personal..."
                        class="w-full px-4 py-3 rounded-xl border-2  bg-gray-50 focus:outline-none focus:bg-white transition-all">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex gap-3">
                    <button type="button" onclick="closeModal('addModal')"
                        class="flex-1 px-4 py-3 rounded-xl border-2  font-bold text-gray-700 hover:bg-gray-50 transition-all">Cancel</button>
                    <button type="submit"
                        class="flex-1 px-4 py-3 rounded-xl bg-brand-purple text-white font-bold hover:bg-brand-purple/80 transition-all">Save</button>
                </div>
            </form>
        </div>
    </div>

    {{-- EDIT MODAL --}}
    <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-3xl shadow-xl w-full max-w-md overflow-hidden border-2 ">
            <div class="flex items-center justify-between px-6 py-4 bg-brand-blue/10 border-b-2 ">
                <h3 class="font-extrabold mt-1 text-gray-900">Edit Category</h3>
                <button onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-900"><i
                        class="ri-close-line text-xl"></i></button>
            </div>
            <form id="editForm" method="POST" class="p-6">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Category Name</label>
                    <input id="editName" name="name" type="text" required
                        class="w-full px-4 py-3 rounded-xl border-2  bg-gray-50 focus:outline-none focus:bg-white transition-all">
                </div>
                <div class="flex gap-3">
                    <button type="button" onclick="closeModal('editModal')"
                        class="flex-1 px-4 py-3 rounded-xl border-2  font-bold text-gray-700 hover:bg-gray-50 transition-all">Cancel</button>
                    <button type="submit"
                        class="flex-1 px-4 py-3 rounded-xl bg-brand-blue hover:bg-brand-blue/80 text-white font-bold transition-all">Update</button>
                </div>
            </form>
        </div>
    </div>

    {{-- DELETE MODAL --}}
    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-3xl shadow-xl w-full max-w-sm overflow-hidden border-2 ">
            <div class="p-6 text-center">
                <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="ri-delete-bin-fill text-3xl"></i>
                </div>
                <h3 class="text-xl font-extrabold text-gray-900 mb-2">Delete Category?</h3>
                <p class="text-gray-500 text-sm mb-6">This action cannot be undone.</p>
                <div class="flex gap-3">
                    <button onclick="closeModal('deleteModal')"
                        class="flex-1 px-4 py-3 rounded-xl border-2  font-bold text-gray-700 hover:bg-gray-50 transition-all">No,
                        Cancel</button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full px-4 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white font-bold active:translate-x-1 active:translate-y-1 transition-all">Yes,
                            Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            const m = document.getElementById(id);
            m.classList.remove('hidden');
            m.classList.add('flex');
        }

        function closeModal(id) {
            const m = document.getElementById(id);
            m.classList.add('hidden');
            m.classList.remove('flex');
        }

        function openAddModal() {
            openModal('addModal');
            document.getElementById('addName').focus();
        }

        function openEditModal(id, name) {
            document.getElementById('editName').value = name;
            document.getElementById('editForm').action = `/categories/update/${id}`;
            openModal('editModal');
        }

        function openDeleteModal(id) {
            document.getElementById('deleteForm').action = `/categories/destroy/${id}`;
            openModal('deleteModal');
        }
    </script>
@endsection
