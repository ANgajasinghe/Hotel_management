<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet/>
    <link href=" {{ URL::asset('css/styles.css') }}"rel="stylesheet" media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>
<form action="/action_page.php">
    <div class="container">
        <h1>Orders</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 bg-success">
                    <label for="suppNo"><b>Supplier Number:</b></label>
                    <select class="select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select></br></br></br>
                    <lable for="supName"><b>Supplier Name:</b></lable>
                    </br></br></br>

                    <lable for="item"><b>Item:</b></lable>
                    </br></br>
                    <lable for="amount"><b>Needed Amount:</b></lable>
                    <input type="text" placeholder="Enter Amount" name="amount" required>
                    </br></br></br>

                    <button type="submit" class="makeOrder">Make Order</button>
                    <button type="submit" class="clearbtn">Clear</button>
                </div>
                <div class="col-sm-4 bg-warning">
                    <div class="container1">
                        <lable for="item"><b>Item:</b></lable>
                        </br></br>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

</body>

</html>
