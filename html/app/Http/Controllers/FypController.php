<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fyp;
use Auth;
use App\User;

class FypController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FYP.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (User::where('email', '=', $_POST['student_email'])->exists()) {

            if (Fyp::where('student_email', '=', $_POST['student_email'])->exists()){
                return back()->with('message', $_POST['student_email'].' Already Has Four Year Plan');
            }
            else
            $user = \DB::table('users')->where('email', $_POST['student_email'])->value('name');

            $Semester = \DB::table('semester_headers')
                ->select('*')
                ->orderBy('id')
                ->get();


            $request->validate([
                'student_email' => 'required',
                'degree_id' => 'required',
            ]);
            $semester = '';
            if (isset($_POST['fall'])) {
                $semester = 'rules.fall';
            } else if (isset($_POST['spring'])) {
                $semester = 'rules.spring';
            }

            $courses = \DB::table('rules')
                ->join('courses', 'rules.course_name', '=', 'courses.course_name')
                ->select('courses.*', 'rules.degree_id', 'courses.course_name', 'courses.credits', $semester)
                ->where('rules.degree_id', $_POST['degree_id'])
                ->orderBy($semester)
                ->get();

            foreach ($courses as $course) {
                if (isset($_POST['fall']) AND $semester = 'rules.fall') {
                    $sem = 'fall';
                } else {
                    $sem = 'spring';
                }
                $data = array('student_email' => $_POST['student_email'], 'course_name' => $course->course_name, 'semester' => $course->$sem);
                fyp::insert($data);
            }

            $courses2 = \DB::table('fyp')
                ->join('courses', 'fyp.course_name', '=', 'courses.course_name')
                ->select('fyp.*', 'courses.course_name', 'courses.course_description', 'courses.credits', 'fyp.semester')
                ->where('fyp.student_email', '=', $_POST['student_email'])
                ->orderBy('fyp.semester')
                ->get();

            return view('FYP/createdView', compact('courses2', 'Semester', 'user'));
        }
        else
            return back()->with('message', 'User With Email '.$_POST['student_email'].' Not Found Please Create Account');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function delete()
    {
        Fyp::where('student_email', [$_POST['student_email']])->delete();

        return redirect('fyps/create')->with('message', 'Four Year Plan For '.$_POST['student_email'].' Has Been Deleted');
    }

    public function searchFyp()
    {
        if (Fyp::where('student_email', '=', $_POST['student_email'])->exists()) {
            $user = \DB::table('users')->where('email', $_POST['student_email'])->value('name');

            $Semester = \DB::table('semester_headers')
                ->select('*')
                ->orderBy('id')
                ->get();

            $courses2 = \DB::table('fyp')
                ->join('courses', 'fyp.course_name', '=', 'courses.course_name')
                ->select('fyp.*', 'courses.course_name', 'courses.course_description', 'courses.credits', 'fyp.semester')
                ->where('fyp.student_email', '=', $_POST['student_email'])
                ->orderBy('fyp.semester')
                ->get();

            return view('FYP/searchView', compact('courses2', 'Semester', 'user'));
        }else
            return back()->with('message', 'No Four Year Plan Found For '.$_POST['student_email']);
    }

    public function studentSearchFyp()
    {
        $Semester = \DB::table('semester_headers')
            ->select('*')
            ->orderBy('id')
            ->get();

        $courses2 = \DB::table('fyp')
            ->join('courses', 'fyp.course_name', '=', 'courses.course_name')
            ->select('fyp.*', 'courses.course_name','courses.course_description', 'courses.credits', 'fyp.semester')
            ->where('fyp.student_email','=', Auth::user()->email)
            ->orderBy('fyp.semester')
            ->get();

        return view('FYP/studentView', compact('courses2','Semester'));
    }
}
