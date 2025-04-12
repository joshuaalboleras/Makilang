<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index()
    {
        $student = Student::latest()->paginate(5);
        return view('student.index',compact('student'))->with('i', (request()->input('page', 1) - 1) * 5);        
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_number' => 'required',
            'year' => 'required',
            'section' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('student.index')->with('success','Product created successfully.');
    }

    public function show(Student $student)
    {
        return view('student.show',compact('student'));
    }

    public function edit(Student $student)
    {
        // return view('student.edit',compact('product'));
        return view('student.edit');
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $student->update($request->all());
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();
        return redirect()->route('student.index')->with('success','Product deleted successfully');
    }
}
