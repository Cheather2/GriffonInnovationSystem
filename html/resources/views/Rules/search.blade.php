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
            <H2 style="text-align: center">Rules for  {{$_POST['degree_id']}} </H2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Degree Name</td>
                    <td>Course ID</td>
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