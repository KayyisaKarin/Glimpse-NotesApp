<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Note::with('category')->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $notes = $query->get();

        return view('notes.index', compact('categories', 'notes'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('notes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'bg_color' => 'nullable|string'
        ]);

        Note::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'bg_color' => $request->bg_color ?? 'bg-brand-purple'
        ]);

        return redirect()->route('notes.index')->with('success', 'Note added succesfully');
    }

    public function edit(int $id)
    {
        $categories = Category::all();
        $note = Note::with('category')->findOrFail($id);
        return view('notes.edit', compact('categories', 'note'));
    }

    public function update(Request $request, int $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());

        return redirect()->route('notes.index')->with('success', 'Note updated succesfully');
    }

    public function destroy(int $id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return redirect(route('notes.index'))->with('success', 'Note deleted succesfully');
    }
}