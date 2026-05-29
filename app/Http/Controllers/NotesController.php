<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index(){
        return view('notes.index');
    }

    public function create()
    {
        return view('notes.create');
    }
    public function store(Request $request){}
}
