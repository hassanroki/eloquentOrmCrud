<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentFormRequest;
use App\Models\Student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // Data Read
        // dd($data);

        // Option 01
        $data['students']   = Student::all();
        return view('crud.students', $data);

        // // Option-02
        //    $students     = Student::all();
        //    return view('crud.students',['students'=>$students]);

        // // Option-03
        //    $students     = Student::all();
        //    return view('crud.students',compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Create
        return view('crud.studentsCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentFormRequest $request)
    {
        //     // Form Validation Used Controller Option 01
        //     $validated = $request->validate([
        //         'name'       => 'required | max:255',
        //         'email'      => 'required',
        //     ], [
        //     'name.required'  => 'Name must be filled up',
        //     'email.required' => 'Description must be filled up.'
        // ]);

        // Form Validation Used Request Option 02
        $request->validated();

        // Data Insert
        // dd($request->all());

        // // Data Request Option 01
        // $data['name']   = $request->name;
        // $data['email']  = $request->email;
        //  Student::create($data);
        // return redirect()->route('students.index');

        // Data Request Option 02
        $data = [
            'name'      =>  $request->name,
            'email'     =>  $request->email
        ];
        Student::create($data);

        // Flash Session Confirmation Msg Option-01
        // $request->session()->flash('success', 'Category Create Successfully!');
        // return redirect()->route('students.index');

        // // Flash Session Confirmation Msg Option-02
        // session()->flash('success', "Create Successfully!");
        // return redirect()->route('students.index');

        // // Flash Session Confirmation Msg Option-03
        // Session::flash('success', "Create Successfully!");
        // return redirect()->route('students.index');

        // Helper Function with used Confirmation Msg Option-04
        return redirect()->route('students.index')->with('success', "Create Successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // // Data View Option 01
        // $data['student']       = $student;
        // return view('crud.studentsShow', $data);

        // // Option 02
        // return view('crud.studentsShow', ['student'=>$student]);

        // Option 03
        return view('crud.studentsShow', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // // Edit Data Option 01
        // $data['student']   = $student;
        // return view('crud.studentsEdit', $data);

        // // Option 02
        //  return view('crud.studentsEdit', ['student' => $student]);

        // Option 03
        return view('crud.studentsEdit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // Update Data
        //dd($request->all());

        //   Option-01
        $data['name'] = $request->name;
        $student->update($data);
        return redirect()->route('students.index')->with('success', "Update Successfully!");

        // // Option 02
        // student::where('id', $student->id)->update([
        //     'name'          => $request->name,
        // ]);
        // return redirect()->route('students.index');

        // // Option 03
        // $student->update($request->all());
        // return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Delete Data
        $student->delete();
        return redirect()->route('students.index')->with('success', "Deleted!");
    }
}
