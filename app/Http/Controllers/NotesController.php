<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
<<<<<<< HEAD
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
=======
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'bg_color' => 'nullable|string' 
        ]);

        Note::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'bg_color' => $request->bg_color ?? 'bg-brand-purple'
>>>>>>> 43ee8775df96c1023e085f8a8096243760075630
        ]);

        return redirect(route('notes.index'))->with('success', 'Note added succesfully');
    }

<<<<<<< HEAD
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
=======
    public function edit($id)
    {
        $categories =  Category::all();
        $note = Note::with('category')->findOrFail($id);
        return view('notes.edit', compact('categories', 'note'));
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
>>>>>>> 43ee8775df96c1023e085f8a8096243760075630
    }
}
