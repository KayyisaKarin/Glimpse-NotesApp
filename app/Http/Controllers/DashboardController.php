<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Note;
use App\Models\Todo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $todos = Todo::all(); //mengambil semua data todo
        $latestNotes = Note::with('category')->latest()->limit(3)->get();
        $totalNotes = Note::count();
        return view('dashboard', compact('todos', 'latestNotes', 'totalNotes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Todo::create([
            'title' => $validated['title'],
            'is_completed' => false,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy(int $id)
    {
        $todos = Todo::findOrFail($id);
        $todos->delete();

        return redirect()->route('dashboard')->with('success', 'Data berhasil dihapus.');
    }
}
