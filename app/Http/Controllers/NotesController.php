<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('notes.index', compact('categories'));
    }

    public function create()
    {
        return view('notes.create');
    }
    public function store(Request $request){}
}
}
