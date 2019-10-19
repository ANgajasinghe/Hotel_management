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
            background-color:#435E7c;
            width: 50%;
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
                                style="width:300px;height:10px;background-color:#264348"><b>LEAVE MANAGEMENT</b>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </a>
                <a href="{{url('/Eattendence')}}">
                    <table class="table" style="width:300px;margin-left: 0px">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px">
                                <b>ATTENDANCE</b></th>
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
                    <li class="my"><a href={{url('/Eleave')}}><i class="far fa-check-square"></i>Accepted Leave </a>
                    </li>

                    <li class="my" style="background-color:#857373"><a href={{url('/ERleave')}}><i
                                class="fas fa-exclamation-triangle"></i> Requested Leave </a>
                    </li>
                    <li class="my"><a href='{{url("/Eaddleave")}}'><img
                                src="https://img.icons8.com/metro/26/000000/file.png">Add Leave</a>
                    </li>
                </ul>
            </div>
            <p></p>
            <h3>Requested Leave</h3>
            <div class="col-md-10">
                <form action="/search2" method="get">
                    <div class="input-group input-group-sm mb-3">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend" style="width: 510px">
                                <button type="submit" class="btn btn-primary"> Search</button>
                            </span>
                    </div>
                </form>
            </div>
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <h3>Today:<h3 id="date">Today</h3>
                </h3>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col"><b>Registation No</b></th>
                            <th scope="col"><b>Name</b></th>
                            <th scope="col"><b>Apply Date</b></th>
                            <th scope="col"><b>Leaving Date</b></th>
                            <th scope="col"><b>Leave Type</b></th>
                            <th scope="col"><b>#Leaving Dates</b></th>

                        </tr>
                        </thead>


                        <tbody>

                        @foreach($leave as $row )
                            <tr>
                                <td>{{$row['eid']}}</td>
                                <td>{{$row['name']}}</td>
                                <td>{{$row['Requesting_date']}}</td>
                                <td>{{$row['leaving_date']}}</td>
                                <td>{{$row['leve_type']}}</td>
                                <td>{{$row['nof_days']}}</td>


                                @foreach($emp as $r)
                                    @if($r['id']==$row['eid'])
                                        <td>{{$r['Email']}} </td>
                                    @endif
                                @endforeach

                                <form class="form-group" method="post" action="/sendleave">
                                    {{ csrf_field() }}


                                    <input type="hidden" name="ID" value="{{$row['eid']}}"/>
                                    <input type="hidden" name="today" value="{{$row['Requesting_date']}}"/>
                                    <input type="hidden" name="Date" value="{{$row['leaving_date']}}"/>
                                    <input type="hidden" name="leavetype" value="{{$row['leve_type']}}"/>
                                    <input type="hidden" name="#days" value="{{$row['nof_days']}}"/>
                                    <td><input type="submit" value="Add" class="btn btn-primary btn-sm"
                                               style="margin-left: 0px"></td>
                                </form>
                                <td><a href="/destroyl/{{$row->id}} " class="btn btn-danger btn-sm"
                                       style="margin-top:4px"
                                       onclick="return confirm('This Delete Process Can Not Undo')">Delete</a>
                                </td>
                                </td>


                            </tr>

                        @endforeach

                        </tbody>


                    </table>
                    </form>
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
