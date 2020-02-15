@extends('layouts.app')
@section('title','Students')
@section('content')
    Student List

    <form method="POST" action="{{route('saveAttendence')}}">
        @csrf
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>

                <th scope="col">Reg_id</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>

                @foreach($datas as $student)
                    <tr>
                        <th>
                            <div class="form-check">

                                    <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="{{$student->reg_id}}" name="attendence[]" aria-label="...">


                            </div>
                        </th>

        {{--                <th scope="row">{{$student->id}}</th>--}}

                        <td>{{$student->reg_id}}</td>
                        <td>{{$student->name}}</td>
                    </tr>
                @endforeach

        </tbody>

        </table>

        <button>Save</button>
    </form>



@endsection
