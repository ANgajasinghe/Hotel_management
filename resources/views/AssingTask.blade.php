php<html>

<head>
    @extends('layouts.my')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>

    <script type="text/javascript" src="js/jquery.printPage.js"></script>

</head>


<body>
<div class="container">
    <div class="text-conter">
        <h1>Work Orders
            <h1/>
    </div>
</div>


<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Task</th>
        <th scope="col">RoomNo</th>
        <th scope="col">RoomType</th>
        <th scope="col">Housekeeper</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>


    @foreach($AssingTask as $task)

        <tbody>
        <tr>
            <td>{{$task->Task}}</td>
            <td> {{$task->RoomNo}}</td>
            <td>{{$task->RoomType}}</td>
            <td>{{$task->Housekeeper}}</td>
            <td>{{$task->Date}}</td>


            <td>

                <a href="/deletetask/{{$task->id}}" class="btn btn-warning ">Delete</a>


            </td>

        </tr>


        @endforeach


        </tbody>
</table>
</div>
</div>
</span>
</span>

<a href="{{ url('/prnpriview') }}" class="btnprn btn-warning">Print Preview</a>
<script type="text/javascript">
    $(document).ready(function () {
        $('.btnprn').printPage();
    });

</script>


</body>

</html>
