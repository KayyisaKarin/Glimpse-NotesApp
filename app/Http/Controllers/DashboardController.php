<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Todo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $todos = Todo::all(); //mengambil semua data todo
        return view('dashboard', compact('todos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string', 
            'date' => 'required|date', 
        ]);
        Todo::create([
            'title' => $validated['title'],
            'date' => false,
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Yeyeyey data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $todos = Todo::findOrFail($id);
        $todos->delete();

        return redirect()->route('dashboard')->with('succes', 'data berhasil dihapus');
    }

    public function eventStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
        ]);
        Events::create([
            'title' => $validated['title'],
            'date' => $validated['date'],
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Yeyeyey data berhasil ditambahkan!');
    }

    public function eventDestroy($id)
    {
        $events = Events::findOrFail($id);
        $events->delete();

        return redirect()->route('dashboard')->with('succes', 'data berhasil dihapus');
    }
}
