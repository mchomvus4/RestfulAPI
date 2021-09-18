<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{

    public function Index(){
        $subjects = Subject::latest()->get();
        return response()->json($subjects);
    }

    public function StoreSubject(Request $request){
        $validateData = $request->validate([
            'class_id'=>'required',
            'subject_name' =>'required|unique:subjects|max:25',
            'subject_code'=>'required'
        ]);
        Subject::insert([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);
        return response('Subject Inserted Successfuly');
    }
    public function EditSubject($id){
        $editsubjects = Subject::findOrFail($id);
        return response()->json($editsubjects);

    }
    public function UpdateSubject(Request $request, $id){
           $validateData = $request->validate([
            'class_id'=>'required',
            'subject_name' =>'required|unique:subjects|max:25',
            'subject_code'=>'required'
        ]);
        Subject::findOrFail($id)->update([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);
        return response('Subject Updated Successfull');
    }

    public function DeleteSubject($id){
        Subject::findOrFail($id)->delete();
        
        return response('Subject Deleted Successfull');

    }
}
