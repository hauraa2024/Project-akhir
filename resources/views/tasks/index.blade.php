@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Tasks List</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('tasks.create') }}"><i class="fa fa-plus"></i> Create Task</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Task Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ ++$loop->index }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('tasks.show', $task->id) }}">Show</a>
                <a class="btn btn-primary btn-sm" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

  </div>
</div>

@endsection

