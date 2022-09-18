<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Student;
use App\Imports\StudentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.students.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programmes = DB::select('select * from programmes');
        $departments = DB::select('select * from departments');
        return view('pages.students.new', ['departments' => $departments, 'programmes' => $programmes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileImport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'excel' => 'required|mimes:csv',
        ]);
        //Alert the user of the input error
        if ($validator->fails()) {
            return back()
                ->with('toast_error', $validator->messages()->all()[0]);
        } else {
            Excel::import(new StudentsImport(), $request->file('excel')->store('temp'));
            return back()->withSuccess('New Students Created Successfully!');
        }
    }
    public function store(Request $request)
    {
        //Validate the form input fields
        $validator = Validator::make($request->all(), [
            'adm_no' => 'required|unique:students',
            'first_name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'joining_year' => 'required',
            'completion_year' => 'required',
            'dept' => 'required',
            'programme' => 'required',
        ]);

        //Alert the user of the input error
        if ($validator->fails()) {
            return back()
                ->with('toast_error', $validator->messages()->all()[0])
                ->withInput();
        } else {
            //Save the input data to database
            $student = new Student();
            $student->adm_no = $request->adm_no;
            $student->first_name = $request->first_name;
            $student->surname = $request->surname;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->joining_year = $request->joining_year;
            $student->completion_year = $request->completion_year;
            $student->dept_id = $request->dept;
            $student->programme_id = $request->programme;

            $student->save();

            return back()->withSuccess('New Student Created Successfully!');
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
