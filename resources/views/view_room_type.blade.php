<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Peter's Place || View Room Type</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>

    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet"/>

    <style>
        #form_body {
            margin-top: 3.5%;
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
<div class="model" id="form_body">
    <div class="model-dialog">
        <div class="model-content">
            <form method="post" class="form-control-static" id="viewform">
                {{ csrf_field() }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                            onclick="window.location='/room_type_management';">&times;
                    </button>

                    <h4 class="modal-title">View Room Type</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Room Type ID</label>
                        <input type="text" name="t_id" class="form-control" value="{{ $details->id }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Room Type Name</label>
                        <input type="text" name="t_name" class="form-control" value="{{ $details->name }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc" disabled>{{ $details->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Base Price (LKR)</label>
                        <input type="text" name="price" class="form-control" value="{{ $details->base_price }}"
                               disabled>
                    </div>

                    <div class="form-group">
                        <label>Total Room Count</label>
                        <input type="text" name="tot" class="form-control" value="{{ $details->total }}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Available Room Count</label>
                        <input type="text" name="av_cnt" class="form-control" value="{{ $details->available }}"
                               disabled>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"
                           onclick="window.location='/room_type_management';">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
