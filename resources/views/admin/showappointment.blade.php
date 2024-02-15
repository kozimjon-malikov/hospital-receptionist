@extends('admin.app')
@section('content')
    <h2 style="margin-left: 10px">Appointments</h2>
    <table class="table table-bordered">
        <thead>
            <th>#</th>
            <th>Customer name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Doctor Name</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Status</th>
            <th>Approved</th>
            <th>Canceled</th>
            <th>Send Email</th>
        </thead>
        <tbody>
            @foreach ($appoints as $appoint)
            <tr>
                <td>
                    {{$appoint->id}}
                </td>
                <td>
                    {{$appoint->name}}
                </td>
                <td>
                    {{$appoint->email}}
                </td>
                <td>
                    {{$appoint->date}}
                </td>
                <td>
                    {{$appoint->doctor}}
                </td>
                <td>
                    {{$appoint->number}}
                </td>
                <td>
                    {{$appoint->message}}
                </td>
                <td>
                    {{strip_tags($appoint->status)}}
                </td>
                <td>
                    <a href="{{url('approved',$appoint->id)}}" class="btn btn-success">Approved</a>
                </td>
                <td>
                    <a href="{{url('cancel_appointment',$appoint->id)}}" class="btn btn-danger">Canceled</a>
                </td>
                <td>
                    <a href="{{url('viewemail',$appoint->id)}}" class="btn btn-primary">Send email</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
