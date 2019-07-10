@extends('layouts.advisorLO')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif

    </div>

    <div class="card" style="margin-bottom: 100px;">
        <div class="card-header">
            <h3>Search/Create/Delete Four Year Plan</h3>
        </div>
        <div class="card-body">
            <div style="padding-bottom: 20px; padding-top: 20px; ">
                <h4>Search for existing four year plan</h4>
                <form class="form-inline" method="post" action="searchFyp">
                    @csrf
                    <label for="id" style="color: #04082e;">Student Email:</label>
                    <input type="text" class="form-control" name="student_email" id="student_email">

                    <button type="submit" class="btn btn-warning">Search</button>
                </form>
            </div>
            <div style="padding-bottom: 20px; padding-top: 20px;">
                <h4>Delete existing four year plan</h4>
                <form class="form-inline" method="post" action="delete">
                    @csrf
                    <label for="id" style="color: #04082e;">Student Email:</label>
                    <input type="text" class="form-control" name="student_email" id="student_email">

                    <button type="submit" class="btn btn-dark">Delete</button>
                </form>
            </div>
            <form method="post" action="{{ route('fyps.store') }}">
                <div class="form-group">
                    <h4 style="padding-top: 20px">Create new four year plan</h4>
                    @csrf
                    <label for="student_email">Student Email:</label>
                    <input type="email" class="form-control" name="student_email"/>
                </div>
                <div class="form-group">
                    <label for="degree_id">Degree ID:</label>
                    <select type="text" class="form-control" name="degree_id">
                        <
                        <option>CIS</option>
                        <option>CSC</option>
                        <option>ACT</option>
                    </select>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="fall" value="1">Fall</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="spring" value="1">Spring </label>
                </div>
                <button type="submit" class="btn btn-warning">Create</button>
            </form>
        </div>
    </div>
@endsection