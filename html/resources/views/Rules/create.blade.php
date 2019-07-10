@extends('layouts.advisorLO')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <button class="btn btn-warning" onclick="history.go(-1);">Back </button>
    <div class="card uper">
        <div class="card-header">
            Add Rules
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('rules.store') }}">
                <div class="form-inline">
                    @csrf
                    <label for="degree_id">Degree ID:</label>
                    <input type="text" class="form-control" name="degree_id"/>
                    <label for="course_name">Course Name:</label>
                    <input type="text" class="form-control" name="course_name"/>
                    <label for="fall">Fall:</label>
                    <input type="text" class="form-control" name="fall"/>
                    <label for="spring">Spring:</label>
                    <input type="text" class="form-control" name="spring"/>
                    <button type="submit" class="btn btn-warning">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection