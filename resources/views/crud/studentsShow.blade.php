@extends('crud.master')

@section('content')
    <div class="studentsShow">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h2>Student Details</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $student->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $student->email }}" readonly>
                    </div>
                    {{-- Add more fields as needed --}}
                    <a href="{{ route('students.index') }}" class="btn btn-primary">Back to Students</a>
                </div>
            </div>
        </div>
    </div>
@endsection
