@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <button class="btn btn-warning" onclick="history.go(-1);">Back </button>
    <div class="card uper">
        <div class="card-header">
            Edit Account
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
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    @csrf
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
                </div>
                <div class="form-group">
                    <label for="class_standing">Class Standing:</label>
                    <select class="form-control" name="class_standing" value="{{ $user->class_standing }}">
                        <option>Freshman</option>
                        <option>Sophomore</option>
                        <option>Junior</option>
                        <option>Senior</option>
                        <option>Graduated</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="graduation_year">Graduation Year:</label>
                    <input type="text" class="form-control" name="graduation_year" value="{{ $user->graduation_year }}"/>
                </div>

                <div class="form-group">
                    <label for="url1">URL 1:</label>
                    <input type="text" class="form-control" name="url1" value="{{ $user->url1 }}" />
                </div>

                <div class="form-group">
                    <label for="url2">URL 2:</label>
                    <input type="text" class="form-control" name="url2" value="{{ $user->url2 }}" />
                </div>

                <button type="submit" class="btn btn-warning">Update</button>

            </form>
        </div>
    </div>
@endsection
