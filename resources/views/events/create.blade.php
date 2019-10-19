<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create menu</title>
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
            <h1 class="display-3">Add a event</h1>
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
                <form method="post" action="{{ route('events.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Client Name:</label>
                        <input type="text" class="form-control" name="client_name"/>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Event Date:</label>
                        <input type="text" class="form-control" name="event_date"/>
                    </div>

                    <div class="form-group">
                        <label for="email">Event Time:</label>
                        <input type="text" class="form-control" name="event_time"/>
                    </div>
                    <div class="form-group">
                        <label for="city">Category:</label>
                        <input type="text" class="form-control" name="category"/>
                    </div>
                    <div class="form-group">
                        <label for="country">No of Guests:</label>
                        <input type="text" class="form-control" name="no_of_guests"/>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Food Menu:</label>
                        <input type="text" class="form-control" name="food_menu"/>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Clients Menu:</label>
                        <input type="text" class="form-control" name="clients_menu"/>
                    </div>
                    <button type="submit" class="btn btn-success">Add Event</button>
                </form>
            </div>
        </div>
    </div>
    <!--MAIN SECTION-->

</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
