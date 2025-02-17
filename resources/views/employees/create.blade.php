@extends('products.layout')

@section('content')
<div class="card mt-5">
    <h2 class="card-header">Tambah Karyawan</h2>
    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Alamat:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tugas:</label>
                <select name="task_id" class="form-control" required>
                    @foreach($tasks as $task)
                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
@endsection

