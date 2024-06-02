@extends('crud.master')

@section('content')
    <div class="students">
        <div class="container mt-5">
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">New Student Add</a>
            <hr>
            {{-- Flash Session Confirmation Msg Option 01 --}}
            @if (session('success'))
                <div class="alert alert-success" id="removeMsg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Flash Session Confirmation Msg Option 02 --}}
            {{-- @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif --}}

            {{-- Flash Session Confirmation Msg Option 03 --}}
            {{-- @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif --}}



            <h2 class="mb-4">Students Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    {{-- Add your action buttons here --}}
                                    {{-- For example, edit and delete buttons --}}
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('students.show', $student->id) }}"
                                        class="btn btn-secondary">Details</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
