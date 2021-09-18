<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function Index(){
        $students = Student::latest()->get();
        return response()->json($students);
    }
    public function StoreStudent(Request $request){
        $validateData = $request->validate([
            'class_id' =>'required',
            'section_id' =>'required',
            'name' =>'required|unique:students|max:25',
            'address' =>'required',
            'phone' =>'required',
            'email' =>'required|unique:students|max:25',
            'password' =>'required',
            'photo' =>'required',
            'gender' =>'required',
        ]);

        Student::insert([
            'class_id'=>$request->class_id,
            'section_id'=>$request->section_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'photo'=>$request->photo,
            'gender'=>$request->gender,
            'created_at'=>Carbon::now(),
        ]);
        return response('Student Inserted successfuly');
    }
    public function EditStudent($id){
        $editstudent = Student::findOrFail($id);
        return response()->json($editstudent);
    }
    public function UpdateStudent(Request $request, $id){
          $validateData = $request->validate([
            'class_id' =>'required',
            'section_id' =>'required',
            'name' =>'required|unique:students|max:25',
            'address' =>'required',
            'phone' =>'required',
            'email' =>'required|unique:students|max:25',
            'password' =>'required',
            'photo' =>'required',
            'gender' =>'required',
        ]);
        Student::findOrFail($id)->update([
            'class_id'=>$request->class_id,
            'section_id'=>$request->section_id,
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'photo'=>$request->photo,
            'gender'=>$request->gender,
           
        ]);
        return response('Student Updated Successfully');
    }
    public function DeleteStudent($id){
        Student::findOrFail($id)->delete();
        return response('Student Deleted Successfully');
    }

}
