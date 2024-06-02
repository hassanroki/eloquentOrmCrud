@extends('crud.master')

@section('content')
    <div class="studentsEdit">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Student</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $student->name }}" required>
                        </div>
                        {{-- Add more fields as needed --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('students.index', $student->id) }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
