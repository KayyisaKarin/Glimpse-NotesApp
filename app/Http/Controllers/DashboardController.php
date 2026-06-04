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

        $events = Events::all();
        $events = Events::where('date', '>=', now()->toDateString())
                   ->orderBy('date', 'asc') // Sekalian diurutin dari yang paling dekat
                   ->get();

        return view('dashboard', compact('todos', 'latestNotes', 'totalNotes', 'events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:1|max:30',
        ]);

        Todo::create([
            'title' => $validated['title'],
            'is_completed' => false,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data added succesfully!');
    }

    public function destroy(int $id)
    {
        $todos = Todo::findOrFail($id);
        $todos->delete();

        return redirect()->route('dashboard')->with('success', 'Data deleted succesfully.');
    }

    public function toggle(Request $request, int $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->update(['is_completed' => $request->is_completed]);
        return response()->json(['success' => true]);
    }

    public function storeEvent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:1|max:255',
            'date' => 'required|date|date_format:Y-m-d',
        ]);

        Events::create([
            'title' => $validated['title'],
            'date' => $validated['date'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Event added successfully!');
    }

    public function updateEvent(Request $request, int $id)
    {
        $event = Events::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|min:1|max:255',
            'date' => 'required|date|date_format:Y-m-d',
        ]);

        $event->update($validated);

        return redirect()->route('dashboard')->with('success', 'Event updated successfully!');
    }

    public function destroyEvent(int $id)
    {
        $event = Events::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard')->with('success', 'Event deleted successfully.');
    }
}
