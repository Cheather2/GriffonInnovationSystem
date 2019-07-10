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
            Edit Course
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
            <form method="post" action="{{ route('courses.update', $course->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    @csrf
                    <label for="course_name">Course Name:</label>
                    <input type="text" class="form-control" name="course_name" value="{{ $course->course_name }}" />
                </div>

                <div class="form-group">
                    <label for="course_description">Course Description:</label>
                    <input type="text" class="form-control" name="course_description" value="{{ $course->course_description }}" />
                </div>

                <div class="form-group">
                    <label for="prereqs">Prerequisites:</label>
                    <input type="text" class="form-control" name="prereqs" value="{{ $course->prereqs}}" />
                </div>

                <div class="form-group">
                    <label for="credits">Credits:</label>
                    <input type="text" class="form-control" name="credits" value="{{ $course->credits }}" />
                </div>

                <div class="form-group">
                    <label for="offered">Offered:</label>
                    <input type="text" class="form-control" name="offered" value= "{{ $course->offered }}" />
                </div>

                <button type="submit" class="btn btn-warning">Update</button>

            </form>
        </div>
    </div>
@endsection
