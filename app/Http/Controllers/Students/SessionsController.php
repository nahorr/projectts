<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Session;
use App\Semester;
use Carbon\Carbon;
use DataTables;

class SessionsController extends Controller
{
    public function sessions($session_id)
    {
    	$session = Session::find($session_id);
    	$today = Carbon::today();
        $school = School::first();
        $sessions = Session::get();
        $semesters = Semester::where('session_id', '=', $session->id)->get();
    	return view('students.sessions.semesters', compact('session', 'today', 'school','semesters'));
    }

    public function semesterCourses($session_id, $semester_id)
    {
    	$session = Session::find($session_id);
    	$semester = Semester::find($semester_id);
    	$today = Carbon::today();
        $school = School::first();
        $sessions = Session::get();
        $semesters = Semester::where('session_id', '=', $session->id)->get();
    	return view('students.sessions.semestercourses', compact('session','semester','today', 'school','semesters'));
    }

    public function courseRegistration($session_id, $semester_id)
    {
        $session = Session::find($session_id);
        $semester = Semester::find($semester_id);
        return view('students.sessions.courseregistration', compact('session', 'semester'));
    }

    public function getCourseData($session_id, $semester_id)
    {
       $session = Session::find($session_id);
       $semester = Semester::find($semester_id);


       $courses = \DB::table('courses')
                ->join('sessions', 'courses.session_id', '=', 'sessions.id')
                ->join('semesters', 'courses.semester_id', '=', 'semesters.id')
                ->join('departments', 'courses.department_id', '=', 'departments.id')
                ->join('instructors', 'courses.instructor_id', '=', 'instructors.id')
                ->where('courses.session_id', '=', $session->id)
                ->Where('courses.semester_id', '=', $semester->id)
                ->select(['courses.id','courses.course_code','courses.course_name','sessions.session_name', 'semesters.semester_name', 'departments.department_name', 'instructors.first_name', 'instructors.last_name']);


        return Datatables::of($courses)
                ->addColumn('action', function ($course) {
                return '<a href="/students/sessions/courseregistration/'.$course->id.'/'.\Auth::user()->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Register</a> &nbsp; <a href="/students/sessions/courseregistration/'.$course->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> unRegister</a>';
            })->make(true); 
    }

    
}
