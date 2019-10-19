<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Supplier</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script>
        function formValidation() {
            var name = document.getElementById('name');
            var email = document.getElementById('email');
            var item = document.getElementById('item');
            var acc = document.getElementById('acc');
            // if (firstName.value.length == 0) {
            //     document.getElementById('firstName').innerText = " * All Fields are mandatory";
            //     firstName.focus();
            //     if (mName.value.length == 0) {
            //         document.getElementById('mName').innerText = " * All Fields are mandatory";
            //         mName.focus();
            //         if (age.value.length == 0) {
            //             document.getElementById('age').innerText = " * All Fields are mandatory";
            //             age.focus();
            //             return false;
            //         }
            //     }
            // }

            if (inputAlphabet(name, " * Please enter a valid name*", 'p1')) {
                if (emailValidation(email, " * Please enter a valid Email * ", 'p2')) {
                    if (itemValidation(item, " * Please enter a valid item*", 'p3')) {
                        if (AccValidation(acc, " * Please enter a valid account no. * ", 'p4')) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }

            }

            function inputAlphabet(inputtext, alertmsg, elem) {
                var alphaExp1 = /^[a-zA-Z]+$/;

                if (inputtext.value.match(alphaExp1)) {
                    return true;
                } else {
                    document.getElementById(elem).innerText = alertmsg;
                    inputtext.focus();
                    return false;
                }
            }

            function emailValidation(inputtext, alertmsg, elem) {

                var email = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                if (inputtext.value.match(email)) {

                    return true;
                } else {
                    document.getElementById(elem).innerText = alertmsg;
                    inputtext.focus();
                    return false;
                }
            }

            function itemValidation(inputtext, alertmsg, elem) {
                var alphaExp2 = /^[a-zA-Z]+$/;

                if (inputtext.value.match(alphaExp2)) {
                    return true;
                } else {
                    document.getElementById(elem).innerText = alertmsg;
                    inputtext.focus();
                    return false;
                }
            }


            function AccValidation(inputtext, alertmsg, elem) {
                var acc = /^[0-9]+$/;
                if ((inputtxt.value.match(acc))) {
                    return true;
                } else {
                    document.getElementById(elem).innerText = alertmsg;
                    inputtext.focus();
                    return false;
                }
            }
        }

    </script>
    <!-- Styles -->
    <style>
        body {
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
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

        form {
            border: 1px solid black;
            border-radius: 15px;
            width: auto;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            margin-top: 71px;
            margin-bottom: auto;
            background-color: #cc9900;
            margin-block-start: 38px;
        }

        #date {
            padding: 3px;
            width: 189px;
            margin-left: 41px;
        }

        #name {
            padding: 5px;
            width: auto;
            margin-left: 41px;
        }

        #email {
            padding: 5px;
            width: auto;
            margin-left: 41px;
        }

        #supType {
            padding: 6px;
            width: 189px;
            margin-left: 41px;
        }

        #acc {
            padding: 5px;
            width: auto;
            margin-left: 41px;
        }

        #bank {
            padding: 5px;
            width: 189px;
            margin-left: 41px;
        }

        #item {
            padding: 5px;
            width: auto;
            margin-left: 41px;
        }


        #button {
            width: 100px;
            height: 35px;
            border: 1px solid rgb(51, 51, 56);
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;
            margin-left: auto;
            margin-top: 19%;
        }

        #button:hover {
            background-color: rgb(39, 42, 201);
            color: rgb(255, 253, 253);
        }

        #button1 {
            width: 100px;
            height: 35px;
            border: 1px solid rgb(51, 51, 56);
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;
            margin-left: 57px;
            margin-top: 21px;
        }

        #button1:hover {
            background-color: rgb(39, 42, 201);
            color: rgb(255, 253, 253);
        }


        td {
            margin-left: 15%;
            margin-top: 7%;
            padding-bottom: 7px;
        }

        input {
            margin-left: auto;
            width: auto;
        }

        select {
            margin-left: auto;
            width: auto;
        }

        table {
            margin-left: 22px;
            margin-top: 7%;
            width: auto;

        }

        h5.topic {
            font-family: Impact, Charcoal, sans-serif;
            font-size: 26px;
            margin-top: 24px;
            margin-left: 36px;


        }

        #supT {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: auto;
        }

        .sup1 {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 18px;
            width: auto;
            margin-left: -22px;
            margin-right: 6px;
        }

        .inputT {
            width: auto;

        }

        .container {
            margin-left: 16px;

        }

    </style>
