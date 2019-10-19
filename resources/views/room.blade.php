<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

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
            background-color: #4c3c3c;
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
            height: 510px;
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

        th {
            font-family: Lucida Console;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px 0;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked + label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked + label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked + label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled + label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }

    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function () {
                if (this.checked) {
                    checkbox.each(function () {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function () {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function () {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });

    </script>
</head>

<body>

<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3" style="background-color: #2C3E50 ;height: 800px">
                <div class="container-fluid" style="margin-top: 150px">
                    <a href="{{url('/inventory') }}">
                        <table class="table" style="width:300px;height:100px; margin-left: 0px;margin-top:20px">
                            <thead class="thead-dark">
                            <tr class="btn" style="">
                                <th class="text-center" scope="row" style="width:300px ; height:10px">KITCHEN
                                    ITEMS
                                </th>
                            </tr>

                            </thead>
                        </table>
                    </a>

                    <a href="{{url('/room') }}">
                        <table class="table" style="width:300px ; margin-left: 0px ">
                            <thead class="thead-dark">
                            <tr class="btn">
                                <th class="text-center" scope="row" style="width:300px;height:10px">ROOM ITEMS
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </a>
                    <a href="{{url('/hall')}}">
                        <table class="table" style="width:300px;margin-left: 0px">
                            <thead class="thead-dark">
                            <tr class="btn">
                                <th class="text-center" scope="row" style="width:300px;height:10px">HALL ITEMS
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </a>

                </div>

            </div>

            <div class="col-9">
                <div>
                    <p style="margin-top: 50px"></p>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <form class="form-inline mr-auto">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search"
                                   aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>

                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
                <p style="margin-bottom: 100px"></p>
                <div>
                    <div class="container">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2><b>ROOM</b> ITEMS</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                                class="material-icons">&#xE147;</i> <span>Add New Item</span></a>

                                    </div>
                                </div>
                            </div>
                            <p></p>
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
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="selectAll">
                                                    <label for="selectAll"></label>
                                                </span>
                                    </th>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Stocked Date</th>
                                    <th>Stocked Quantity</th>
                                    <th>Issued Date</th>
                                    <th>Issued Quantity</th>
                                    <th>Available Quantity</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $n = 1; ?>
                                @foreach($inventoryD as $row)
                                    <tr>
                                        <td>
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                                    <label for="checkbox1"></label>
                                                </span>
                                        </td>
                                        <td>{{$n}}</td>
                                        <td>{{$row->ItemName}}</td>
                                        <td>{{$row->stockeddate}}</td>
                                        <td>{{$row->stockedqty}}</td>
                                        <td>{{$row->issueddate}}</td>
                                        <td>{{$row->issuedqty}}</td>
                                        <td>{{$row->availableqty}}</td>
                                        <td>
                                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i
                                                    class="material-icons" data-toggle="tooltip"
                                                    title="Edit">&#xE254;</i></a>
                                            <form action="{{url('task2/destroy/'.$row->id)}}">
                                                @csrf
                                                <button class="delete" data-toggle="modal"><i class="material-icons"
                                                                                              data-toggle="tooltip"
                                                                                              title="Delete">&#xE872;</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $n++; ?>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="clearfix">

                            </div>
                        </div>
                        <!-- Edit Modal HTML -->
                        <div id="addEmployeeModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="post" action="/saveTask3">
                                        {{csrf_field()}}
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Item</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">
                                                &times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/saveTask3">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label>Item Name</label>
                                                    <input type="text" name="name1" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Item Stocked Date</label>
                                                    <input type="date" name="std" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Item Stocked Quantity</label>
                                                    <input type="text" name="stq" class="form-control" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Item Issued Date</label>
                                                    <input type="date" name="isd" class="form-control" required>
                                                </div>


                                                <div class="form-group">
                                                    <label>Item Issued Quantity</label>
                                                    <input type="text" name="isq" class="form-control" required>
                                                </div>


                                                <div class="form-group">
                                                    <label>Available Quantity</label>
                                                    <input type="text" name="avq" class="form-control" required>
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal"
                                                   value="Cancel">
                                            <input type="submit" class="btn btn-success" value="Add">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Modal HTML -->
                        <div id="editEmployeeModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form>
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Item Details</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">
                                                &times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Item Name</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Item Stocked Date</label>
                                                <input type="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Item Stocked Quantity</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Item Issued Date</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Item Issued Quantity</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Available Quantity</label>
                                                <input type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal"
                                                   value="Cancel">
                                            <input type="submit" class="btn btn-info" value="Save">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal HTML -->

                    </div>
                </div>

            </div>


</body>

</html>
