<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{URL::asset('css/indexs.css')}}" rel="stylesheet " media="all">
    <script src="{{URL::asset('js/Reports.js')}}"></script>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
<!--header start-->
<div class="header">
    <img class="backing" src="Content/Images/bagr.png">
    <div class="login div">
        <img class="account" id="login" src="Content/Images/log.png">
    </div>
    <div id="side-nav" class="sidenav">
        <a href="UtilityBills.blade.php" id="utility">UTILITY BILLS</a>
        <a href="Expenditures.php" id="expendi">EXPENDITURES</a>
        <a href="" id="reports">REPORTS</a>
    </div>

</div>
<!--header end-->
<div class="card">
    <div class="card-body">
        <canvas id="overViewChart" class="my-4 w-100" width="1000" height="500"></canvas>

    </div>
</div>
</body>

</html>
