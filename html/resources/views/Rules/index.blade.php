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
            <form class="form-inline" method="post" action="rules/search" style="color: #ffffff;">
                @csrf
                <label for="degree_id"> Select Degree ID:</label>
                <select type="text" class="form-control" name="degree_id">
                    <
                    <option>CIS</option>
                    <option>CSC</option>
                    <option>ACT</option>
                </select>
                <button type="submit" class="btn btn-warning">Submit</button>
            </form>


        </div>
        <div class = card style="margin-bottom: 100px">
            <a href="{{ route('rules.create')}}" class="btn btn-dark">Add</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Degree ID</td>
                    <td>Course Name</td>
                    <td>Fall</td>
                    <td>Spring</td>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($rules as $rule)

                    <tr>
                        <td>{{$rule->degree_id}}</td>
                        <td>{{$rule->course_name}}</td>
                        <td>{{$rule->fall}}</td>
                        <td>{{$rule->spring}}</td>
                        <td><a href="{{ route('rules.edit',$rule->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('rules.destroy', $rule->id)}}" method="post">
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