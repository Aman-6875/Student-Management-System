@extends('layouts.app')
@section('title','Students')
@section('content')

    Student List||<a href="{{url('student/create')}}">Add Student</a>||<a href="{{route('studentSearch')}}">Search Student</a>
    <div class="form-group">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search Student Record" />
    </div>
    <table class="table" >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Roll</th>
            <th scope="col">Reg_id</th>
            <th scope="col">Department</th>
            <th scope="col">Semester</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody id="tbl">
{{--        @foreach($datas as $student)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{$student->id}}</th>--}}
{{--                <td>{{$student->name}}</td>--}}
{{--                <td>{{$student->phone}}</td>--}}
{{--                <td>{{$student->email}}</td>--}}
{{--                <td>{{$student->roll}}</td>--}}
{{--                <td>{{$student->reg_id}}</td>--}}
{{--                <td>{{$student->department->title}}</td>--}}
{{--                <td>{{$student->semester->title}}</td>--}}
{{--                <td><a href="{{url('student/studentEdit',$student->id)}}">Edit</a>||<form method="POST" id="deletestudent-{{$student->id}}" action="{{ url('student/studentDelete',$student->id) }}" style="display: none">@csrf {{method_field('DELETE')}}</form>--}}
{{--                    <a href="#" onclick="--}}
{{--                        if(confirm('Are you sure to dete this ??')){--}}
{{--                        event.preventDefault();--}}
{{--                        document.getElementById('deletestudent-{{$student->id}}').submit();--}}
{{--                        }--}}
{{--                        else{--}}
{{--                        event.preventDefault();--}}
{{--                        }" >Delete</a>--}}
{{--            </tr>--}}

{{--        @endforeach--}}

        </tbody>


    </table>

{{--    <script>--}}
{{--        $(document).ready(function(){--}}



{{--            function fetch_student_data(query = '')--}}
{{--            {--}}
{{--                $.ajax({--}}
{{--                    url:"/students/",--}}
{{--                    method:'GET',--}}
{{--                    data:{query:query},--}}
{{--                    dataType:'json',--}}
{{--                    success:function(data)--}}
{{--                    {--}}
{{--                        // console.log(data.table_data);--}}
{{--                        // $('tbody').html(data.table_data);--}}
{{--                        // $('#total_records').text(data.total_data);--}}
{{--                    }--}}
{{--                })--}}
{{--            }--}}

{{--            $('#search').on('keyup', function(){--}}
{{--                var query = $(this).val();--}}
{{--                console.log(query);--}}
{{--                fetch_student_data(query);--}}
{{--            });--}}
{{--        });--}}




{{--    </script>--}}
    <script>
        var ajax = new XMLHttpRequest();
        var method = 'GET';
        var url = '/student/studentSearch/tableLoad';
        var asynchronous = true;

        ajax.open(method,url,asynchronous);

        ajax.send();
        ajax.onreadystatechange = function () {
            if(this.readyState ==4 && this.status ==200){
                // alert(this.responseText);
                var data = JSON.parse(this.responseText);
                console.log(data);
                var html="";
                for(var a = 0; a<data.length; a++){
                    var id = data[a].id;
                    var Name = data[a].name;
                    var Phone = data[a].phone;
                    var Email = data[a].email;
                    var Roll = data[a].roll;
                    var Reg_id = data[a].reg_id;
                    // var Department = data[a].department->title;
                    // var id = data[a].id;
                    // var id = data[a].id;




                    html += '<tr>';
                      html += '<td>' + id + '</td>';
                    html += '<td>' + Name + '</td>';
                    html += '<td>' + Phone + '</td>';
                    html += '<td>' + Email + '</td>';
                    html += '<td>' + Roll + '</td>';
                    html += '<td>' + Reg_id + '</td>';
                    // html += '<td>' + Department + '</td>';
                    // html += '<td>' + id + '</td>';
                    // html += '<td>' + id + '</td>';
                    html +='</tr>';
                }
                document.getElementById("tbl").innerHTML = html;
            }
        }


    </script>
@endsection
