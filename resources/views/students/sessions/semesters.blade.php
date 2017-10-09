@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Semesters <div class="pull-right">{{@$session->session_name}}</div></div>
                
                <div class="panel-body">
                   
                 <ul>
                    @foreach($semesters as $semester)
                      <li>
                        <a href="{{asset("/$session->id/$semester->id/semestercourses") }}" >{{@$semester->semester_name}}</a>
                        @if($today->between(@$semester->start_date,@$semester->end_date))
                             - Current Semester
                        @endif
                      </li>
                    @endforeach
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
