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
        #model1 {
            margin-top: 10%;
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

<div class="model" id="model1">
    <div class="model-dialog" id="model1-dialog">
        <div class="model-content">
            <form method="post" action="/edit_room_reservation" class="form-control-static" id="resform">
                {{ csrf_field() }}

                <div class="model-header">
                    <button type="button" class="close" data-dismiss="model" aria-hidden="true"
                            onclick="window.location='/room_reservation_management';">&times;
                    </button>

                    <h4 class="model-title" id="title2">Update Room Reservation</h4>
                </div>

                <div class="model-body" id="body">
                    <div class="col-md-6" id="col1">
                        <input type="hidden" name="id" value="{{ $details->id }}"/>

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="{{ $cust_details->fname }}">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="{{ $cust_details->lname }}">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ $cust_details->phone }}">
                        </div>

                        <div class="form-group">
                            <label>Room Type</label>

                            <!--
                            @if ($details->t_id == '1')
                                <select name="roomtype" class="form-control">
                                    <option value="1" selected>Single</option>
                                    <option value="2">Double</option>
                                    <option value="3">Family</option>
                                </select>
                            @endif

                            @if ($details->t_id == '2')
                                <select name="roomtype" class="form-control">
                                    <option value="1">Single</option>
                                    <option value="2" selected>Double</option>
                                    <option value="3">Family</option>
                                </select>
                            @endif

                            @if ($details->t_id == '3')
                                <select name="roomtype" class="form-control">
                                    <option value="1">Single</option>
                                    <option value="2">Double</option>
                                    <option value="3" selected>Family</option>
                                </select>
                            @endif
                            -->

                            <select name="roomtype" class="form-control">
                                @foreach ($rt_details as $item)
                                    @if (isset($item))
                                        <option value="{{ $item->id }}" @if ($details->t_id == $item->id) selected
                                            @endif>{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6" id="col2">
                        <br/>
                        <br/>
                        <br/>

                        <div class="form-group">
                            <label>Room No</label>
                            <input type="text" name="r_no" class="form-control" value="{{ $details->room_no }}">
                        </div>

                        <div class="form-group">
                            <br/>

                            <label>Check In</label>
                            <input name="cin" type="date" class="form-control" value="{{ $details->check_in }}">
                        </div>

                        <div class="form-group">
                            <br/>

                            <label>Check Out</label>
                            <input name="cout" type="date" class="form-control" value="{{ $details->check_out }}">
                        </div>
                    </div>
                </div>

                <div class="model-footer" id="foot">

                    <input type="button" class="btn btn-default" data-dismiss="model" value="Cancel"
                           onclick="window.location='/room_reservation_management';">

                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
