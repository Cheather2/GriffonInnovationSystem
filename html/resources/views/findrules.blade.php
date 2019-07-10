@extends('layouts.advisorLO')

@section('content')

    <form class="form-inline" method="post" action="rules/search">
        @csrf
        <label for="id">id:</label>
        <input type="text" class="form-control" name="id" id="id">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection