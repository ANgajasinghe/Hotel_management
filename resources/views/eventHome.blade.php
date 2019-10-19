<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <title>Event Management</title>
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
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="/eventh"> Event Information </a>
    <a href="/menus">Menu Information</a>
    <a href="/eitems">Items Information</a>
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

<div class="row">

    <div class="col-sm-8"></div>
    <div class="col-md-4">
        <form action="/searcheventaa" method="get" align="right">
            <div class="form-group">
                <input type="search" name="searcheventaa" class="form-control">
                <span class="form-group-btn"></span>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <div class="col-sm-12">
        <center><h2>Events</h2></center>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Event Date</th>
                <th>Time</th>
                <th>Category</th>
                <th>No of Guests</th>
                <th>menu</th>
                <th>Advance</th>
                <th>Total</th>

            </tr>
            </thead>
            <tbody>
            @foreach($eventh as $ev)
                <tr>
                    <td>{{$ev['id']}}</td>
                    <td>{{$ev['c_name']}}</td>
                    <td>{{$ev['event_date']}}</td>
                    <td>{{$ev['time']}}</td>
                    <td>{{$ev['category']}}</td>
                    <td>{{$ev['guests']}}</td>
                    <td>{{$ev['mid']}}</td>
                    <td>{{$ev['advance']}}</td>
                    <td>{{$ev['total']}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
        </div>


    </div>

</div>


</body>
</html>

