@extends('layouts.app')
@section('content')
    <div class="container">
        <h4 class="d-flex justify-content-center p-4" style="background-color: lightblue">Crud in Laravel</h4>
        <form action="{{ route('student.update',['id' => $student->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$student->name}}"
                    placeholder="Enter Student Name">
                <label for="email">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$student->email}}"
                    placeholder="Enter Student Email">
                <label for="age">Age</label>
                <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{$student->age}}"
                    placeholder="Enter Student Age">
                <label for="grade">Grade</label>
                <input type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{$student->grade}}"
                    placeholder="Enter Student Grade">
            </div>
            <button type="submit" class="btn btn-success m-4">Update Student</button>
        </form>
    </div>
@endsection
@push('js')
@endpush
