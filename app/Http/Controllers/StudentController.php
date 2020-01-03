<?php

namespace App\Http\Controllers;

use App\department;
use App\semester;
use App\student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $departments = department::all();
        $semesters = semester::all();
        $datas = student::all();
        return view('student.index', compact('datas','departments','semesters'));
    }
    public function create(){
        $departments = department::all();
        $semesters = semester::all();
        return view('student.create',compact('departments','semesters'));
    }
    public function studentSave(Request $request){


        $this ->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'roll' => 'required',
            'reg_id' => 'required',
            'department_id' => 'required',
            'semester_id' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'p_address' => 'required',
            'pr_address' => 'required'
        ]);


        student::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'roll'=> $request->roll,
            'reg_id'=> $request->reg_id,
            'department_id'=> $request->department_id,
            'semester_id'=> $request->semester_id,
            'father_name'=> $request->fname,
            'mother_name'=> $request->mname,
            'present_address'=> $request->p_address,
            'permanent_address'=> $request->pr_address,


        ]);
        return redirect()->back()->with('status','Student Added Successfully');
    }
    public  function studentEdit($id){
        $student = student::find($id);
        $departments = department::all();
        $semesters = semester::all();
        return view('student.studentEdit',compact('student','departments','semesters'));
    }
    public  function studentUpdate(Request $request,$id){
        $this ->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'roll' => 'required',
            'reg_id' => 'required',
            'department_id' => 'required',
            'semester_id' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required'
        ]);
        $student = student::find($id);
        $student->update($request->all());
        $student->save();

        return redirect()->back()->with('status','Student Successfully Updated and Added to list');
    }
    public function  studentDelete($id){
        $student = student::find($id);
        $student->delete();
        return redirect()->back()->with('status','Semester Successfully Deleted');
    }
    public function studentSearch(){
        return view('student.studentSearch');
    }
    public function action(Request $request){
        $departments = department::all();
        $semesters = semester::all();
        if ($request->ajax()){
            $query = $request->get('query');
            if ($query!='')
            {
                $data = DB::table('students')
                    ->where('id','like','%'.$query.'%')
                    ->orWhere('name','like','%'.$query.'%')
                    ->orWhere('phone','like','%'.$query.'%')
                    ->orWhere('email','like','%'.$query.'%')
                    ->orWhere('roll','like','%'.$query.'%')
                    ->orWhere('reg_id','like','%'.$query.'%')
                    ->orWhere('department_id','like','%'.$query.'%')
                    ->orWhere('semester_id','like','%'.$query.'%')
                    ->orderby('id','desc')
                    ->get();

            }
            else{
                $data = DB::table('students')
                    ->orderby('id','desc')
                    ->get();

            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach ($data as $row)
                {
                    $output = '
                   <tr>
                   <td>'.$row->name.'</td>
                    <td>'.$row->phone.'</td>
                     <td>'.$row->email.'</td>
                      <td>'.$row->roll.'</td>
                       <td>'.$row->reg_id.'</td>
                        <td>'.$row->department_id.'</td>
                         <td>'.$row->semester_id.'</td>
                          <td>'.$row->father_name.'</td>
                           <td>'.$row->mother_name.'</td>
                            <td>'.$row->present_address.'</td>
                            <td>'.$row->permanent_address.'</td>
                   </tr>
                   ';
                }
            }
            else{
                $output = '
             <tr>
             <td align ="center" collspan=  "5">No Data Found</td>
             </tr>
             ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }
}

