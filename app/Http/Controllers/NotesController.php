<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('notes.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();

        return view('notes.create', compact('categories'));
    }

}
