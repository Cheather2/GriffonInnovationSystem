@extends('layouts.advisorLO')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
            <div style="padding-bottom: 10px; ">
                <form class="form-inline" method="post" action="courses/searchDeg" style="color: #ffffff;">
                    @csrf
                    <label for="id" style="color: #ffffff;">Select Degree:</label>
                    <select type="text" class="form-control" name="degree_id">
                        <
                        <option>CIS</option>
                        <option>CSC</option>
                        <option>ACT</option>
                    </select>
                    <button type="submit" class="btn btn-warning">Search</button>
                </form>
            </div>
        <div class = card style="margin-bottom: 100px">
            <a href="{{ route('courses.create')}}" class="btn btn-dark">Add</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Course Name</td>
                    <td>Course Description</td>
                    <td>Prerequisites</td>
                    <td>Credits</td>
                    <td>Offered</td>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)

                    <tr>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->course_description}}</td>
                        <td>{{$course->prereqs}}</td>
                        <td>{{$course->credits}}</td>
                        <td>{{$course->offered}}</td>
                        <td><a href="{{ route('courses.edit',$course->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('courses.destroy', $course->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection