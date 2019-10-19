<!DOCTYPE html>
<html lang="en">

<head>
    <title>Peter's Place Hotel || Online Room Reservation</title>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" media="all"/>
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" media="all"/>
    <link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet"/>

    <style>
        #t {
            margin-top: 5%;
            font-family: Arial, Helvetica, sans-serif;
        }

        /*
        #f {
            margin-top: 2%;
        }
        */

        #f label {
            margin-top: 4%;
        }

        #s label {
            margin-top: 3.5%;
        }
    </style>

    <!--Materialize CSS-->

    <!--Compiled and minified CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Compiled and minified JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
</head>

<body>
<div class="banner-top" id="home">
    <div class="col-sm-10">
        <div class="social-bnr-agileits">
            <ul class="social-icons3">
                <li id="homebtn">
                    <button class="btn" onclick="window.location='{{ url('/') }}'"><i class="fa fa-home"></i> Home
                    </button>
                </li>

                <li id="fb">
                    <a href="https://www.facebook.com/petersplace.hiriketiya/"
                       class="fa fa-facebook icon-border facebook" target=_blank></a>
                </li>

                <div class="contact-bnr-w3-agile" id="cont">
                    <ul>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>info@petersplace.lk</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>+94 (41)225-74-66</li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>

    <div class="col-sm-2">
        <div class="top-right links" id="si">
            <a href="{{ url('/login') }}">Sign in</a>
        </div>
    </div>

    <div class="clearfix"></div>
</div>

<div class="page">
    <div class="container" id="contain">
        <h3 class="title-w3-agileits title-black-wthree" id="t">Room Reservation</h3>

        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                </ul>
                    @endforeach
            </div>
        @endif

        <form method="post" action="/reserve_online">
            {{ csrf_field() }}

            <div class="form-border">
                <div class="row" id="res_row">
                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-primary" id="f">
                            <div class="panel-heading">
                                PERSONAL INFORMATION
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input name="fname" type="text" class="form-control"
                                           value="{{ old('fname') }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input name="lname" type="text" class="form-control"
                                           value="{{ old('lname') }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input name="phone" type="text" class="form-control"
                                           value="{{ old('phone') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="panel panel-primary" id="s">
                            <div class="panel-heading">
                                RESERVATION INFORMATION
                            </div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <label id="select_label">Room Type</label>

                                <!--
                                    <select name="rtype" class="form-control">
                                        <option value="1" @if (old('rtype') == '1') selected @endif>Single Bedroom
                                        </option>
                                        <option value="2" @if (old('rtype') == '2') selected @endif>Double Bedroom
                                        </option>
                                        <option value="3" @if (old('rtype') == '3') selected @endif>Family Bedroom
                                        </option>
                                    </select>
                                    -->

                                    <select name="rtype" class="form-control">
                                        @foreach ($rt as $item)
                                            @if (isset($item))
                                                <option value="{{ $item->id }}" @if (old('rtype') == '{{ $item->id }}')
                                                selected @endif>{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Check In</label>
                                    <input name="cin" type="date" class="form-control" value="{{ old('cin') }}"/>
                                </div>

                                <div class="form-group">
                                    <label>Check Out</label>
                                    <input name="cout" type="date" class="form-control" value="{{ old('cout') }}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="buttonHolder">
                    <input type="submit" name="submit" class="btn btn-primary" value="Reserve Room"/>
                </div>
            </div>
        </form>

        <div class="clearfix"></div>
    </div>
</div>
</body>

</html>
