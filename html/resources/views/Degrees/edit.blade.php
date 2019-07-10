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
            Edit Degree
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
            <form method="post" action="{{ route('degrees.update', $degree->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    @csrf
                    <label for="degree">Degree:</label>
                    <input type="text" class="form-control" name="degree" value="{{ $degree->degree }}" />
                </div>
                <div class="form-group">
                    <label for="emphasis">Emphasis:</label>
                    <input type="text" class="form-control" name="emphasis" value="{{ $degree->emphasis }}" />
                </div>

                <div class="form-group">
                    <label for="degree_type">Degree Type:</label>
                    <input type="text" class="form-control" name="degree_type" value="{{ $degree->degree_type }}" />
                </div>

                <button type="submit" class="btn btn-warning">Update</button>

            </form>
        </div>
    </div>
@endsection
