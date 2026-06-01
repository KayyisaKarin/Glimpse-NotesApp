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

        Note::create([
            'category_id'   => $request->category_id,
            'title'         => $request->title,
        ]);

        return redirect(route('admin.book.index'))->with('success', 'Buku berhasil ditambahkan');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

}
