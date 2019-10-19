<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Peter's Place || Room Management</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"/>

    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet"/>

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

<body>
<div class="container">
    <div class="navigation">
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

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/home') }}">Admin Home</a>
                </div>

                <ul class="nav navbar-nav" id="nav-topics">
                    <li class="active"><a href="#">Rooms</a></li>
                    <li><a href="{{ url('/room_type_management') }}">Room Types</a></li>
                    <li><a href="{{ url('/room_reservation_management') }}">Room Reservations</a></li>
                    <li><a href="{{ url('/room_reports') }}">Reports</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right" id="nav-sign">
                    <!--
                    <li><a href="{{ url('/profile') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                    -->

                    <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2 class="room_mngmnt">
                        <a href="{{ url('/room_management') }}">Room <b>Management</b></a>
                    </h2>
                </div>

                <div class="col-sm-2">
                    <a href="{{url('/dynamic_pdf_rooms/Room List')}}" target="_blank" class="btn btn-danger"
                       id="pdf_btn">Room List PDF</a>
                </div>

                <div class="col-sm-3">
                    <div class="search-box">
                        <a href="#searchRoomModal" class="search" data-toggle="modal">
                            <img src="{{ asset('images/search_bar.png') }}" alt="search_icon">
                        </a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <a href="#addRoomModal" class="btn btn-success" data-toggle="modal">
                        <i class="material-icons">&#xE147;</i>
                        <span>Add New Room</span>
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Room No</th>
                <th>Floor</th>
                <th>Type</th>
                <th>Availability</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->floor }}</td>

                        @foreach ($dat as $d)
                            @if ($d->id == $room->t_id)
                                <td>{{ $d->name }}</td>
                            @endif
                        @endforeach

                        <td>
                            @if ($room->availability)
                                <label class="green">Available</label>

                            @else
                                <label class="red">Not Available</label>

                            @endif
                        </td>

                        <td>
                            @if ($room->status == 1)
                                <label class="green">Clean</label>
                            @endif

                            @if ($room->status == 2)
                                <label class="red">Not Clean</label>
                            @endif

                            @if ($room->status == 3)
                                <label>Out of Service</label>
                            @endif
                        </td>

                        <td>
                            <a href="/view_room/{{ $room->id }}" class="view">
                                <i class="material-icons" data-toggle="tooltip" title="View">&#xE417;</i>
                            </a>

                            <a href="/update_room/{{ $room->id }}" class="edit">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>

                            <a class="delete" role="button" data-toggle="modal" data-target="#deleteRoomModal"
                               data-id="{{ $room->id }}" data-url="{{ url('rooms', $room->id) }}">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (!isset($room))
            <div class="alert alert-info" role="alert">
                No Records!
            </div>
        @endif

        <div class="clearfix"></div>
    </div>
</div>

<!-- Add Modal HTML -->
<div id="addRoomModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/add_room">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">Add New Room</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Room No</label>
                        <input type="text" name="r_no" class="form-control" value="{{ old('r_no') }}">
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>

                        <!--
                        <select name="roomtype" class="form-control">
                            <option value="1" @if (old('roomtype') == '1') selected @endif>Single Bedroom</option>
                            <option value="2" @if (old('roomtype') == '2') selected @endif>Double Bedroom</option>
                            <option value="3" @if (old('roomtype') == '3') selected @endif>Family Bedroom</option>
                        </select>
                        -->

                        <select name="roomtype" class="form-control">
                            @foreach ($dat as $item)
                                @if (isset($item))
                                    <option value="{{ $item->id }}" @if (old('roomtype') == $item->id) selected
                                        @endif>{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Floor</label>

                        <select name="floor" class="form-control">
                            <option value="1" @if (old('floor') == '1') selected @endif>1</option>
                            <option value="2" @if (old('floor') == '2') selected @endif>2</option>
                            <option value="3" @if (old('floor') == '3') selected @endif>3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="desc">{{ old('desc') }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Search Modal HTML -->
<div id="searchRoomModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/search_room">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">Search Room</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Room No</label>
                        <input type="text" name="r_no" class="form-control" value="{{ old('r_no') }}">
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>

                        <!--
                        <select name="roomtype" class="form-control">
                            <option></option>
                            <option value="1">Single Bedroom</option>
                            <option value="2">Double Bedroom</option>
                            <option value="3">Family Bedroom</option>
                        </select>
                        -->

                        <select name="roomtype" class="form-control">
                            <option></option>

                            @foreach ($dat as $item)
                                @if (isset($item))
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Floor</label>

                        <select name="floor" class="form-control">
                            <option></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="row2">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Availability</label>

                                <div class="radio">
                                    <label><input type="radio" name="available" value="1">Available</label>
                                </div>

                                <div class="radio">
                                    <label><input type="radio" name="available" value="0">Not Available</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>

                                <div class="radio">
                                    <label><input type="radio" name="status_btn" value="1">Clean</label>
                                </div>

                                <div class="radio">
                                    <label><input type="radio" name="status_btn" value="2">Not Clean</label>
                                </div>

                                <div class="radio">
                                    <label><input type="radio" name="status_btn" value="3">Out of Service</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Search">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteRoomModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="" id="deleteForm">
                {{ csrf_field() }}

                @if (isset($room))
                    <input type="hidden" value="{{ $room->id }}" name="id">
                @endif

                <div class="modal-header">
                    <h4 class="modal-title">Delete Room</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to delete this Record?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // For A Delete Record Popup
        $('.delete').click(function () {
            var id = $(this).attr('data-id');
            var url = $(this).attr('data-url');

            $("#deleteForm", 'input').val(id);
            $("#deleteForm").attr("action", url);
        });
    });
</script>
</body>

</html>
