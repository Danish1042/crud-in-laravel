<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'grade' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->grade = $request->grade;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student Record Saved Successfully!');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'grade' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }
        $student = Student::where('id', $id)->first();
        // dd($student);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->grade = $request->grade;
        $student->update();
        return redirect()->route('student.index')->with('success', 'Student Record Updated Successfully!');
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student Record Deleted Successfully!');
    }
}
