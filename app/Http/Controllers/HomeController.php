<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Session;
use App\Semester;
use Carbon\Carbon;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
        $school = School::first();
        $sessions = Session::get();
        $semesters = Semester::get();

        return view('home', compact('today', 'school', 'sessions', 'semesters'));
    }
}
