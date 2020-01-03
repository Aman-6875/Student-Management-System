<?php

namespace App\Http\Controllers;

use App\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        $departments = department::all();
        return view('department.index', compact('departments'));
    }
    public function create(){
        return view('department.create');
    }
    public function departmentSave(Request $request){
          $this ->validate($request,[
              'title' => 'required'
              ]);
          department::create([
              'title'=> $request->title
          ]);
        return redirect()->back()->with('status','Department Added Successfully');
    }
    public  function departmentEdit($id){
        $department = department::find($id);
        return view('department.departmentEdit',compact('department'));
    }
    public  function departmentUpdate(Request $request,$id){
        $this ->validate($request,[
            'title' => 'required'
        ]);
        $department = department::find($id);
        $department->title = $request->title;
        $department->save();

        return redirect()->back()->with('status','Department Successfully Updated and Added to list');
    }
    public function  departmentDelete($id){
        $department = department::find($id);
        $department->delete();
        return redirect()->back()->with('status','Department Successfully Deleted');
    }
}
