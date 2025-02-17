<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    // Menampilkan semua tasks
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    // Menampilkan halaman create task
    public function create()
    {
        return view('tasks.create');
    }

    // Menyimpan task baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan!');
    }

    // Menampilkan detail task
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Menampilkan halaman edit task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Memperbarui task di database
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui!');
    }

    // Menghapus task dari database
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus!');
    }
}
