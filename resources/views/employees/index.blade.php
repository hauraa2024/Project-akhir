@extends('products.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Data Karyawan</h2>
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('employees.create') }}"> <i class="fa fa-plus"></i> Tambah Karyawan</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tugas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>
    @foreach ($employee->tasks as $task)
        {{ $task->name }}@if (!$loop->last), @endif
    @endforeach
</td>

                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('employees.show', $employee->id) }}">Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>

        {!! $employees->links() !!}
    </div>
</div>

@endsection

