<?php

namespace App\Http\Controllers;

use App\Lecture;
use App\Student;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
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

        $lecture = Lecture::all();
        $student = Student::all();
        return view('project.index', compact(['student', 'lecture']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.createStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');

        $student->save();

        Session::flash('status', 'Uzregistruotas naujas moksleivis!');

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

        $lecture = Lecture::all();
        $student = Student::findOrFail($id);
        
        $gradeAverages = [];
        
        // einu per visas paskaitas ir skaiciuoju ju vidurki konkreciam studentui
        foreach($lecture as $item) {
            
            // Krepiames i modelio funkcija suskaiciuoti konkrecios paskaitos ir konkretaus studento vidurki
            $value = $student->gradeAverageByLecture($item->id);
            
            // pridedu reiksmes i masyva
            $gradeAverages[] = $value;
        }
        
        return view('project.studentInfo', compact(['student', 'lecture', 'gradeAverages']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('project.studentEdit', compact('student'));
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
        $student = Student::findOrFail($id);
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->save();

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
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
