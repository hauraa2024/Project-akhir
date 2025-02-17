@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Edit Employee</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input type="text" name="name" value="{{ $employee->name }}" class="form-control @error('name') is-invalid @enderror" id="inputName">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputAddress" class="form-label"><strong>Address:</strong></label>
            <input type="text" name="address" value="{{ $employee->address }}" class="form-control @error('address') is-invalid @enderror" id="inputAddress">
            @error('address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <select name="tasks[]" class="form-control @error('tasks') is-invalid @enderror" id="inputTasks" multiple>
    @foreach($tasks as $task)
        <option value="{{ $task->id }}"
            {{ in_array($task->id, old('tasks', $employee->tasks->pluck('id')->toArray())) ? 'selected' : '' }}>
            {{ $task->name }}
        </option>
    @endforeach
</select>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
    </form>

  </div>
</div>

@endsection

