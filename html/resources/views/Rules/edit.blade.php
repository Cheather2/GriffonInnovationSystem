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
            Edit Rules
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
            <form method="post" action="{{ route('rules.update', $rule->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    @csrf
                    <label for="degree_id">Degree ID:</label>
                    <input type="text" class="form-control" name="degree_id" value="{{ $rule->degree_id }}" />
                </div>

                <div class="form-group">
                    <label for="course_name">Course ID:</label>
                    <input type="text" class="form-control" name="course_name" value="{{ $rule->course_name}}" />
                </div>

                <div class="form-group">
                    <label for="fall">Fall:</label>
                    <input type="text" class="form-control" name="fall" value="{{ $rule->fall }}" />
                </div>

                <div class="form-group">
                    <label for="spring">Spring:</label>
                    <input type="text" class="form-control" name="spring" value="{{ $rule->spring }}" />
                </div>

                <button type="submit" class="btn btn-warning">Update</button>

            </form>
        </div>
    </div>
@endsection
