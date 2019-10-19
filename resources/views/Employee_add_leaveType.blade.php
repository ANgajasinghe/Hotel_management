<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/8418d9c9c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>

    <style>
        .btn {

            border: none;
            color: black;
            padding: 5px 5px;
            text-align: center;
            font-size: 20px;
            margin: 4px 5px 0px 50px;
            transition: 0.3s;
        }

        .btn:hover {
            width: 100;
            background-color: #3e8e41;
            color: white;
        }

        ul.my {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color:#435E7c ;
            width: 50%;
        }

        li.my {
            float: left;
        }

        li a {
            height: 50px;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 11px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

        .colum-layout1 {
            max-width: 1300px;
            margin: 40px auto 0 auto;
            padding: auto;
            display: flex;
            align-items: flex-start;

        }

        .main-column1 {
            flex: 0.5;
            margin-right: 40px;

        }

        .second-column1 {
            flex: 1;

        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: white;
        }

        td,
        th {
            padding: 6px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .my-custom-scrollbar {
            position: relative;
            height: 600px;
            overflow: auto;

        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .center {
            text-align: center;

        }

    </style>
</head>

<body>

<!-- Grid row pic zoom hover code -->


<!-- Grid column ---hover code for pic ---
        <div class="col-md-6 mb-4">

            <div class="view overlay hm-zoom">
                <img src="Capture.PNG">
            </div>
        </div>

-->


<!--table navigation-->

<div class="container-fluid">
    <div class="row">
        <div class="col-3" style="background-color: #2C3E50 ">
            <div class="container-fluid" style="margin-top: 150px">
                <div class="center">

                    <a href="{{url('/home') }}"><img style="margin-top:-10ch;width: 100px; height: 100px;"
                                                     src="{{ asset ('uploads/home.png') }}"></a>
                </div>
                <a href="{{url('/Emanagement') }}">
                    <table class="table" style="width:300px;height:100px; margin-left: 0px;margin-top:20px">
                        <thead class="thead-dark">
                        <tr class="btn" style="">
                            <th class="text-center" scope="row" style="width:300px ; height:10px">EMPLOYEE
                                MANAGEMENT
                            </th>
                        </tr>

                        </thead>
                    </table>
                </a>

                <a href="{{url('/Eleave') }}">
                    <table class="table" style="width:300px ; margin-left: 0px ">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row"
                                style="width:300px;height:10px;background-color: #264348;">LEAVE MANAGEMENT
                            </th>
                        </tr>
                        </thead>
                    </table>
                </a>
                <a href="{{url('/Eattendence')}}">
                    <table class="table" style="width:300px;margin-left: 0px">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px">DAILY ATTENDANCE
                            </th>
                        </tr>
                        </thead>
                    </table>
                </a>
                <a href="{{url('/Esalary')}}">
                    <table class="table" style="width:300px;margin-left: 0px">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px">SALARY
                                MANAGEMENT
                            </th>
                        </tr>
                        </thead>
                    </table>
                    </table>
                </a>
            </div>

        </div>

        <div class="col-9">

            <ul class="my">
                <li class="my"><a href={{url('/Eleave')}}><i class="far fa-check-square"></i>Accepted Leave </a>
                </li>
                <li class="my"><a href={{url('/ERleave')}}><i class="fas fa-exclamation-triangle"></i> Requested Leave
                    </a>
                </li>
                <li class="my" style="background-color:#857373"><a href='{{url("/Eaddleave")}}'><img
                            src="https://img.icons8.com/metro/26/000000/file.png">Add Leave</a>
                </li>
            </ul>
            <p style="  margin-top: 50px"></p>
            <!--access java function -->
            <h3>Today:<h3 id="date">Today</h3>
            </h3>
            <!-- Table  -->
            <div class="table-wrapper-scroll-y my-custom-scrollbar">

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                        </ul>
                        @endforeach

                    </div>
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10">
                            <form class="form-group" method="post" action="/addLeave">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col">

                                        <input type="text" name="leve_type" class="form-control"
                                               placeholder="Leave Type" onkeypress="return tabE(this,event)">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="days" class="form-control" placeholder="Days"
                                               onkeypress="return tabE(this,event)">
                                    </div>
                                    <p>
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="container" style="margin-top: 20px ">
                    <div class="row">
                        <div class="col-sm-8">

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align:center">Leave Type ID</th>
                                    <th style="text-align:center">Leave Type</th>
                                    <th style="text-align:center">Allow Days</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($leaveType as $row)
                                    <tr>

                                        <td style="text-align:center">{{$row['id']}}</td>
                                        <td style="text-align:center">{{$row['leve_type']}}</td>
                                        <td style="text-align:center">{{$row['allow_leaves']}}</td>

                                        <td style="text-align:center"><a href="/des/{{$row['id']}} "
                                                                         class="btn btn-danger btn-sm"
                                                                         style="margin-top:4px"
                                                                         onclick="return confirm('This Delete Process Can Not Undo')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
