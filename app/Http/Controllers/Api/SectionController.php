<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Carbon\Carbon;

class SectionController extends Controller
{
    public function Index(){
        $sections = Section::latest()->get();
        return response()->json($sections);
    }
    public function StoreSection(Request $request){
         $validateData = $request->validate([
            'class_id' =>'required',
            'section_name' =>'required|unique:sections|max:25'
        ]);
        Section::insert([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
            'created_at' => Carbon::now(),
        ]);
        return response('Section added successflly');
    }
    public function EditSection($id){
        $editsection = Section::findOrFail($id);
        return response()->json($editsection);
    }
    public function UpdateSection(Request $request, $id){
          $validateData = $request->validate([
            'class_id' =>'required',
            'section_name' =>'required|unique:sections|max:25'
        ]);
        Section::findOrFail($id)->update([
            'class_id'=>$request->class_id,
            'section_name'=>$request->section_name,
        ]);
        return response('Section Updated Successfully');
    }
    public function DeleteSection($id){
        Section::findOrFail($id)->delete();

        return response('Section Deleted Successfully');
    }
}
