<?php

namespace App\Http\Controllers;

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
            'title' => 'required|string|max:255',
        ]);
        Todo::create([
            'title' => $validated['title'],
            'is_completed' => false,
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Yeyeyey data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $todos = Todo::findOrFail($id);
        $todos->delete();

        return redirect()->route('dashboard')->with('succes', 'data berhasil dihapus');
    }
}
