<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\GradeRequest;
use App\Lecture;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GradeController extends Controller
{

    public function __construct()
    {

        $this->middleware('checkAdmin')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecture = Lecture::all();
        $student = Student::all();
        return view('project.createGrade', compact(['lecture', 'student']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradeRequest $request)
    {

        $grade = $request->validated();

        $grade = new Grade;
        $grade->grade = $request->input('grade');
        $grade->lecture_id = $request->input('lecture');
        $grade->student_id = $request->input('student');

        $grade->save();

        Session::flash('status', 'Mokinys ivertintas!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        return view('project.editGrade', compact('grade'));
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
        $grade = Grade::findOrFail($id);
        $grade->grade = $request->input('grade');
        $grade->save();

        return redirect()->route('students.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return redirect()->route('students.index');
    }
}