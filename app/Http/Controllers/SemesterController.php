<?php

namespace App\Http\Controllers;

use App\semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index(){
        $semesters = semester::all();
        return view('semester.index', compact('semesters'));
    }
    public function create(){
        return view('semester.create');
    }
    public function semesterSave(Request $request){
        $this ->validate($request,[
            'title' => 'required'
        ]);
        semester::create([
            'title'=> $request->title
        ]);
        return redirect()->back()->with('status','Semester Added Successfully');
    }
    public  function semesterEdit($id){
        $semester = semester::find($id);
        return view('semester.semesterEdit',compact('semester'));
    }
    public  function semesterUpdate(Request $request,$id){
        $this ->validate($request,[
            'title' => 'required'
        ]);
        $semester = semester::find($id);
        $semester->title = $request->title;
        $semester->save();

        return redirect()->back()->with('status','Semester Successfully Updated and Added to list');
    }
    public function  semesterDelete($id){
        $semester = semester::find($id);
        $semester->delete();
        return redirect()->back()->with('status','Semester Successfully Deleted');
    }
}
