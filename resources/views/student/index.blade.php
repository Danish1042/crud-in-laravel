@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="d-flex justify-content-center p-4" style="background-color: lightblue">Crud in Laravel</h4>

        <!-- Button trigger modal -->
        <button type="button" class="d-flex btn btn-success m-4" data-toggle="modal" data-target="#exampleModal">
            Add Students
        </button>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->grade }}</td>
                        <td>
                            <a href="{{ route('student.edit',['id' => $student->id]) }}" class="btn btn-sm btn-primary">Update</a>
                            <a href="{{ route('student.destroy',['id' => $student->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No students found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student.insert') }}" method="post">
                        @csrf
                        <div class="container">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Enter Student Name">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Enter Student Email">
                            <label for="age">Age</label>
                            <input type="text" class="form-control @error('age') is-invalid @enderror" name="age"
                                placeholder="Enter Student Age">
                            <label for="grade">Grade</label>
                            <input type="text" class="form-control @error('grade') is-invalid @enderror" name="grade"
                                placeholder="Enter Student Grade">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
