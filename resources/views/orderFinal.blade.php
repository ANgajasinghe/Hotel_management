<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
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
    <a class="active" href="/orderFinal">Orders</a>
    <a href="/expenditureFinal">Reports</a>
</div>

<body>
<div class="jumbotron text-center" style="padding-top: 50px;padding-bottom: 45px;background-color: #3495e3">
    <h1>Orders</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <label for="suppNo" name="suppNo">
                <h4><b>Supplier Number:</b></h4>
            </label>
            <select class="select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select></br></br></br>
            <lable for="supName" name="supName">
                <h4><b>Supplier Name:</b></h4>
            </lable>

            <lable name="supname"></lable>
            </br></br>

            <lable for="item" name="item">
                <h4><b>Item:</b></h4>
            </lable>
            <lable name="supitem"></lable>
            </br></br>
            <lable for="amount" name="amount">
                <h4><b>Needed Amount:</b></h4>
            </lable>
            <input type="text" placeholder="Enter Amount" name="amount" required>
            </br></br></br>

            <button type="submit" class="btn btn-primary" style="margin-left: 160px;margin-right: 82px">Make Order
            </button>
            <button type="submit" class="btn btn-warning">Clear</button>
            </form>
        </div>
        <div class="col-sm-4">
            <h4>Inventory Orders</h4>
            <table class="table table-danger">
                <th>Item</th>
                <th>Quantity</th>
                <tr>
                    <td>rice</td>
                    <td>50kg</td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>

</html>
