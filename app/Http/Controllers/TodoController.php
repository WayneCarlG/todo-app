<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except([]);
    // }

    public function index()
    {
        $todos = auth()->user()->todos()->latest()->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Todo::create([
            'title'       => $request->title,
            'description' => $request->description,
            'user_id'     => auth()->id(),        // ← Important
        ]);

        return redirect()->route('todos.index')
                         ->with('success', 'Todo created successfully!');
    }

    public function edit(Todo $todo)
    {
        // Security: Prevent editing other users' todos
        if ($todo->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        if ($todo->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $todo->update([
            'title'       => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('todos.index')
                         ->with('success', 'Todo updated successfully!');
    }

    public function toggle(Todo $todo)
    {
        if ($todo->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $todo->update(['completed' => !$todo->completed]);

        return redirect()->route('todos.index')
                         ->with('success', 'Todo status updated!');
    }

    public function destroy(Todo $todo)
    {
        if ($todo->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $todo->delete();

        return redirect()->route('todos.index')
                         ->with('success', 'Todo deleted successfully!');
    }
}