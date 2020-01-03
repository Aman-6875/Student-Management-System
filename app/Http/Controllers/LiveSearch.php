<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use mysql_xdevapi\Table;

class LiveSearch extends Controller
{
  public function action(Request $request){
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
                   ->orWhere('father_name','like','%'.$query.'%')
                   ->orWhere('mother_name','like','%'.$query.'%')
                   ->orWhere('present_address','like','%'.$query.'%')
                   ->orWhere('permanent_address','like','%'.$query.'%')
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
