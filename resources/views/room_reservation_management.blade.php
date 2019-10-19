<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>Peter's Place || Room Reservation Management</title>

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
                    <li><a href="{{ url('/room_management') }}">Rooms</a></li>
                    <li><a href="{{ url('/room_type_management') }}">Room Types</a></li>
                    <li class="active"><a href="#">Room Reservations</a></li>
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
                <div class="col-sm-6">
                    <h2 class="room_mngmnt">
                        <a href="{{ url('/room_reservation_management') }}">Room <b>Reservations</b></a>
                    </h2>
                </div>

                <div class="col-sm-3">
                    <div class="search-box">
                        <a href="#searchReservationModal" class="search" data-toggle="modal">
                            <img src="{{ asset('images/search_bar.png') }}" alt="search_icon">
                        </a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <a href="#addReservationModal" class="btn btn-success" data-toggle="modal">
                        <i class="material-icons">&#xE147;</i>
                        <span>Add New Reservation</span>
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>R_ID</th>
                <th>C_ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone No</th>
                <th>Room Type</th>
                <th>Room No</th>
                <th>Reserved_Date_Time</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->cid }}</td>

                        @foreach ($dat as $customer_data)
                            @if ($customer_data->id == $reservation->cid)
                                <td>{{ $customer_data->fname }}</td>
                                <td>{{ $customer_data->lname }}</td>
                                <td>{{ $customer_data->phone }}</td>
                            @endif
                        @endforeach

                        @foreach ($rt as $rtype)
                            @if ($rtype->id == $reservation->t_id)
                                <td>{{ $rtype->name }}</td>
                            @endif
                        @endforeach

                        <td>{{ $reservation->room_no }}</td>
                        <td>{{ $reservation->resereved_date_time }}</td>
                        <td>{{ $reservation->check_in }}</td>
                        <td>{{ $reservation->check_out }}</td>

                        <td>
                            <a href="/view_reserves/{{ $reservation->id }}" class="view">
                                <i class="material-icons" data-toggle="tooltip" title="View">&#xE417;</i>
                            </a>

                            <a href="/update_room_reservation/{{ $reservation->id }}" class="edit">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>

                            <a class="delete" role="button" data-toggle="modal" data-target="#deleteReservationModal"
                               data-id="{{ $reservation->id }}" data-url="{{ url('reserves', $reservation->id) }}">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (!isset($reservation))
            <div class="alert alert-info" role="alert">
                No Records!
            </div>
        @endif

        <div class="clearfix"></div>
    </div>
</div>

<!-- Add Modal HTML -->
<div id="addReservationModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/add_room_reservation">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">Add New Reservation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" value="{{ old('fname') }}">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="{{ old('lname') }}">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>

                        <!--
                        <select name="rtype" class="form-control">
                            <option value="1" @if (old('rtype') == '1') selected @endif>Single Bedroom</option>
                            <option value="2" @if (old('rtype') == '2') selected @endif>Double Bedroom</option>
                            <option value="3" @if (old('rtype') == '3') selected @endif>Family Bedroom</option>
                        </select>
                        -->
                        
                        <select name="rtype" class="form-control">
                            @foreach ($rt as $item)
                                @if (isset($item))
                                    <option value="{{ $item->id }}" @if (old('rtype') == $item->id) selected
                                        @endif>{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Room No</label>
                        <input type="text" name="r_no" class="form-control" value="{{ old('r_no') }}">
                    </div>

                    <div class="form-group" id="clbl">

                        <label>Check In</label>
                        <input name="cin" type="date" class="form-control" value="{{ old('cin') }}">
                    </div>

                    <div class="form-group" id="clbl">

                        <label>Check Out</label>
                        <input name="cout" type="date" class="form-control" value="{{ old('cout') }}">
                    </div>
                </div>

                <div class="modal-footer" id="footres">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Search Modal HTML -->
<div id="searchReservationModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/search_room_reservation">
                {{ csrf_field() }}

                <div class="modal-header">
                    <h4 class="modal-title">Search Reservation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Reservation ID</label>
                        <input type="text" name="id" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Customer ID</label>
                        <input type="text" name="cid" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>

                        <!--
                        <select name="rtype" class="form-control">
                            <option value="1">Single Bedroom</option>
                            <option value="2">Double Bedroom</option>
                            <option value="3">Family Bedroom</option>
                        </select>
                        -->

                        <select name="rtype" class="form-control">
                            <option></option>

                            @foreach ($rt as $item)
                                @if (isset($item))
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Room No</label>
                        <input type="text" name="r_no" class="form-control">
                    </div>

                    <div class="form-group">
                        <br/>
                        <label>Check In</label>
                        <input name="cin" type="date" class="form-control">
                    </div>

                    <div class="form-group">
                        <br/>
                        <label>Check Out</label>
                        <input name="cout" type="date" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Search">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteReservationModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="" id="deleteForm">
                {{ csrf_field() }}

                @if (isset($reservation))
                    <input type="hidden" value="{{ $reservation->id }}" name="id">
                @endif

                <div class="modal-header">
                    <h4 class="modal-title">Delete Reservation</h4>
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
