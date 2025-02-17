@extends('products.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Show Employee</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $employee->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Address:</strong> <br/>
                {{ $employee->address }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Tasks:</strong> <br/>
                @if($employee->tasks->isNotEmpty())
                    <ul>
                        @foreach($employee->tasks as $task)
                            <li>{{ $task->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No assigned tasks</p>
                @endif
            </div>
        </div>
    </div>

  </div>
</div>

@endsection

