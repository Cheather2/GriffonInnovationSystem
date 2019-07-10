@extends('layouts.advisorLO')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <button class="btn btn-warning" onclick="history.go(-1);">Back </button>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <div class = card>
            <H2 style="text-align: center">Required Courses for {{$_POST['degree_id']}} </H2>
            <table class = "table-striped">
                <thead class = "border">
                <tr>
                    <td>Course ID</td>
                    <td>Prerequisites</td>
                    <td>Credits</td>
                    <td>Offered</td>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)

                    <tr>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->prereqs}}</td>
                        <td>{{$course->credits}}</td>
                        <td>{{$course->offered}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection