<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NotesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $notes = Notes::latest()->get();

        return view('notes.index', compact('categories', 'notes'));
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('notes.create', compact('categories'));
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string|min:5',
            'category_id' => 'nullable|exists:categories,id',
            'bg_color' => 'nullable|string',
        ]);

        $bg = $data['bg_color'] ?? null;
        if (! $bg || ! Str::startsWith($bg, 'bg-')) {
            $bg = 'bg-brand-purple';
        }

        $note = Notes::create([
            'title' => $data['title'],
            'content' => $data['content'] ?? null,
            'category_id' => $data['category_id'] ?? null,
            'bg_color' => $bg,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note saved.');
    }

    public function show(Notes $note){

        $categories = Category::where('user_id', Auth::id())->get();
        
        return view('notes.show', compact('note', 'categories'));
    }

    public function edit(Notes $note)
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('notes.edit', compact('note', 'categories'));
    }

    public function update(Request $request, Notes $note)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string|min:5',
            'category_id' => 'nullable|exists:categories,id',
            'bg_color' => 'nullable|string',
        ]);

        $bg = $data['bg_color'] ?? null;
        if ($bg && ! Str::startsWith($bg, 'bg-')) {
            $bg = null; // ignore invalid values so existing color is preserved
        }

        $note->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'] ?? null,
            'bg_color' => $bg ?? $note->bg_color,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    public function destroy(Notes $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }
}
