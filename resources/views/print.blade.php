<head>
    @extends('layouts.my')

    <script type="text/javascript" src="js/jquery.printPage.js"></script>
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>

    <link href="css\sheet.css" rel="stylesheet" type="text/css">

</head>
<h1>Work Orders</h1>
<span class="limiter">
    <span class="container-table100"><br/>

        <div class="wrap-table100">


            <table>

                <thead>
                    <tr class="table100-head">
                        <th class="column1">Task</th>
                        <th class="column2"> RoomNo</th>
                        <th class="column3">RoomType</th>
                        <th class="column4">Housekeeper</th>
                        <th class="column5">Date</th>




                    </tr>
                </thead>

                @foreach($print as $task)

                    <tbody>
                    <tr>
                        <td>{{$task->Task}}</td>
                        <td> {{$task->RoomNo}}</td>
                        <td>{{$task->RoomType}}</td>
                        <td>{{$task->Housekeeper}}</td>
                        <td>{{$task->Date}}</td>


                    </tr>
@endforeach
