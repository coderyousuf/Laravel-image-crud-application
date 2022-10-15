<?php

namespace App\Http\Controllers;

use App\Http\Requests\newStudentRequestFormValidation;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{

    public function index()
    {
        $students=student::all();
        return view('students.index')->with('students',$students);

    }

    public function create()
    {
        return view('students.create');

    }

    public function store(newStudentRequestFormValidation $request)
    {
        $name = $request->name;
        $roll = $request->roll;
        $_token = $request->_token;
        $img = $request->file('img');
        $img_name= hexdec(uniqid()). '.' . $img->getClientOriginalExtension();
        $img_url='upload/'.$img_name;
        $img->move(public_path('upload'),$img_name);
       Student::insert([
            'name'=>$name,
            'roll'=>$roll,
            '_token'=>$_token,
            'img_url'=>$img_url,
       ]);
        Session::flash('added','Student Added Successfully');
        return redirect('students');
    }

    public function show($id)
    {
        $student=student::find($id);
        return view('students.show')->with('students',$student);
    }

    public function edit($id)
    {
        $students=student::find($id);
        return view('students.edit')->with('students',$students);

    }

    public function update(newStudentRequestFormValidation $request, $id)

    {
        $student=student::find($id);
        $image_path1=public_path().'/'.$student->img_url;
        $name = $request->name;
        $roll = $request->roll;
        $_token = $request->_token;
        $img = $request->file('img');
        $img_name= hexdec(uniqid()). '.' . $img->getClientOriginalExtension();
        $img_url='upload/'.$img_name;
        $img->move(public_path('upload'),$img_name);
        $input=([
            'name'=>$name,
            'roll'=>$roll,
            'img_url'=>$img_url,
            '_token'=>$_token,

       ]);
        $student->update($input);
        Session::flash('updated','Student updated Successfully');
        return redirect('students');
        $student=student::find($id);


        if(student::exists($image_path1)) {
            unlink($image_path1);
           }

    }

    public function destroy($id)
    {
        $student=student::find($id);
        $image_path=public_path().'/'.$student->img_url;
        if(student::exists($image_path)) {
             unlink($image_path);
            }
        student::destroy($id);
        Session::flash('flash_message','Student deleted!');
        return redirect('students');
    }
}
