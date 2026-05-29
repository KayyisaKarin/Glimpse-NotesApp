<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('notes.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:20',
            ],
            [
                'name.required' => 'Fill out the category name.',
                'name.string' => 'Category name must be a string.',
                'name.max' => 'Category name cannot be longer than 20 characters.',
            ]
        );

        Category::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Category created successfully!');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:20' . $id,
        ], [
            'name.required' => 'Fill out the category name.',
            'name.string' => 'Category name must be a string.',
            'name.max' => 'Category name cannot be longer than 20 characters.',
        ]);

        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);

        return back()->with('success', 'Category updated successfully!');
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Category deleted successfully!');
    }
}