</head>
<div class="topnav">
    <a class="active" href="#sup">Suppliers</a>
    <a href="/orderFinal">Orders</a>
    <a href="/expenditureFinal">Reports</a>
</div>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <form class="sup1" onsubmit="return formValidation()" method="post" action="/savesup"
                  style="background-color: #3495e3">
                @csrf
                {{csrf_field() }}
                <h5 class="topic">Create Suppliers</h5>
                <table class="table-responsive-sm" style="margin-left:15px">
                    <div class="data">
                        <tr>
                            <td>Supplier Name</td>
                            <td><input type="text" id="name" placeholder="Enter Name" name="suppName" required></td>
                            <p id="p1"></p>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" id="email" placeholder="Enter Email" name="email" required></td>
                            <p id="p2"></p>
                        </tr>
                        <tr>
                            <td>Supplier Type</td>
                            <td><select id="supType" name="suptype">
                                    <option value="food">Food</option>
                                    <option value="EventPro">Event Products</option>
                                    <option value="Infra">Infrastructure</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Item</td>
                            <td><input type="text" id="item" placeholder="Enter Item" name="item" required></td>
                            <p id="p3"></p>
                        <tr>
                            <td>Inactive Date</td>
                            <td><input type="date" id="date" name="date"></td>
                        </tr>
                        <tr>
                            <td>Bank Name</td>
                            <td>
                                <select id="bank" name="bank">
                                    <option value="sampath">Sampath Bank</option>
                                    <option value="peoples">Peoples' Bank</option>
                                    <option value="boc">BOC</option>
                                    <option value="nsb">NSB</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Bank Account No</td>
                            <td><input type="text" id="acc" placeholder="Enter Account No" name="accNo" required>
                            </td>
                            <p id="p4"></p>
                        </tr>


                        <tr>
                            <td>
                                <button class="btn btn-danger" id="button" value="goBtn" type="reset">Clear</button>
                            </td>
                            <td>
                                <button class="btn btn-primary" id="button1" value="clearBtn" type="submit">Insert
                                </button>
                            </td>
                        </tr>
                    </div>
                </table>
            </form>
        </div>
        <div class="col-sm-12 col-md-8">
            <table id="supT" class="table table-dark" style="margin-left: 15px;">
                <th class="sup1" scope="col">Id</th>
                <th class="sup1" scope="col">Name</th>
                <th class="sup1" scope="col">Email</th>
                <th class="sup1" scope="col">Type</th>
                <th class="sup1" scope="col">Item</th>
                <th class="sup1" scope="col">ED date</th>
                <th class="sup1" scope="col">Bank Name</th>
                <th class="sup1" scope="col">Account No</th>

                @foreach($supplier as $sup)
                    <tr>
                        <td class="sup1">{{$sup ->id}}</td>
                        <td class="sup1">{{$sup ->name}}</td>
                        <td class="sup1">{{$sup ->email}}</td>
                        <td class="sup1">{{$sup ->type}}</td>
                        <td class="sup1">{{$sup ->item}}</td>
                        <td class="sup1">{{$sup ->inac_date}}</td>
                        <td class="sup1">{{$sup ->bank}}</td>
                        <td class="sup1">{{$sup ->acc_no}}</td>
                        <td class="sup1"><a href='{{url("/savesup/{$sup -> id}{$sup->data}")}}' class="btn btn-success"
                                            id="button" value="goBtn">Update</a></td>
                        <td class="sup1"><a href='{{url("/deletesup/{$sup -> id}")}}' class="btn btn-warning"
                                            id="button">Delete</a>
                        </td>
                    </tr>

                @endforeach


            </table>
        </div>
    </div>
</div>
</body>

</html>
