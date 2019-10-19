<!doctype html>
<html>

<style>
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

<head><title>PetersPlace</title>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all'/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/u">Utility Bills</a>
  <a href="/rep">Reports</a>

</div>
<br>

<span style="font-size:20px;cursor:pointer; padding-top: 200px " onclick="openNav()">&#9776; Finance Management</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<div id="main">
    <nav>

        <ul style="display: inline-block">
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a>
            <li><a href="#">About</a></li>
            <li><a href="#">Update</a></li>
            <li><a href="#">Search</a></li>

        </ul>
    </nav>
</div>


@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{action('utilitycontroller@store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>Type</label>
                    <select style="margin-left: 0px; margin-bottom:30px" class="form-control" type="text" name="type">
                        <option value="water">Water</option>
                        <option value="electricity">Electricity</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input class="form-control" type="date" name="date"/>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input class="form-control" type="number" name="amount"/>
                </div>

                <button class="btn btn-primary" type="submit">Submit</button>

            </form>
        </div>
    </div>
@endsection

</body>
