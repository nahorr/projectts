@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sessions <div class="pull-right">{{@$school->school_name}}</div></div>
                
                <div class="panel-body">
                   
                    <ul>
                    @foreach($sessions as $session)
                      <li>
                        <a href="{{ asset("/$session->id/semesters") }}" >{{@$session->session_name}}</a>
                        @if($today->between(@$session->start_date,@$session->end_date))
                             - Current Session
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
