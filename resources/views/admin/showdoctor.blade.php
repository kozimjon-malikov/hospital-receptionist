@extends('admin.app')

@section('content')
    <h2>All doctors</h2>
    <table class="table table bordered">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Room_number</th>
            <th>Image</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>
                        {{ $doctor->id }}
                    </td>
                    <td>
                        {{ $doctor->name }}
                    </td>
                    <td>
                        {{ $doctor->phone }}
                    </td>

                    <td>
                        {{ $doctor->room_no }}
                    </td>
                    <td>
                        <img src="{{ asset('doctorsimage/' . $doctor->rasm) }}" alt="rasm" width="100px">
                    </td>
                    <td>
                        <a href="{{url('update_doctor',$doctor->id)}}" class="btn btn-primary">Update</a>
                        <a onclick="return confirm('are you sure?')" href="{{url('delete_doctor',$doctor->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
