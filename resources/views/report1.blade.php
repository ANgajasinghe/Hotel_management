<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all'/>

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


<!--MAIN SECTION-->


<div class="row">
    <div class="col-sm-12">
        <br>
        <br>
        <br>
        <br>
        <center>
            <h2>Front Office Management Report</h2>
        </center>
        <table class="table table-bordered" style="margin-top:80px; margin-left: 40px; margin-right: 40px">
            <thead>
            <tr>
                <th scope="col" colspan="4" style="color:blue;">Customer Information</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Customer name</td>
                <td><input type="text" name="cus_name"/></td>
                <td>NIC</td>
                <td><input type="text" name="nic"/></td>
            <tr>
                <td>Arrival date</td>
                <td><input type="date" name="arr_date"/></td>
                <td>Departure date</td>
                <td><input type="date" name="dep_time"/></td>
            </tr>
            </tr>

            <tr>
                <th colspan="4" style="color:blue;">Payment Information</th>
            </tr>
            <tr>
                <td>Payment</td>
                <td><input type="text" name="payment"/></td>
                <td>Invoice Number</td>
                <td><input type="text" name="invoice"/></td>

            </tbody>

        </table>
        <input style="margin-left: 500px; margin-top: 100px" type="submit" value="Save" name="savereport"
               class="btn btn-success"/>
    </div>
    <!--MAIN SECTION-->


</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>

</html>
