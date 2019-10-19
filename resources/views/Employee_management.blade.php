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
            background-color: #435E7c;
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
        <div class="col-3" style="background-color: #2C3E50 ;">
            <div class="container-fluid" style="margin-top: 150px">
                <div class="center">

                    <a href="{{url('/home') }}"><img style="margin-top:-10ch;width: 100px; height: 100px;"
                                                     src="{{ asset ('uploads/home.png') }}"></a>
                </div>
                <a href="{{url('/Emanagement') }}">
                    <table class="table" style="width:300px;height:100px;margin:10px auto 0px auto">
                        <thead class="thead-dark" style="">
                        <tr class="btn" style="">
                            <th class="text-center" scope="row"
                                style="width:300px ; height:10px ; background-color:#264348"><b>EMPLOYEE
                                    MANAGEMENT</b>
                            </th>
                        </tr>

                        </thead>
                    </table>
                </a>

                <a href="{{url('/Eleave') }}">
                    <table class="table" style="width:300px ; margin:10px auto 10px auto">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px; ">LEAVE MANAGEMENT
                            </th>
                        </tr>
                        </thead>
                    </table>
                </a>
                <a href="{{url('/Eattendence')}}">
                    <table class="table" style="width:300px;margin:10px auto 10px auto">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px; margin-left: -4ch;">
                                ATTENDANCE
                            </th>
                        </tr>
                        </thead>
                    </table>
                </a>
                <a href="{{url('/Esalary')}}">
                    <table class="table" style="width:300px;margin:10px auto 10px auto">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px; margin-left: -4ch;">
                                SALARY
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
            <div class="container-fluid" style="width: 1200px ;margin-left: -3ch">
                <ul class="my">
                    <li class="my"><a href={{url('/Emanagement')}}><img
                                src="https://img.icons8.com/metro/26/000000/ingredients-list.png">All Employee</a>
                    </li>
                    <li class="my"><a href={{url('/Eadd')}}><img
                                src="https://img.icons8.com/metro/26/000000/add-user-male.png"> Add
                            Employee</a>
                    </li>
                    <li class="my"><a href="{{url('/Edelete')}}"> <img
                                src="https://img.icons8.com/metro/26/000000/file.png">REMOVED EMPLOYEE</a>
                    </li>

                </ul>
            </div>
            <p></p>
            <div class="col-md-10">
                <form action="/search" method="get">
                    <div class="input-group input-group-sm mb-3">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend" style="width: 510px">
                                <button type="submit" class="btn btn-primary"> Search</button>
                            </span>
                    </div>
                </form>
            </div>


            <p></p>
            <a href='pdfview'  class="btn btn-secondary btn-sm ">Download PDF</a>
            <p></p>


            <div class="table-wrapper-scroll-y my-custom-scrollbar" style="margin-bottom: 10px">
                <!-- Search form -->

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><b>Avatar</b></th>
                        <th><b>Rrgistaion NO</b></th>
                        <th><b>Type</b></th>
                        <th><b>Name</b></th>
                        <th><b>Email</b></th>
                        <th><b>Telephone No</b></th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                        @foreach($employeeD as $row)
                            <td><img src="{{ asset ('uploads/appsetting/'.$row->image) }}" class="avatar">
                            </td>
                            <th><b>{{$row['id']}}</b></th>
                            <td>{{$row->type}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->Email}}</td>
                            <td>{{$row->tp}}</td>
                            <td><a href="/show/{{$row->id}} " class="btn btn-warning btn-sm"
                                   style="margin-top:4px">View</a></td>
                            <td><a href="/destroye/{{$row->id}} " class="btn btn-danger btn-sm"
                                   style="margin-top:4px"
                                   onclick="return confirm('This Delete Process Can Not Undo')">Delete</a>
                            </td>
                        <!-- <td>  <a href="EmployeeDetailsPdf/{{$row->id}}">Print</a></td> -->

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

</script>
</body>

</html>
