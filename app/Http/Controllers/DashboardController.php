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
        // 1. Validasi dulu inputannya di sini
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // 2. Simpan menggunakan Model 'Todo', bukan 'Request'
        Todo::create([
            'title' => $validated['title'],
            'is_completed' => false,
        ]);

        // 3. Redirect balik ke dashboard
        return redirect()->route('dashboard')->with('success', 'Yeyeyey data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $todos = Todo::findOrFail($id);
        $todos->delete();

        return redirect()->route('dashboard')->with('succes', 'data berhasil dihapus');
    }
}
