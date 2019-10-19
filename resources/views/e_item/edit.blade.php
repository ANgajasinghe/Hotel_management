<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit event</title>
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
<div class="container">
    <!--MAIN SECTION-->
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <center><h2>Update item </h2></center>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            <form method="post" action="{{ route('eitems.update', $eitem->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="event_date">Event Date</label>
                    <input type="date" class="form-control" name="event_date" value={{ $eitem->event_date}} />
                </div>

                <div class="form-group">
                    <label for="rq_date">Required Date</label>
                    <input type="date" class="form-control" name="rq_date" value={{ $eitem->rq_date }} />
                </div>

                <div class="form-group">
                    <label for="item_name">Item name </label>
                    <input type="text" class="form-control" name="item_name" value={{ $eitem->item_name }} />
                </div>
                <div class="form-group">
                    <label for="qty">Quantity / Weight</label>
                    <input type="text" class="form-control" name="qty" value={{ $eitem->qty }} />
                </div>


                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>


    <!--MAIN SECTION-->

</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>

