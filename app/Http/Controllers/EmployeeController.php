<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('tasks')->paginate(10);

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $tasks = Task::all();
        return view('employees.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'task_id' => 'required|exists:tasks,id',
        ]);

        $employee = Employee::create($request->only(['name', 'address']));

        $employee->tasks()->attach($request->task_id);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }



    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $tasks = Task::all();
        $employee->load('tasks');

        return view('employees.edit', compact('employee', 'tasks'));
    }


    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tasks' => 'array'
        ]);

        $employee->update($request->only(['name', 'address']));
        $employee->tasks()->sync($request->tasks);

        return redirect()->route('employees.index')->with('success', 'Employee berhasil diperbarui!');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
