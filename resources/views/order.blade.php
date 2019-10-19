<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" media="all"/>

</head>

<body>
<form action="/action_page.php">
    <div class="container">
        <h1>Orders</h1>
        <hr>
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

        <button type="submit" class="btn btn-primary">Make Order</button>
        <button type="submit" class="btn btn-warning">Clear</button>
    </div>
</form>

</body>

</html>
