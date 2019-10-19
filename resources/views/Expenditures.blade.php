<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{URL::asset('css/indexs.css')}}" rel="stylesheet " media="all">
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
        <a href="Incomes.php" id="expendi">INCOMES</a>
        <a href="" id="reports">REPORTS</a>
    </div>

</div>
<!--header end-->
<!--body start-->
<div class="income-content">
    <form method="post" action="/insert">
        {{csrf_field()}}
        <table>
            <tr>
                <td>Date :</td>
                <td><input type="date" name="date" required></td>
            </tr>
        </table>
        <input type="submit" value="send"/>
    </form>
</div>
</body>

</html>
