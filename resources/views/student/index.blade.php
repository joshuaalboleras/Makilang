@extends('layouts.app')

@section('additional-style')
<style>
    .student-list-container {
        padding: 20px;
    }

    .student-list-container h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
    }

    .btn-create {
        display: inline-block;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-create:hover {
        background-color: #0056b3;
    }

    .student-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        overflow: hidden; /* To contain rounded borders */
    }

    .student-table th, .student-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    .student-table th {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #555;
    }

    .student-table tbody tr:hover {
        background-color: #f5f5f5;
    }

    .actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-view, .btn-edit {
        display: inline-block;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .btn-view {
        background-color: #28a745; /* Green */
        color: white;
    }

    .btn-view:hover {
        background-color: #1e7e34;
    }

    .btn-edit {
        background-color: #007bff; /* Blue */
        color: white;
    }

    .btn-edit:hover {
        background-color: #0056b3;
    }

    .form-delete {
        display: inline; /* To keep it in line with the buttons */
        margin: 0;
    }

    .btn-delete {
        background-color: #dc3545; /* Red */
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .empty-message {
        text-align: center;
        padding: 20px;
        color: #777;
    }

    /* Optional: Style the pagination links */
    /*.pagination {*/
    /* display: flex;*/
    /* justify-content: center;*/
    /* margin-top: 20px;*/
    /*}*/

    /*.pagination li {*/
    /* display: inline-block;*/
    /* margin: 0 5px;*/
    /*}*/

    /*.pagination li a, .pagination li span {*/
    /* padding: 8px 12px;*/
    /* border: 1px solid #ddd;*/
    /* text-decoration: none;*/
    /* color: #333;*/
    /* border-radius: 5px;*/
    /*}*/

    /*.pagination li.active span {*/
    /* background-color: #007bff;*/
    /* color: white;*/
    /* border-color: #007bff;*/
    /*}*/

    /*.pagination li a:hover {*/
    /* background-color: #eee;*/
    /*}*/
</style>
@endsection

@section('content')
<div class="student-list-container">
    <h2>Student List</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('student.create') }}" class="btn btn-primary btn-create">Create Student</a>
    <table class="table table-bordered student-table">
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
                <th>Action</th>
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
                    <td>
                        <div class="actions">
                            <a href="{{ route("student.show",$stu) }}" class="btn btn-view">View</a>
                            <a href="{{ route("student.edit",$stu) }}" class="btn btn-edit">Edit</a>
                            <form action="{{route('student.delete',$stu)}}" method="post" class="form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center empty-message">No student records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination Links --}}
    {{ $student->links() }}
</div>
@endsection