<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rule;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rules = Rule::all();

        return view('Rules.index', compact('rules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Rules.create');
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
            'degree_id'=>'required',
            'course_name'=>'required',
            'fall'=>'required',
            'spring'=>'required'
        ]);
        $Rule = new Rule([
            'degree_id' => $request->get('degree_id'),
            'course_name'=>$request->get('course_name'),
            'fall' => $request->get('fall'),
            'spring' => $request->get('spring')
        ]);
        $Rule->save();
        return redirect('/rules')->with('success', 'Rule has been added');
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
        $rule = Rule::find($id);

        return view('rules.edit', compact('rule'));
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
            'degree_id'=>'required',
            'course_name'=>'required',
            'fall'=>'required',
            'spring'=>'required'
        ]);

        $rule = Rule::find($id);
        $rule->degree_id = $request->get('degree_id');
        $rule->course_name = $request->get('course_name');
        $rule->fall = $request->get('fall');
        $rule->Spring = $request->get('spring');
        $rule->save();

        return redirect('/rules')->with('success', 'Rule has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rule = Rule::find($id);
        $rule->delete();

        return redirect('/rules')->with('success', 'Rule has been deleted Successfully');
    }

    public function search()
    {
        $rules = \DB::table('rules')->where('degree_id', '=', $_POST['degree_id'])->get();

        return view('Rules.search', compact('rules'));
    }

}
