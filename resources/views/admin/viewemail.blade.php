@extends('admin.app')
@section('content')
    <h2>
        Email
    </h2>
    <form method="POST" enctype="multipart/form-data" action="{{ url('sendemail', $data->id) }}">
        @csrf
        @method('POST')
        <div class="box-body">
            <div class="form-group">
                <label for="name">Greeting</label>
                <input type="text" name="greeting" class="form-control" id="name" placeholder="Enter doctors name"
                    required>
            </div>
            <div class="form-group">
                <label for="name">Body</label>
                <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Action text</label>
                <input type="text" name="actionText" class="form-control" id="name" placeholder="Enter doctors name"
                    required>
            </div>
            <div class="form-group">
                <label for="name">Action URL</label>
                <input type="text" name="actionUrl" class="form-control" id="name" placeholder="Enter doctors name"
                    required>
            </div>
            <div class="form-group">
                <label for="name">End part</label>
                <input type="text" name="endPart" class="form-control" id="name" placeholder="Enter doctors name"
                    required>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
