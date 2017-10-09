@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Your {{@$session->session_name}} {{@$semester->semester_name}} Courses 
                    <div class="pull-right">

                    @if($today->between(@$semester->reg_starts,@$semester->reg_ends))
                        <a href="{{asset("/students/$session->id/$semester->id/courseregistration") }}" >
                            Register
                        </a>
                    @endif
                    </div>
                </div>
                
                <div class="panel-body">
                   
                 No Courses yet!

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
