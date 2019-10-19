<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit staff</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<br>
<br>
<div class="container">
    <div role="group" aria-label="Basic example" class="btn btn-dark">
        <a href="{{ route('events.index')}}">
            <button class="btn btn-dark">Events</button>
        </a>
        <a href="{{ route('menus.index')}}">
            <button class="btn btn-dark">Menus</button>
        </a>
        <a href="/eitems">
            <button class="btn btn-dark">Event Items</button>
        </a>
        <a href="/estaff">
            <button class="btn btn-dark">Manage Staff</button>
        </a>
        <a href="/ereport">
            <button class="btn btn-dark">Report</button>
        </a>

    </div>



    <!--MAIN SECTION-->
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <center><h2>Update Event</h2></center>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br/>
            @endif
            <form method="post" action="{{ route('events.update', $staff->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="event_id">Event ID</label>
                    <input type="text" class="form-control" name="event_id" value={{ $staff->event_id }} />
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="date" class="form-control" name="type" value={{ $staff->type }} />
                </div>

                <div class="form-group">
                    <label for="count">Event Time: </label>
                    <input type="text" class="form-control" name="count" value={{ $staff->count }} />
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>


    <!--MAIN SECTION-->

</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>

