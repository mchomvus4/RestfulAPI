<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function Index(){
        $studentsclass = StudentClass::latest()->get();
        return response()->json($studentsclass);
    }
    public function Store(Request $request){
        $validateData = $request->validate([
            'class_name' =>'required|unique:student_classes|max:25'
        ]);
        StudentClass::insert([
            'class_name' => $request->class_name,
        ]);
        return response('Student Classs Inserted Successfuly');
    }
    public function Edit($id){
        $geteditData = StudentClass::findOrFail($id);
        return response()->json($geteditData);
    }
    public function Update(Request $request, $id){
         $validateData = $request->validate([
            'class_name' =>'required|unique:student_classes|max:25'
        ]);
        StudentClass::findOrFail($id)->update([
            'class_name' => $request->class_name,
        ]);
        return response('Student Class Updated Successfuly');
    }
    public function Delete($id){
        StudentClass::findOrFail($id)->delete();
         return response('Student Class Deleted Successfuly');
    }
   
}
