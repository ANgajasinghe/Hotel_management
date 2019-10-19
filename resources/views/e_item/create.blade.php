<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Table with Add and Delete Row Feature</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

</head>
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
    <br>
    <br>
    <!--item date and required date-->
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
        <form method="post" action="{{ route('eitems.store') }}">

            @csrf
            <section>

                <!--start of the table-->
                <div class="panel panel-footer">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>Event Date</th>
                            <th>Required Date</th>
                            <th>Item Name</th>
                            <th>Item Quantity/Weight</th>
                            <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i> </a></th>
                        </tr>
                        </thead>
                        <tbody><!--start tbody-->
                        <tr>
                            <td><input type="date" name="event_date" class="form-control quantity" required=""></td>
                            <td><input type="date" name="rq_date" class="form-control quantity" required=""></td>
                            <td><input type="text" name="item_name" class="form-control quantity" required=""></td>
                            <td><input type="text" name="qty" class="form-control quantity" required=""></td>
                            <!--X button-->
                            <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                        </tbody><!--tbody end-->
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                        </tr>
                        </tfoot>

                    </table><!--table end-->

                </div>
            </section>

        </form>
    </div>
</div>
<!-- javascript for the table-->
<script type="text/javascript">

    $('.addRow').on('click', function () {
        addRow();
    });

    function addRow() {
        var tr = '<tr>' + '<td><input type="date" name="event_date" class="form-control quantity" required=""></td>' +
            '<td><input type="date" name="rq_date" class="form-control quantity" required=""></td>' +
            '<td><input type="text" name="item_name" class="form-control name" required=""></td>' +
            '<td><input type="text" name="qty" class="form-control quantity" required=""></td>' +
            '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a> </td>' +
            '</td>';
        $('tbody').append(tr);

    }

    $('.remove').live('click', function () {
        var last = $('tbody tr').length;
        if (last == 1) {
            alert("You can not remove the last row");
        } else {
            $(this).parent().parent().remove();
        }
    });
</script>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>

</body>

</html>
