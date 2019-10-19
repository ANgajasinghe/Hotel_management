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
            margin-top: 6.5%;
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
<div class="model" id="model1">
    <div class="model-dialog" id="model1-dialog">
        <div class="model-content">
            <form method="post" class="form-control-static" id="resform">
                {{ csrf_field() }}

                <div class="model-header" id="header">
                    <button type="button" class="close" data-dismiss="model" aria-hidden="true"
                            onclick="window.location='/room_reservation_management';">&times;
                    </button>

                    <h4 class="model-title" id="title">View Room Reservation</h4>
                </div>

                <div class="model-body" id="body">
                    <div class="col-md-6" id="col1">
                        <br/>

                        <div class="form-group">
                            <label>Reservation ID</label>
                            <input type="text" name="rid" class="form-control" value="{{ $details->id }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Customer ID</label>
                            <input type="text" name="cid" class="form-control" value="{{ $details->cid }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="form-control" value="{{ $cust_details->fname }}"
                                   disabled>
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="form-control" value="{{ $cust_details->lname }}"
                                   disabled>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ $cust_details->phone }}"
                                   disabled>
                        </div>
                    </div>

                    <div class="col-md-6" id="col2">
                        <div class="form-group" id="rt">
                            <label>Room Type</label>

                            <select name="rtype" class="form-control" disabled>
                                <option value="{{ $details->t_id }}" selected>{{ $rt_details->name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Room No</label>
                            <input type="text" name="r_no" class="form-control" value="{{ $details->room_no }}"
                                   disabled>
                        </div>

                        <div class="form-group">
                            <label>Reserved Date Time</label>
                            <input name="cin" type="text" class="form-control"
                                   value="{{ $details->resereved_date_time }}" disabled>
                        </div>

                        <div class="form-group">
                            <br/>

                            <label>Check In</label>
                            <input name="cin" type="date" class="form-control" value="{{ $details->check_in }}"
                                   disabled>
                        </div>

                        <div class="form-group">
                            <br/>

                            <label>Check Out</label>
                            <input name="cout" type="date" class="form-control" value="{{ $details->check_out }}"
                                   disabled>
                        </div>
                    </div>
                </div>

                <div class="model-footer" id="cancelbtn">
                    <input type="button" class="btn btn-default" data-dismiss="model" value="Cancel"
                           onclick="window.location='/room_reservation_management';">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
