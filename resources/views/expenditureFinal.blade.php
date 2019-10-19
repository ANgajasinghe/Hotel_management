<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expenditures</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="form.css">
    <script src="form.js"></script>
    <style>
        body {
            background-color: #a1cbef;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #3495e3;
            color: white;
        }
    </style>
</head>
<div class="topnav">
    <a href="/supplier">Suppliers</a>
    <a href="/orderFinal">Orders</a>
    <a class="active" href="/expenditureFinal">Reports</a>
</div>

<div class="container" style="margin-top:151px">

    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="form_container">

            <h2>Expenditures</h2>

            <form method="post" action="/save" id="reused_form">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="message" name="item"> Item Type:</label></br>
                        <select style="height:28px" name="item">
                            <option value="food">Food</option>
                            <option value="event">Event Products</option>
                            <option value="infa">Infrastructure</option>
                        </select></br></br>
                        <label for="email" name="amount"> Amount:</label>
                        <input type="text" style="width:175px" class="form-control" id="amount" name="amount" required>
                        </br>
                        <label for="date" name="o_date"> Ordering Date:</label></br>
                        <input type="date" id="date" style="height:32px" name="date">
                        </br></br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 form-group">
                        <button type="reset" class="btn btn-warning" style="margin-left: 60px">Clear</button>

                    </div>
                    <div class="col-sm-6 form-group">
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>
