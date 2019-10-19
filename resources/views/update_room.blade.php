<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Peter's Place || View Room</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>

    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet"/>

    <style>
        #form_body {
            margin-top: 4%;
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
            <form method="post" action="/edit_room" class="form-control-static" id="viewform">
                {{ csrf_field() }}

                <div class="model-header">
                    <button type="button" class="close" data-dismiss="model" aria-hidden="true"
                            onclick="window.location='/room_management';">&times;
                    </button>

                    <h4 class="model-title">Update Room</h4>
                </div>

                <div class="model-body">
                    <div class="form-group">
                        <label>Room No</label>
                        <input type="text" name="r_no" class="form-control" value="{{ $details->id }}" disabled>
                    </div>

                    <input type="hidden" name="id" class="form-control" value="{{ $details->id }}">

                    <div class="form-group">
                        <label>Room Type</label>

                        <!--
                        @if ($details->t_id == '1')
                            <select name="roomtype" class="form-control">
                                <option value="1" selected>Single Bedroom</option>
                                <option value="2">Double Bedroom</option>
                                <option value="3">Family Bedroom</option>
                            </select>
                        @endif

                        @if ($details->t_id == '2')
                            <select name="roomtype" class="form-control">
                                <option value="1">Single Bedroom</option>
                                <option value="2" selected>Double Bedroom</option>
                                <option value="3">Family Bedroom</option>
                            </select>
                        @endif

                        @if ($details->t_id == '3')
                            <select name="roomtype" class="form-control">
                                <option value="1">Single Bedroom</option>
                                <option value="2">Double Bedroom</option>
                                <option value="3" selected>Family Bedroom</option>
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

                    <div class="form-group">
                        <label>Floor</label>

                        @if ($details->floor == '1')
                            <select name="floor" class="form-control">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        @endif

                        @if ($details->floor == '2')
                            <select name="floor" class="form-control">
                                <option value="1">1</option>
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                            </select>
                        @endif

                        @if ($details->floor == '3')
                            <select name="floor" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3" selected>3</option>
                            </select>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc">{{ $details->description }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Availability</label>

                                <div class="radio">
                                    @if ($details->availability == '1')
                                        <label><input type="radio" name="available" value="1" checked>Available</label>

                                    @else
                                        <label><input type="radio" name="available" value="1">Available</label>

                                    @endif
                                </div>

                                <div class="radio">
                                    @if ($details->availability == '0')
                                        <label><input type="radio" name="available" value="0" checked>Not
                                            Available</label>

                                    @else
                                        <label><input type="radio" name="available" value="0">Not
                                            Available</label>

                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>

                                <div class="radio">
                                    @if ($details->status == '1')
                                        <label><input type="radio" name="status_btn" value="1" checked>Clean</label>

                                    @else
                                        <label><input type="radio" name="status_btn" value="1">Clean</label>

                                    @endif
                                </div>

                                <div class="radio">
                                    @if ($details->status == '2')
                                        <label><input type="radio" name="status_btn" value="2" checked>Not
                                            Clean</label>

                                    @else
                                        <label><input type="radio" name="status_btn" value="2">Not
                                            Clean</label>

                                    @endif
                                </div>

                                <div class="radio">
                                    @if ($details->status == '3')
                                        <label><input type="radio" name="status_btn" value="3" checked>Out of
                                            Service</label>

                                    @else
                                        <label><input type="radio" name="status_btn" value="3">Out of
                                            Service</label>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="model-footer">
                    <input type="button" class="btn btn-default" data-dismiss="model" value="Cancel"
                           onclick="window.location='/room_management';">

                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
