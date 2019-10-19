<!doctype html>
<html>
<head><title>PetersPlace</title>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all' />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family:  sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {

            padding: 8px 18px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 16px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
    </style>
</head>


</head>
</head>

<body>
<div id="main">
    <nav>

        <ul style="display: inline-block">
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a>
            <li><a href="#">About</a></li>


        </ul>
    </nav>
</div>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h1 style="padding-left: 29px"> Click here to continue </h1>
    <br>
    <br>
    <a href="/customer">Customer Details</a>
    <a href="/accoms">Accommodation Details</a>
    <a href="/events1">Event Details</a>
    <a href="/report1">Reports</a>

</div>
<br>

<span style="font-size:20px;cursor:pointer; padding-top: 200px " onclick="openNav()">&#9776;Navigation Panel</span>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

@extends('layout5')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h1>Event Details</h1>
            <br>
            <br>
        </div>
        <div class="col-md-4">
            <form action="/search6" method="get">
                <div class="input-group">
                    <input type="search" name="search4" class="form-control">
                    <span class="input-group-prepend">
					<button type="submit" class="btn btn-primary">Search</button>
				</span>
                </div>
            </form>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{ action('eventscontroller@create') }}" class="btn btn-primary">Add Data</a>
        </div>
    </div>
    <form method="post">
        @csrf
        @method('DELETE')
        <button formaction="/deleteall5" type="submit" class="btn btn-danger">Delete All Selected</button>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr style="background-color:#4D6D9A">
                <th><input type="checkbox" class="selectall"></th>
                <th style="width: 60px">Customer Name</th>
                <th style="width: 80px">Event Date</th>
                <th style="width: 60px">Event Time</th>
                <th style="width: 60px">Category</th>
                <th style="width: 60px">No. of Guests</th>
                <th style="width: 80px">Menu ID</th>
                <th style="width: 80px">Advancement</th>
                <th style="width: 80px">Total Payment</th>
                <th style="width: 200px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $events)
                <tr>
                    <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $events->id}}"></td>
                    <td>{{ $events->c_name }}</td>
                    <td>{{ $events->event_date }}</td>
                    <td>{{ $events->time }}</td>
                    <td>{{ $events->category }}</td>
                    <td>{{ $events->guests }}</td>
                    <td>{{ $events->mid }}</td>
                    <td>{{ $events->advance }}</td>
                    <td>{{ $events->total }}</td>
                    <td>
                        <a href="{{ action('eventscontroller@edit', $events->id) }}" class="btn btn-warning">Edit</a>
                        <button formaction="{{ action('eventscontroller@destroy', $events->id)}}" type="submit" class="btn btn-danger">Delete</button>

                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
    </form>


    <script type="text/javascript">
        $('.selectall').click(function(){
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall5').prop('checked', $(this).prop('checked'));
        });
        $('.selectall').click(function(){
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall5').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox').change(function(){
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if (total == number) {
                $('.selectall5').prop('checked',true);
                $('.selectall5').prop('checked',true);
            }else{
                $('.selectall5').prop('checked',false);
                $('.selectall5').prop('checked',false);
            }
        })
    </script>

@endsection
</body>
</html>
