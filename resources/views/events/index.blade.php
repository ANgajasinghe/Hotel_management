<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events</title>
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

    <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-4">
            <div class="search-box">
                <i class="material-icons"></i>
                <input type="text" class="form-control" placeholder="Search…">
            </div>
        </div>
    </div>
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
        <div class="col-sm-12">
            <center><h2>Events</h2></center>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Client Name</td>
                    <td>Event Date</td>
                    <td>Event Time</td>
                    <td>Category</td>
                    <td>No of Guests</td>
                    <td>Food Menu</td>
                    <td>Client Menu</td>
                    <td colspan=2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($eventt as $event)
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->client_name}}</td>
                        <td>{{$event->event_date}}</td>
                        <td>{{$event->event_time}}</td>
                        <td>{{$event->category}}</td>
                        <td>{{$event->no_of_guests}}</td>
                        <td>{{$event->food_menu}}</td>
                        <td>{{$event->clients_menu}}</td>
                        <td>
                            <a href="{{ route('events.edit', $event->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('events.destroy', $event->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
            <!--MAIN SECTION-->

            <div>
                <a style="margin: 19px;" href="{{ route('events.create')}}" class="btn btn-primary">Add new event</a>
            </div>

        </div>
        <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
