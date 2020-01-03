@extends('layouts.app')
@section('title','Departments')
@section('content')

  Department List||<a href="{{url('department/create')}}">Add Department</a>
  <table class="table">
      <thead>
      <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach($departments as $department)
        <tr>
            <th scope="row">{{$department->id}}</th>
            <td>{{$department->title}}</td>
            <td><a href="{{url('department/departmentEdit',$department->id)}}">Edit</a>||<form method="POST" id="deletedepartment-{{$department->id}}" action="{{ url('department/departmentDelete',$department->id) }}" style="display: none">@csrf {{method_field('DELETE')}}</form>
                <a href="#" onclick="
                         if(confirm('Are you sure to dete this ??')){
                             event.preventDefault();
                             document.getElementById('deletedepartment-{{$department->id}}').submit();
                         }
                         else{
                             event.preventDefault();
                    }" >Delete</a>
        </tr>
      @endforeach

      </tbody>
  </table>
@endsection
