<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * SELECT * FROM tasks ORDER BY created_at DESC
     */
    public function index()
    {
        $this->authorize('viewAny', Task::class);
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Task::class);
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     * INSERT INTO tasks (title, description) VALUES (?, ?)
     */
    public function store(Request $request)
    {
        $this->authorize('create', Task::class);
        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
        ]);

        auth()->user()->tasks()->create($request->only('title', 'description'));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        $request->validate([
            'title' => 'required|min:3|max:255',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE FROM tasks WHERE id = ?
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée !');
    }
}
