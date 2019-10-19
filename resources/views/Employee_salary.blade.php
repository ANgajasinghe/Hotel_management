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
    <script src="https://kit.fontawesome.com/8418d9c9c2.js" crossorigin="anonymous"></script>
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
            background-color: #435E7c;
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
            height: 700px;
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
                            <th class="text-center" scope="row" style="width:300px;height:10px">ATTENDANCE</th>
                        </tr>
                        </thead>
                    </table>
                </a>
                <a href="{{url('/Esalary')}}">
                    <table class="table" style="width:300px;margin-left: 0px">
                        <thead class="thead-dark" style="">
                        <tr class="btn">
                            <th class="text-center" scope="row"
                                style="width:300px;height:10px;background-color:#264348">SALARY MANAGEMENT
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
                    <li class="my"><a href={{url('/ESChart')}}><img
                                src="https://img.icons8.com/metro/26/000000/file.png">Report</a>
                    </li>
                    <li class="my"><a href={{url('/MTsalary')}}><i class="fas fa-file-invoice-dollar fa-1x"></i> Total expenditure</a>
                    </li>
                </ul>
            </div>

            <div class="container-fluid">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('wrong'))
                    <div class="alert alert-danger">
                        {{ session()->get('wrong') }}
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
                <div class="row">
                    <div class="col-8">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar" style="margin-left: -1ch">
                            <b>
                                <h4 id="date" style="margin-top: 20px;"></h4>
                            </b>

                            <table class="table table-bordered" style="margin-left: -1ch">
                                <thead>
                                <tr>
                                    <th>Avatar</th>
                                    <th>Rrgistaion NO</th>
                                    <th>Type</th>
                                    <th>Month</th>
                                    <th>Name</th>
                                    <th>OT Hours</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employeeD as $row)
                                    <tr>
                                        <form method="post" action="/Esalary">
                                            {{ csrf_field() }}

                                            <td><img src="{{ asset ('uploads/appsetting/'.$row['image']) }}"
                                                     class="avatar"></td>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row['type']}}</td>
                                            <td>{{$row['name']}}</td>
                                            <td><select id="category" name="month" required="required"
                                                        class="mdb-select md-form">
                                                    <option>Select Month</option>
                                                    <option value="Jan">January</option>
                                                    <option value="Feb">February</option>
                                                    <option value="Mar">March</option>
                                                    <option value="Apr">April</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">June</option>
                                                    <option value="Jul">July</option>
                                                    <option value="Aug">August</option>
                                                    <option value="Sep">September</option>
                                                    <option value="Oct">October</option>
                                                    <option value="Nov">November</option>
                                                    <option value="Dec">December</option>


                                                </select>
                                            </td>
                                            <td><input type="text" name="othours"></td>

                                            <input type="hidden" name="image" value="{{$row['image']}}"/>
                                            <input type="hidden" name="id" value="{{$row['id']}}"/>
                                            <input type="hidden" name="type" value="{{$row['type']}}"/>
                                            <input type="hidden" name="name" value="{{$row['name']}}"/>
                                            <td><input type="submit" value="Cal Salary"
                                                       class="btn btn-primary btn-sm" style="margin-left: 0px">

                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-4">
                        <big style="color: red">ADD TOTAL MONTHLY SALARY</big>
                        <form method="post" action="calmonsalary">
                            {{ csrf_field() }}
                            <select id="category" name="month" required="required"
                                    class="mdb-select md-form">
                                <option>Select Month</option>
                                <option value="Jan">January</option>
                                <option value="Feb">February</option>
                                <option value="Mar">March</option>
                                <option value="Apr">April</option>
                                <option value="May">May</option>
                                <option value="Jun">June</option>
                                <option value="Jul">July</option>
                                <option value="Aug">August</option>
                                <option value="Sep">September</option>
                                <option value="Oct">October</option>
                                <option value="Nov">November</option>
                                <option value="Dec">December</option>


                            </select>
                            <input type="submit" value="SUBMIT"
                                   class="btn btn-primary btn-sm" style="margin-left: 0px">


                        </form>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <b>
                                <h4 id="date" style="margin-top: 20px;"></h4>
                            </b>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Rergistaion NO</th>
                                    <th>Month</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($salaryD as $row1)
                                    <tr>
                                        <td>{{$row1['id']}}</td>
                                        <td>{{$row1['month']}}</td>
                                        <td><b style="color: #c51f1a">{{$row1['salary']}}</b></td>
                                        <td><a href="/destroy/{{$row1->id}} " class="btn btn-danger btn-sm"
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

</body>

</html>
