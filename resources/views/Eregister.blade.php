<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Javascript -->


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<nav class="navbar  fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/Eattendence')}}">Attendance</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/EChart')}}"> Employee base <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{url('/MChart')}}"> Month base <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" href="{{url('/sss')}}"> Register <span class="sr-only">(current)</span></a>
            </li>


        </ul>
    </div>
</nav>
<p></p>
<div class="container" style="margin-top: 100px">
    <form action="/search" method="get" target="_blank">
        <div class="input-group input-group-sm mb-3">
            <input type="search" name="search" class="form-control">
            <span class="input-group-prepend" style="width: 510px">
                                <button type="submit" class="btn btn-primary"> Search</button>
                            </span>
        </div>
    </form>
    <h3 style="text-align: center">Register </h3>
    <p></p>
    <form method="post" action="/date">
        {{ csrf_field() }}
        Date:<input type="date" name="date" required>
        <input type="submit" value="submit"
               class="btn btn-primary btn-sm" style="margin-left: 0px">
    </form>

</div>
<p></p>
<div class="container">
    <h2>Selected Date:{{$date}}</h2>
</div>

<div class="container">
    {!! $chart->container() !!}
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
{!! $chart->script() !!}
</body>
</html>
