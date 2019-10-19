<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event staff</title>
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
            <br>
            <br>
            <br>
            <br>
            <center><h2>Menus</h2></center>
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Event ID</td>
                    <td>Type</td>
                    <td>Count</td>
                    <td colspan=2>Actions</td>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td>
                        <button class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <form action="#" method="post">

                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

                </tbody>
            </table>
            <div></div>
        </div>
        <!--MAIN SECTION-->
        <div>
            <a class="btn btn-primary">Add New</a>
        </div>

    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</div>
</body>
</html>
