@extends('layouts.app')

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
                <td>Name</td>
                <td>Email</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-warning" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>
            <a href="{{ route('users.create')}}" class="btn btn-warning">Add</a>
        </div>
        </div>
@endsection