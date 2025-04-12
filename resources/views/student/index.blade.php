@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Student List</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>ID Number</th>
                <th>Year</th>
                <th>Section</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($student as $key => $stu)
                <tr>
                    <td>{{ $i + $key + 1 }}</td>
                    <td>{{ $stu->id }}</td>
                    <td>{{ $stu->name }}</td>
                    <td>{{ $stu->id_number }}</td>
                    <td>{{ $stu->year }}</td>
                    <td>{{ $stu->section }}</td>
                    <td>{{ $stu->created_at}}</td>
                    <td>{{ $stu->updated_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No student records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination Links --}}
    {{ $student->links() }}
</div>
@endsection
