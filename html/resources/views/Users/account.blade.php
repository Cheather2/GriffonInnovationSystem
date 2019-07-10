@extends('layouts.app')

@section('content')
    <button class="btn btn-warning" onclick="history.go(-1);">Back </button>
    <div class = container>
        <div class = card id = "stuAcc">
            <div>
            <h1>My Account</h1>
            <h5>Name</h5>
            <p>{{Auth::user()->name}}</p>
            <h5>Email</h5>
            <p>{{Auth::user()->email}}</p>
            <h5>Class Standing</h5>
            <p>{{Auth::user()->class_standing}}</p>
            <h5>Graduation Year</h5>
            <p>{{Auth::user()->graduation_year}}</p>
            <h5>Code Repository</h5>
             <p><a href="//{{Auth::user()->url1}}">{{Auth::user()->url1}}</a></p>
            <h5>Personal Website</h5>
            <p><a href="//{{Auth::user()->url2}}">{{Auth::user()->url2}}</a></p>

            <a href="{{ route('users.edit',Auth::id())}}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>

@endsection