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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
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

<div class="container">


</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="/eventh"> Event Information </a>
    <a href="/eitems">Items Information</a>
    <a href="/menus">Menu Information</a>
    <a href="/ereport">Event Report Information</a>

</div>
<br>

<span style="font-size:20px;cursor:pointer; padding-top: 200px " onclick="openNav()">&#9776;Event Management</span>

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
        <center><h2>Event Management Report</h2></center>
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('ereport.store') }}">
                @csrf
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" colspan="4" style="color:blue;">Event Information</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Customer name</td>
                        <td><input type="text" name="customer_name" id="val1"></td>
                        <td>Event date</td>
                        <td><input type="date" name="event_date" id="val2"></td>
                    <tr>
                        <td>Event time</td>
                        <td><input type="text" name="event_time" id="val3"></td>
                        <td>Event Manager</td>
                        <td><input type="text" name="event_manager" id="val4"></td>
                    </tr>
                    </tr>
                    <tr>

                        <td>Estimated No. of Attendence of guest for the Event</td>
                        <td><input type="text" name="attendence" id="val5"></td>
                        <td>Proposed Registration cost for a each person</td>
                        <td><input type="text" name="cost" id="val6"></td>

                    </tr>
                    <tr>
                        <th colspan="4" style="color:blue;">Budget Information</th>
                    </tr>
                    <tr>

                        <td colspan="2">Actual Expence</td>
                        <td colspan="2"><input type="number" name="etotal" id="val7"></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="2">Budget Expence</td>
                        <td colspan="2"><input type="number" name="btotal" id="val8"></td>
                        <td></td>

                    </tr>

                    </tbody>

                </table>
                <center><input type="submit" value="Save" name="" class="btn btn-success"></center>
            </form>
        </div>
        <input type="button" value="Demo" id="btn3">

    </div>
    <!--MAIN SECTION-->


</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</div>
<br>
<br>
<script>
    $(document).ready(function () {
        $("#btn3").click(function () {
            $("#val1").val("Nimal");
            $("#val2").val("2019-08-19");
            $("#val3").val("11.00 AM -4.00 PM");
            $("#val4").val("kavi");
            $("#val5").val("100");
            $("#val6").val("1000.00");
            $("#val7").val("50000.00");
            $("#val8").val("45000.00");

        });
    });

</script>
</body>

</html>


