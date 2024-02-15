@extends('admin.app')
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add doctors</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" enctype="multipart/form-data" action="{{ url('upload_doctor') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter doctors name"
                        required>
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone"
                        placeholder="Enter doctors phone" required>
                </div>
                <div class="form-group">
                    <label for="select">Choose doctors Speciality</label>
                    <select class="form-control" name="speciality">
                        <option>---select---</option>
                        <option>Nose</option>
                        <option>Eye</option>
                        <option>Stomach</option>
                        <option>Hair</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Room number:</label>
                    <input type="number" name="room_no" class="form-control" id="room"
                        placeholder="Enter room number:" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Doctor img</label>
                    <input name="rasm" type="file" id="exampleInputFile">
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
