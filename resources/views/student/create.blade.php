@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Student</h2>
    
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
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="id_number">ID Number</label>
            <input type="text" name="id_number" id="id_number" class="form-control" value="{{ old('id_number') }}" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" id="year" class="form-control" value="{{ old('year') }}" required>
        </div>

        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" name="section" id="section" class="form-control" value="{{ old('section') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Student</button>
    </form>
</div>
@endsection
