<!doctype html>
<html>

<head>
    <title>PetersPlace</title>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all'/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: sans-serif;
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
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

    </style>
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

@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>

                </div>
            @endif
            <form action="{{action('accomcontroller@store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Arrival</label>
                    <input class="form-control" type="date" name="arrival_date">
                </div>

                <div class="form-group">
                    <label>Departure</label>
                    <input class="form-control" type="date" name="deparure_date">
                </div>
                <div class="form-group">
                    <label>Adults</label>
                    <input class="form-control" type="Number" name="adults">
                </div>
                <div class="form-group">
                    <label>Kids</label>
                    <input class="form-control" type="Number" name="kids">
                </div>
                <div class="form-group">
                    <label>Room Type</label>
                    <select style="margin-left: 0px; margin-bottom: 30px" class="form-control" type="text"
                            name="room_type">
                        <option value="single">Single Bedroom</option>
                        <option value="double">Double Bedroom</option>
                        <option value="family">Family Bedroom</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Room No</label>
                    <input class="form-control" type="text" name="room_no">
                </div>
                <div class="form-group">
                    <label>Food Service</label>
                    <select style="margin-left: 0px; margin-bottom: 30px" class="form-control" type="text"
                            name="food_ser">
                        <option value="breakfast">Breakfast</option>
                        <option value="half">Half Board</option>
                        <option value="full">Full Board</option>
                    </select>

                </div>
                <div class="form-group">
                    <label>Payment</label>
                    <input class="form-control" type="text" name="payment">
                </div>
                <div class="form-group">
                    <label>NIC</label>
                    <input class="form-control" type="text" name="nic">
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>

            </form>
        </div>
    </div>
@endsection

</body>
