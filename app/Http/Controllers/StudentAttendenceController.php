<?php

namespace App\Http\Controllers;

use App\student;
use App\studentAttendence;
use Illuminate\Http\Request;

class StudentAttendenceController extends Controller
{


        public function studentAttendence()
        {
            $datas = student::all();
            return view('Attendence.studentAttendence', compact('datas'));
        }


        public function saveAttendence(Request $request)
        {
                      $data = new studentAttendence;
                      $data->reg_id= implode(',',$request->attendence);
                      $data->save();
            return "data saved";
        }

}
