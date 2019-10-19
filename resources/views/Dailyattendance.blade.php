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
    <h4>Daily Attendance</h4>
</div>

<div class="center">


    <table>
        <tr>
            <th></th>


            <th><b>Rrgistaion NO</b></th>
            <th><b>Type</b></th>
            <th><b>Name</b></th>

        </tr>
        @foreach ($items as $key => $row)
            <tr>
                <td>{{ ++$key }}</td>
                <th><b>{{$row->id}}</b></th>
                <td>{{$row->type}}</td>
                <td>{{$row->name}}</td>

            </tr>
        @endforeach
    </table>
</div>




</body>

</html>
