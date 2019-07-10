<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return view('Courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name'=>'required',
            'course_description'=>'required',
            'credits'=>'required',
        ]);
        $Course = new Course([
            'course_name' => $request->get('course_name'),
            'course_description'=>$request->get('course_description'),
            'prereqs'=>$request->get('prereqs'),
            'credits' => $request->get('credits'),
            'offered' => $request->get('offered')
        ]);
        $Course->save();
        return redirect('/courses')->with('success', 'Course has been added');
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
        $course = Course::find($id);

        return view('courses.edit', compact('course'));
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
        $request->validate([
            'course_name'=>'required',
            'course_description'=>'required',
            'credits'=>'required'
        ]);

        $course = Course::find($id);
        $course->course_name = $request->get('course_name');
        $course->course_description = $request->get('course_description');
        $course->prereqs = $request->get('prereqs');
        $course->credits = $request->get('credits');
        $course->offered = $request->get('offered');
        $course->save();

        return redirect('/courses')->with('success', 'Course has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('/courses')->with('success', 'Course has been deleted Successfully');
    }

    public function searchDeg()
    {
        $courses = \DB::table('courses')
            ->join('rules', 'courses.course_name', '=', 'rules.course_name')
            ->select('courses.*', 'rules.degree_id','courses.prereqs', 'courses.credits', 'courses.offered')
            ->where('rules.degree_id', $_POST['degree_id'])
            ->get();

        return view('courses.searchDeg', compact('courses'));
    }
}
