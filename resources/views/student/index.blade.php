@extends('layouts.app')
@section('title','Students')
@section('content')

    Student List||<a href="{{url('student/create')}}">Add Student</a>||<a href="{{route('studentSearch')}}">Search Student</a>
    <table class="table">
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
        <tbody>
        @foreach($datas as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->roll}}</td>
                <td>{{$student->reg_id}}</td>
                <td>{{$student->department->title}}</td>
                <td>{{$student->semester->title}}</td>
                <td><a href="{{url('student/studentEdit',$student->id)}}">Edit</a>||<form method="POST" id="deletestudent-{{$student->id}}" action="{{ url('student/studentDelete',$student->id) }}" style="display: none">@csrf {{method_field('DELETE')}}</form>
                    <a href="#" onclick="
                        if(confirm('Are you sure to dete this ??')){
                        event.preventDefault();
                        document.getElementById('deletestudent-{{$student->id}}').submit();
                        }
                        else{
                        event.preventDefault();
                        }" >Delete</a>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
