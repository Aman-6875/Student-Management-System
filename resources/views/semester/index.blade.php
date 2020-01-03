@extends('layouts.app')
@section('title','Semesters')
@section('content')

    Semester List||<a href="{{url('semester/create')}}">Add Semester</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($semesters as $semester)
            <tr>
                <th scope="row">{{$semester->id}}</th>
                <td>{{$semester->title}}</td>
                <td><a href="{{url('semester/semesterEdit',$semester->id)}}">Edit</a>||<form method="POST" id="deletesemester-{{$semester->id}}" action="{{ url('semester/semesterDelete',$semester->id) }}" style="display: none">@csrf {{method_field('DELETE')}}</form>
                    <a href="#" onclick="
                        if(confirm('Are you sure to dete this ??')){
                        event.preventDefault();
                        document.getElementById('deletesemester-{{$semester->id}}').submit();
                        }
                        else{
                        event.preventDefault();
                        }" >Delete</a>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
