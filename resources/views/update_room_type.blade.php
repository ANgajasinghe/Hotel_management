<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Peter's Place || View Room Reservation</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>

    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet"/>

    <style>
        #form_body {
            margin-top: 6%;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body id="viewbody">
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        </ul>
            @endforeach
    </div>
@endif

<div class="model" id="form_body">
    <div class="model-dialog">
        <div class="model-content">
            <form method="post" action="/edit_room_type" class="form-control-static" id="updateroomform">
                {{ csrf_field() }}

                <div class="model-header">
                    <button type="button" class="close" data-dismiss="model" aria-hidden="true"
                            onclick="window.location='/room_type_management';">&times;
                    </button>

                    <h4 class="model-title">Update Room Type</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Room Type ID</label>
                        <input type="text" name="t_id" class="form-control" value="{{ $details->id }}" disabled>
                    </div>

                    <input type="hidden" name="id" class="form-control" value="{{ $details->id }}">

                    <div class="form-group">
                        <label>Room Type Name</label>
                        <input type="text" name="t_name" class="form-control" value="{{ $details->name }}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc">{{ $details->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Base Price (LKR)</label>
                        <input type="text" name="price" class="form-control" value="{{ $details->base_price }}">
                    </div>

                    <div class="model-footer">
                        <input type="button" class="btn btn-default" data-dismiss="model" value="Cancel"
                               onclick="window.location='/room_type_management';">

                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
