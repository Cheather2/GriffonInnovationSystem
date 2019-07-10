<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Degree;

class DegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees = Degree::all();

        return view('Degrees.index', compact('degrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Degrees.create');
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
            'degree'=>'required',
            'emphasis'=>'required',
        ]);
        $Degree = new Degree([
            'degree' => $request->get('degree'),
            'emphasis' => $request->get('emphasis'),
            'degree_type' => $request->get('degree_type')
        ]);
        $Degree->save();
        return redirect('/degrees')->with('success', 'Degree has been added');
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
        $degree = Degree::find($id);

        return view('degrees.edit', compact('degree'));
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
            'degree'=>'required',
            'emphasis'=>'required'
        ]);

        $degree = Degree::find($id);
        $degree->degree = $request->get('degree');
        $degree->emphasis = $request->get('emphasis');
        $degree->degree_type = $request->get('degree_type');
        $degree->save();

        return redirect('/degrees')->with('success', 'Degree has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $degree = Degree::find($id);
        $degree->delete();

        return redirect('/degrees')->with('success', 'Degree has been deleted Successfully');
    }
}
