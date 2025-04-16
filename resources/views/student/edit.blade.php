@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Update Student</h2>
    
    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Form for creating a new student -->
    <form action="{{ route('student.update',$student) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$student->name }}" required>
        </div>

        <div class="form-group">
            <label for="id_number">ID Number</label>
            <input type="text" name="id_number" id="id_number" class="form-control" value="{{ $student->id_number }}" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" id="year" class="form-control" value="{{ $student->year }}" required>
        </div>

        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" name="section" id="section" class="form-control" value="{{ $student->section }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection