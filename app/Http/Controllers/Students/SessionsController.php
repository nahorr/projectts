<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Session;
use App\Semester;
use Carbon\Carbon;


class SessionsController extends Controller
{
    public function sessions($session_id)
    {
    	$session = Session::find($session_id);
    	$today = Carbon::today();
        $school = School::first();
        $sessions = Session::get();
        $semesters = Semester::where('session_id', '=', $session->id)->get();
    	return view('students.sessions.session', compact('session', 'today', 'school','semesters'));
    }

    public function courses($session_id, $semester_id)
    {
    	$session = Session::find($session_id);
    	$semester = Semester::find($semester_id);
    	$today = Carbon::today();
        $school = School::first();
        $sessions = Session::get();
        $semesters = Semester::where('session_id', '=', $session->id)->get();
    	return view('students.sessions.courses', compact('session','semester','today', 'school','semesters'));
    }
}
