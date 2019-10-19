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

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h1>Customer Details</h1>
            <br>
            <br>
        </div>
        <div class="col-md-5" align="right">
            <a href="{{url('dynamic_pdf/pdf')}}" class="btn btn-danger">Convert into PDF</a>
        </div>
        <div class="col-md-4">
            <form action="/search1" method="get">
                <div class="input-group">
                    <input type="search" name="search1" class="form-control">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{ action('postcontroller@create') }}" class="btn btn-primary">Add Data</a>
        </div>
    </div>
    <form method="post">
        @csrf
        @method('DELETE')
        <button formaction="/deleteall1" type="submit" class="btn btn-danger">Delete All Selected</button>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr style="background-color:#4D6D9A">
                <th><input type="checkbox" class="selectall"></th>
                <th style="width: 60px">First Name</th>
                <th style="width: 80px">Last Name</th>
                <th style="width: 60px">NIC</th>
                <th style="width: 60px">E mail</th>
                <th style="width: 60px">Phone Number</th>
                <th style="width: 80px">Address</th>
                <th style="width: 500px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $post->id}}"></td>
                    <td>{{ $post->fname }}</td>
                    <td>{{ $post->lname }}</td>
                    <td>{{ $post->nic }}</td>
                    <td>{{ $post->email }}</td>
                    <td>{{ $post->phone }}</td>
                    <td>{{ $post->address }}</td>
                    <td>
                        <a href="{{ action('postcontroller@edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        <button formaction="{{ action('postcontroller@destroy', $post->id)}}" type="submit"
                                class="btn btn-danger">Delete
                        </button>

                    </td>
                </tr>
            @endforeach

            @foreach($posts as $customer)
                <tr>
                    <td>{{$customer->fname}}</td>
                    <td>{{$customer->lname}}</td>
                    <td>{{$customer->nic}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->address}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
    </form>


    <script type="text/javascript">
        $('.selectall').click(function () {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall2').prop('checked', $(this).prop('checked'));
        });
        $('.selectall').click(function () {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox').change(function () {
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if (total == number) {
                $('.selectall').prop('checked', true);
                $('.selectall2').prop('checked', true);
            } else {
                $('.selectall').prop('checked', false);
                $('.selectall2').prop('checked', false);
            }
        })

    </script>

@endsection
</body>
