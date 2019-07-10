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
        <div class = card>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Degree</td>
                    <td>Emphasis</td>
                    <td>Degree Type</td>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody>
                @foreach($degrees as $degree)

                    <tr>
                        <td>{{$degree->id}}</td>
                        <td>{{$degree->degree}}</td>
                        <td>{{$degree->emphasis}}</td>
                        <td>{{$degree->degree_type}}</td>
                        <td><a href="{{ route('degrees.edit',$degree->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('degrees.destroy', $degree->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            <a href="{{ route('degrees.create')}}" class="btn btn-dark">Add</a>
        </div>
    </div>
@endsection