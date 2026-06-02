<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $categories = Category::all();

        return view('notes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'bg_color' => 'nullable|string',
        ]);

        $note = Notes::create([
            'title' => $data['title'],
            'content' => $data['content'] ?? null,
            'category_id' => $data['category_id'] ?? null,
            'bg_color' => $data['bg_color'] ?? 'bg-brand-purple',
        ]);

        return redirect()->route('notes.index')->with('success', 'Note saved.');
    }

}
