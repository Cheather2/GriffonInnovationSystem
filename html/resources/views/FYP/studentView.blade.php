@extends('layouts.app')
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
            </div><br/>
        @endif
        @php
            $j = 0;

            $col = 1;

            $i = 0;

            $hc = 0;

            $headColors = array("#a6c4f4","#a6c4f4", "#c9eac5", "#c9eac5", "#efa2a2", "#efa2a2", "#ede68e", "#ede68e",
            "#a6c4f4","#a6c4f4", "#c9eac5", "#c9eac5", "#efa2a2")
        @endphp
        <div class=card style="margin-bottom:100px">
            <div class="container">
                <div class="row justify-content-md-center no-gutters">
                    <div class="col-lg-4 logo" >
                        <img src="../images/MWSUlogo-small.png" alt="Griffin Logo">
                    </div>

                </div>
            </div>
            <div style="text-align: center">
                <H2 class="fypHead">  Four Year Plan for {{Auth::user()->name}} </H2>
            </div>
            @while($i<sizeof($courses2))
                <div class="d-inline">
                    <table class="one col-lg-6 float-left">
                        <tbody>
                        @if($col==1)
                            <thead>
                            @if($i%5==0)
                                <tr>
                                    <th colspan="6" style="background-color: {{$headColors[$hc]}}"
                                        class="tableHeaders">{{$Semester[$j]->semester}}</th>
                                </tr>
                                @php
                                    $j++;
                                     $hc++;// $jre
                                @endphp
                            @endif
                            @for($k=0;$k<5;$k++)
                                @if($i<sizeof($courses2))
                            </thead>
                            <tr>
                                <td>{{$courses2[$i]->course_name}}</td>
                                <td>{{$courses2[$i]->course_description}}</td>
                                <td>{{$courses2[$i]->credits}}</td>
                            </tr>
                            @php
                                $i=$i+1
                            @endphp
                        @endif
                        @endfor
                        @php
                            $col=2 //switch to second table
                        @endphp
                    </table>
                    @else
                        <div>
                        <table class="col-lg-6">
                            <thead>
                            @if($i % 5 == 0)
                                <tr>
                                    <th colspan="6" style="background-color: {{$headColors[$hc]}}"
                                        class="tableHeaders">{{$Semester[$j]->semester}}</th>
                                </tr>
                                @php
                                    $j++;
                                $hc++;
                                @endphp
                            @endif
                            </thead>
                            @for($k=0;$k<5;$k++)
                                @if($i<sizeof($courses2))
                                    <tr>
                                        <td>{{$courses2[$i]->course_name}}</td>
                                        <td>{{$courses2[$i]->course_description}}</td>
                                        <td>{{$courses2[$i]->credits}}</td>
                                    </tr>
                                    @php
                                        $i=$i+1
                                    @endphp
                                @endif
                            @endfor
                            @php
                                $col=1
                            @endphp
                        </table>
                        </div>
                </div>
                @endif
            @endwhile
        </div>
    </div>
@endsection

