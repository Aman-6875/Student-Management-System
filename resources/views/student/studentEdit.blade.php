@extends('layouts.app')
@section('title','Update Student Info')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Student Info</div>
                    @if(session('status'))
                        <div class = "alert alert-success" role="alert" >{{session('status')}}</div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{url('student/studentUpdate',$student->id)}}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $student->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Phone No</label>

                                <div class="col-md-6">
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $student->phone }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="title" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $student->email}}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Roll</label>

                                <div class="col-md-6">
                                    <input id="roll" type="text" class="form-control @error('roll') is-invalid @enderror" name="roll" value="{{ $student->roll }}" required autocomplete="roll" autofocus>

                                    @error('roll')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Reg_id</label>

                                <div class="col-md-6">
                                    <input id="reg_id" type="text" class="form-control @error('reg_id') is-invalid @enderror" name="reg_id" value="{{ $student->reg_id}}" required readonly autocomplete="reg_id" autofocus>

                                    @error('reg_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Department</label>

                                <div class="col-md-6">
                                    <select class="form-control {{$errors->has('department_id') ? 'is valid' :  ''}}" name ='department_id' required>
                                        <option>Select One</option>
                                        @foreach($departments as $department)
                                            <option value = "{{$department->id}}" {{$student->department_id==$department->id ? 'selected' : ''}}>{{$department->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Semester</label>

                                <div class="col-md-6">
                                    <select class="form-control {{$errors->has('semester_id') ? 'is valid' :  ''}}" name ='semester_id' required>
                                        <option>Select One</option>
                                        @foreach($semesters as $semester)
                                            <option value = "{{$semester->id}}" {{$student->semester_id==$semester->id ? 'selected' : ''}}>{{$semester->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('semester_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Father Name</label>

                                <div class="col-md-6">
                                    <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ $student->father_name }}" required autocomplete="father_name" autofocus>

                                    @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Mother Name</label>

                                <div class="col-md-6">
                                    <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ $student->mother_name}}" required autocomplete="mother_name" autofocus>

                                    @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Present Address</label>

                                <div class="col-md-6">
                                    <input id="present_address" type="text" class="form-control @error('present_address') is-invalid @enderror" name="present_address" value="{{ $student->present_address }}" required autocomplete="present_address" autofocus>

                                    @error('present_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Parmanent Address</label>

                                <div class="col-md-6">
                                    <input id="permanent_address" type="text" class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address" value="{{ $student->permanent_address }}" required autocomplete="permanent_address" autofocus>

                                    @error('pr_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
