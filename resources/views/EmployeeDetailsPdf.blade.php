<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8418d9c9c2.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .center {
            text-align: center;

        }

        .avatar {
            vertical-align: middle;
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }

        table,
        td,
        th {
            border: 1px solid #ddd;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 15px;
        }

    </style>
</head>

<body>
<?php

echo "<label style='text-align: right' >" . date("Y-m-d") . "<br>";
echo "" . date("l");
?>
<p style="text-align: right" >

    <i class="fas fa-phone-square-alt"></i> +94(41)225-74-66 <br>
    <i class="far fa-envelope"></i> <a href="https://mail.google.com">info@petersplace.lk</a><br>
    <u>HR MANAGEMENT</u>


</p>
<div class="center">

    <h3>Employee ID:-{{$row->id}}</h3>
    <table>
        <tr>
            <td>Category</td>
            <td>{{$row->type}}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{$row->name}}</td>
        </tr>
        <tr>
            <td>Date Of Birth</td>
            <td>{{$row->DOB}}</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>{{$row->gender}}</td>
        </tr>
        <tr>
            <td>Join Date</td>
            <td>{{$row->joindate}}</td>
        </tr>
        <tr>
            <td>Telephone No</td>
            <td>{{$row->tp}}</td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td>{{$row->Email}}</td>
        </tr>

    </table>
</div>


</body>

</html>
