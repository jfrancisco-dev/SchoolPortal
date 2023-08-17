<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        return view('tasks.create');
    }

    public function store() {
        return redirect()->route('task.index')->with('success', 'Task created successfully ');
    }

    public function show() {
        return view('tasks.show', compact('tasklist'));
    }

    public function edit() {
        return view('tasks.edit', compact('tasklist'));
    }

    public function update() {
        return redirect()->route('task.index')->with('success', 'Task updated successfully');
    }

    public function destroy() {
        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }
}
