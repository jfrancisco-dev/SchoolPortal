<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskList;

class TaskListController extends Controller
{
    public function index() {
        return view('tasklists.index', compact('tasklists'));
    }

    public function create() {
        return view('tasklists.create');
    }

    public function store() {
        return redirect()->route('tasklist.index')->with('success', 'Tasklist created successfully ');
    }

    public function show() {
        return view('tasklists.show', compact('tasklist'));
    }

    public function edit() {
        return view('tasklists.edit', compact('tasklist'));
    }

    public function update() {
        return redirect()->route('tasklist.index')->with('success', 'Tasklist updated successfully');
    }

    public function destroy() {
        return redirect()->route('tasklist.index')->with('success', 'Tasklist deleted successfully.');
    }
}
