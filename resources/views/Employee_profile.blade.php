<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 200px;
            text-align: center;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 20px;
            color: black;
        }

        button:hover,
        a:hover {
            opacity: 0.7;
        }

        img.img-circle {
            width: 120px;
            height: 120px;
            border: 2px solid #51D2B7;
        }

    </style>
    <script language="javascript">
        document.onmousedown = disableclick;
        status = "Right Click Disabled";
        Function;
        disableclick(event);
        {
            if (event.button == 2) {
                alert(status);
                return false;
            }
        }

    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        window.onload = setInterval(clock, 1000);

        function clock() {
            var d = new Date();
            var date = d.getDate();
            var year = d.getFullYear();
            var month = d.getMonth();
            var monthArr = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                "October", "November", "December"
            ];
            month = monthArr[month];
            document.getElementById("date").innerHTML = date + " " + month + ", " + year;
        }

        function tabE(obj, e) {
            var e = (typeof event != 'undefined') ? window.event : e; // IE : Moz
            if (e.keyCode == 13) {
                var ele = document.forms[0].elements;
                for (var i = 0; i < ele.length; i++) {
                    var q = (i == ele.length - 1) ? 0 : i + 1; // if last element : if any other
                    if (obj == ele[i]) {
                        ele[q].focus();
                        break
                    }
                }
                return false;
            }
        }

    </script>

</head>

<body oncontextmenu="return false">


<div class="container" style="margin-top:20px">
    <div class="row ">
        <div class=col-4>
            <img class="img-circle" src="FakeDP.jpeg" style="margin-left:100px"/>
            <p></p>
            <div class="list-group">
                <li class="list-group-item active">
                    My Profile
                </li>
                <li class="list-group-item">ID-E000</li>
                <li class="list-group-item">Ranil Ramanayaka</li>
                <li class="list-group-item">RanilRamanayaka@gamail.com</li>
                <li class="list-group-item">214/33,makandana ,Madapath.</li>
                <li class="list-group-item">941132225454V</li>
                <li class="list-group-item">0755784255</li>
                <button type="button" class="list-group-item list-group-item-action" disabled></button>
            </div>
        </div>
        <div class="col-8">

            <h3 style="margin-top:130px">Today:<h3 id="date">Today</h3>

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                        </ul>
                        @endforeach

                    </div>
                @endif

                <form method="post" action="/addleave">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="text" class="col-4 col-form-label">Enter Your Register No</label>
                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                </div>
                                <input id="ID" name="ID" onkeypress="return tabE(this,event)" placeholder="E001"
                                       type="text" class="form-control" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Name</label>
                        <div class="col-8">
                            <input id="name" name="name" onkeypress="return tabE(this,event)"
                                   placeholder="Ranil Ramanayaka" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Employee_type" class="col-4 col-form-label">Type</label>
                        <div class="col-8">
                            <input type="radio" name="type" onkeypress="return tabE(this,event)" value="normal"
                                   checked>
                            NORMAL<br>
                            <input type="radio" name="type" onkeypress="return tabE(this,event)" value="admin">
                            ADMIN<br>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="today" class="col-4 col-form-label">Requesting Date</label>
                        <div class="col-8">
                            <input id="today" name="today" onkeypress="return tabE(this,event)"
                                   placeholder="2002-10-02" type="text" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text1" class="col-4 col-form-label">Leaving Date</label>
                        <div class="col-8">
                            <input id="Date" name="Date" onkeypress="return tabE(this,event)"
                                   placeholder="2002-10-10" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text2" class="col-4 col-form-label">No Of Days</label>
                        <div class="col-8">
                            <input id="#days" name="#days" onkeypress="return tabE(this,event)" placeholder="2"
                                   type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="leavetype" class="col-4 col-form-label">Leave Type</label>
                        <div class="col-8">
                            <select id="leavetype" onkeypress="return tabE(this,event)" name="leavetype"
                                    class="custom-select">
                                <option value="Annual">Annual Leave</option>
                                <option value="Casual">Casual Leave</option>
                                <option value="Medical">Medical Leave</option>
                                <option value="Nopay">Nopay</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

                @if (session('store'))
                    <div class="alert alert-success" role="alert">

                        Your Request is SUCCESS
                        <strong> {{ session('update') }} </strong>
                    </div>
        </div>
        @endif

    </div>
</div>
</div>

</body>

</html>
