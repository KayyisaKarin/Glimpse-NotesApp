<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $notes = Note::with('category')->latest()->get();

        return view('notes.index', compact('categories'), compact('notes'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('notes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'bg_color' => 'nullable|string' 
        ]);

        Note::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'bg_color' => $request->bg_color ?? 'bg-brand-purple'
        ]);

        return redirect(route('notes.index'))->with('success', 'Note added succesfully');
    }

    public function edit($id)
    {
        $categories =  Note::all();
        $note = Note::with('category')->findOrFail($id);
        return view('notes.edit', compact('categories'), compact('note'));
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());
        return redirect(route('notes.index'))->with('success', 'Note updated succesfully');
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return redirect(route('notes.index'))->with('success','Note deletes succesfully');
    }
}
