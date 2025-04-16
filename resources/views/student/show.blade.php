@extends('layouts.app')
@section('additional-style')
    <style>
          .card {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #1a365d;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .card-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #1a365d;
            padding-bottom: 10px;
        }

        .card-title {
            font-size: 24px;
            color: #1a365d;
            margin-bottom: 5px;
        }

        .card-details {
            display: grid;
            gap: 10px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
        }

        .detail-row strong {
            font-weight: bold;
        }

        .card-footer {
            margin-top: 20px;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
            font-size: 12px;
            color: #718096;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Student ID Card</h1>
        </div>
        <div class="card-details">
            <div class="detail-row">
                <strong>ID:</strong>
                <span>{{$student->id}}</span>
            </div>
            <div class="detail-row">
                <strong>Name:</strong>
                <span>{{$student->name}}</span>
            </div>
            <div class="detail-row">
                <strong>ID Number:</strong>
                <span>{{$student->id_number}}</span>
            </div>
            <div class="detail-row">
                <strong>Year:</strong>
                <span>{{$student->year}}</span>
            </div>
            <div class="detail-row">
                <strong>Section:</strong>
                <span>{{$student->section}}</span>
            </div>
        </div>
        <div class="card-footer">
            <div>{{$student->created_at}}</div>
            <div>{{$student->updated_at}}</div>
            <div><a href="{{ route('student.index')}}">Home</a></div>
        </div>
    </div>
@endsection