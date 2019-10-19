<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css">
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

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #435E7c;
            width: 30%;
        }

        li {
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

                    <img style="margin-top:-10ch;width: 100px; height: 100px;"
                         src="{{ asset ('uploads/home.png') }}">
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
                            <th class="text-center" scope="row" style="width:300px;height:10px">LEAVE MANAGEMENT
                            </th>
                        </tr>
                        </thead>
                    </table>
                </a>
                <a href="{{url('/Eattendence')}}">
                    <table class="table" style="width:300px;margin-left: 0px">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row"
                                style="width:300px;height:10px;background-color:#264348"><b>ATTENDANCE</b></th>
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
            <div class="container-fluid" style="width: 900px ;margin-left: -3ch">
                <ul class="my">

                    <li class="my"><a href={{url('/Eadd')}}><img
                                src="https://img.icons8.com/metro/26/000000/add-user-male.png"> Add
                            Employee</a>
                    </li>
                    <li class="my"><a href={{url('/EChart')}}><img
                                src="https://img.icons8.com/metro/26/000000/file.png">Report</a>
                    </li>
                </ul>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">

                    @foreach ($errors->all() as $error)
                        {{ $error }}

                    @endforeach

                </div>
            @endif

            <div class="row">
                <div class="col-5">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <b>
                            <h4 id="date" style="margin-top: 20px;"></h4>
                        </b>

                        <h5 style="margin: 30px;text-align: center;border-bottom: 1px solid black"><b>All Employees List</b></h5>

                        <table class="table table-bordered">

                            <thead>
                            <tr>
                                <th><b>Employee ID</b></th>
                                <th><b>Type</b></th>
                                <th><b>Name</b></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employeeD as $row)
                                <tr>
                                    <td><b>{{$row['id']}}</b></td>
                                    <td>{{$row['type']}}</td>
                                    <td>{{$row['name']}}</td>
                                    <form method="post" action="/store">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$row['id']}}"/>
                                        <input type="hidden" name="type" value="{{$row['type']}}"/>
                                        <input type="hidden" name="name" value="{{$row['name']}}"/>
                                        <input type="hidden" name="date" id="date" value="date"/>
                                        <input type="hidden" name="count" value="1"/>
                                        <td><input type="submit" value="ADD" class="btn btn-primary btn-sm"
                                                   style="margin-left: 20px"/></td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="col-7">
                    <form method="post" action="/dailyAttDetailsPdf" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <i class="fas fa-file-pdf"></i><input type="submit" class="btn btn-secondary btn-sm" value="DOWNLOAD PDF">
                    </form>

                    <h5 style="margin: 45px 30px 30px 30px;text-align: center;border-bottom: 1px solid black"><b>ADD Attendance</b></h5>

                    <h3 style="margin-top:20px;margin-left: 20px;color: #c51f1a">Total Attendance = {{$count}} </h3>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar" style="margin-left: -2ch>
                        <div class=" container-fluid
                    " style=" margin-top: 20px">

                    <table class="table table-bordered" style="margin-left: 0ch">
                        <thead>
                        <tr>
                            <td colspan="4">
                                <h6><b>Daily Attendance List </b></h6>
                            </td>
                        </tr>
                        <tr>
                            <th><b>Date</b></th>
                            <th><b>Employee ID</b></th>
                            <th><b>type</b></th>
                            <th><b>Name</b></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                        <tr>
                            @foreach($attendenceD as $row)
                                <?php  $timestamp = strtotime($row['created_at']);
                                $month = date('M', $timestamp);
                                $dates = date('d', $timestamp);
                                $date = date('d', $timestamp) . ' ' . date('M', $timestamp);?>
                                <td><b style="color: #c51f1a">{{$date}}</b></td>
                                <td><b>{{$row['id']}}</b></td>
                                <td>{{$row['type']}}</td>
                                <td>{{$row['name']}}</td>
                                <td><a href="/destroya/{{$row->id}} " class="btn btn-danger btn-sm"
                                       style="margin-top:4px">Delete</a>
                                </td>
                                <form method="post" action="/storeA">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$row['id']}}"/>
                                    <input type="hidden" name="type" value="{{$row['type']}}"/>
                                    <input type="hidden" name="name" value="{{$row['name']}}"/>
                                    <input type="hidden" name="month" value="{{$month}}"/>
                                    <input type="hidden" name="date" value="{{$dates}}"/>
                                    <td><input type="submit" value="ADD" class="btn btn-primary btn-sm"
                                               style="margin-left: 20px"/></td>
                                </form>
                        </tr>

                        </tbody>
                        @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>

<script>
    window.onload = setInterval(clock, 1000);

    function clock() {
        var d = new Date();
        var date = d.getDate();
        var year = d.getFullYear();
        var month = d.getMonth();
        var monthArr = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ];
        month = monthArr[month];
        document.getElementById("date").innerHTML = date + " " + month + ", " + year;
    }

</script>

</body>

</html>
