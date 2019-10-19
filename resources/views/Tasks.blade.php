<html>

<head>


    <title>Assign Tasks</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>


    </style>
</head>

<body>

@foreach($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
        {{$error}}

    </div>

@endforeach


<div class="wrap-form" style="background-color:white;margin-left:300px;margin-right:350px;width:550px;height:90%">


    <form method="post" action="/saved">


        <h1>Assign tasks</h1>
        <div class="container">
            <div class="jumbotron">
                <form method="post" action="/saved">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label> Room Number: </label>
                        <input type="text" name="RoomNo" class="form-control" placeholder="Enter Room number">
                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="Date" name="Date" class="form-control" placeholder="Enter Date">
                    </div>

                    <div class="form-group">
                        <label>Room Type</label>
                        <input type="text" name="RoomType" class="form-control" placeholder="Room Type">
                    </div>

                    <div class="form-group">
                        <label>Task</label>
                        <input type="text" name="Task" class="form-control" placeholder="Enter Task">
                    </div>


                    <div class="form-group">
                        <label>Housekeeper</label>
                        <input type="text" name="Housekeeper" class="form-control" placeholder="Enter Housekeeper">
                    </div>
                    <br/>
                    <br/>

                    <input type="submit" value="Assign" name="btnSubmit" class="btn btn-warning">
                </form>
            </div>
        </div>
</body>

</html>
