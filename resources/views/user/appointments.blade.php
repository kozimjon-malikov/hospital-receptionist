<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h2 class="mt-4 alert alert-info " >My appointments</h2>
        <table class="table my-5 table-bordered">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Message</td>
                    <td>
                        actions
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($appoint as $appoint)
                <tr>
                    <td>
                        {{$loop->index+1}}
                    </td>
                    <td>
                        {{$appoint->name}}
                    </td>
                    <td>
                        {{$appoint->date}}
                    </td>
                    <td>
                        {{$appoint->status}}
                    </td>
                    <td>
                        {{$appoint->message}}
                    </td>
                    <td>
                        <a onclick="return confirm('are you sure?')" href="{{url('delete_appoint',$appoint->id)}}" class="btn btn-danger" data-confirm-delete="true">delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
