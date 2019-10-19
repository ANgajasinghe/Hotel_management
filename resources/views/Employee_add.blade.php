<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css">
    <title>Document</title>

    <style>
        .btn {

            border: none;
            color: black;
            padding: 5px 5px;
            text-align: center;
            font-size: 20px;
            margin: 4px 5px 0px 50px;
            transition: 0.3s;
        }

        .btn:hover {
            width: 100;
            background-color: #3e8e41;
            color: white;
        }

        ul .my {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #435E7c;
            width: 50%;
        }

        li.my2 {
            float: left;
        }

        li a {
            height: 50px;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 11px;
            text-decoration: none;
        }

        /* Change the link color to #111 (black) on hover */
        li a:hover {
            background-color: #111;
        }

        .colum-layout1 {
            max-width: 1300px;
            margin: 40px auto 0 auto;
            padding: auto;
            display: flex;
            align-items: flex-start;

        }

        .main-column1 {
            flex: 0.5;
            margin-right: 40px;

        }

        .second-column1 {
            flex: 1;

        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: white;
        }

        td,
        th {
            padding: 6px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .my-custom-scrollbar {
            position: relative;
            height: 700px;
            overflow: auto;

        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .center {
            text-align: center;

        }

    </style>
</head>

<body>

<!-- Grid row pic zoom hover code -->


<!-- Grid column ---hover code for pic ---
        <div class="col-md-6 mb-4">

            <div class="view overlay hm-zoom">
                <img src="Capture.PNG">
            </div>
        </div>

-->


<!--table navigation-->

<div class="container-fluid">
    <div class="row">
        <div class="col-3" style="background-color: #2C3E50 ">
            <div class="container-fluid" style="margin-top: 200px;">
                <div class="center">

                    <a href="{{url('/home') }}"><img style="margin-top:-10ch;width: 100px; height: 100px;"
                                                     src="{{ asset ('uploads/home.png') }}"></a>
                </div>
                <a href="{{url('/Emanagement') }}">
                    <table class="table" style="width:300px;height:100px; margin-left: 0px;margin-top:10px">
                        <thead class="thead-dark">
                        <tr class="btn" style="">
                            <th class="text-center" scope="row" style="width:300px ; height:10px">EMPLOYEE
                                MANAGEMENT
                            </th>
                        </tr>

                        </thead>
                    </table>
                </a>

                <a href="{{url('/Eleave') }}">
                    <table class="table" style="width:300px ; margin-left: 0px ">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px">LEAVE MANAGEMENT
                            </th>
                        </tr>
                        </thead>
                    </table>
                </a>
                <a href="{{url('/Eattendence')}}">
                    <table class="table" style="width:300px;margin-left: 0px">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px">DAILY ATTENDANCE
                            </th>
                        </tr>
                        </thead>
                    </table>
                </a>

                <a href="{{url('/Esalary')}}">
                    <table class="table" style="width:300px;margin-left: 0px">
                        <thead class="thead-dark">
                        <tr class="btn">
                            <th class="text-center" scope="row" style="width:300px;height:10px">SALARY
                                MANAGEMENT
                            </th>
                        </tr>
                        </thead>
                    </table>
                    </table>
                </a>
            </div>

        </div>

        <div class="col-9">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li style="margin-right: auto">{{ $error }}</li>
                        </ul>
                        @endforeach

                    </div>
                @endif
            </div>

            <p></p>
            <b>
                <h4><b><u>Add New Employee To Peater's Place</u></b></h4>
            </b>
            `<p></p>
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <form class="form-group" method="post" action="/AddEmployee" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="image-upload">
                        <label for="file-input">
                            <img src="https://img.icons8.com/wired/64/000000/add-image.png ">
                            <input type="file" onkeypress="return tabE(this,event)" name="image" id="image"
                                   value="{{ old('image') }}"/>
                        </label>
                    </div>
                    <p></p>

                    <div class="form-group row">
                        <label for="Employee_type" class="col-4 col-form-label">Employee Type</label>
                        <div class="col-5">
                            <input type="radio" onkeypress="return tabE(this,event)" name="type"
                                   value="Room Service" @if(old('type')=="Room Service" ) checked="checked"
                                   @endif required="required">Room
                            Service<br>

                            <input type="radio" onkeypress="return tabE(this,event)" name="type"
                                   value="Kitchen Staff" @if(old('type')=="Kitchen Staff" ) checked="checked"
                                   @endif required="required">Kitchen
                            Staff<br>
                            <input type="radio" onkeypress="return tabE(this,event)" name="type" value="Waitress"
                                   @if(old('type')=="Waitress" ) checked="checked"
                                   @endif required="required">Waitress<br>
                            <input type="radio" onkeypress="return tabE(this,event)" name="type" value="Cleaners"
                                   @if(old('type')=="Cleaners" ) checked="checked"
                                   @endif required="required">Cleaners<br>
                            <input type="radio" onkeypress="return tabE(this,event)" name="type" value="Manager"
                                   @if(old('type')=="Manager" ) checked="checked" @endif required="required">Manager<br>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-4 col-form-label">Full Name</label>
                        <div class="col-5">
                            <input id="name" name="name" onkeypress="return tabE(this,event)"
                                   placeholder="Sman Kumara" minlength="3" type="text" class="form-control"
                                   required="required" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nic" class="col-4 col-form-label">National ID NO</label>
                        <div class="col-5">
                            <input id="NIC" name="NIC" onkeypress="return tabE(this,event)" placeholder="975200430V"
                                   minlength="10" type="text" class="form-control" required="required"
                                   value="{{ old('NIC') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label" for="address">Address</label>
                        <div class="col-5">
                            <input id="Address" onkeypress="return tabE(this,event)" name="Address"
                                   placeholder="214,Horana RD,Kesbawa." type="text" class="form-control"
                                   required="required" value="{{ old('Address') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dob" class="col-4 col-form-label">Date of Birth</label>
                        <div class="col-5">
                            <input id="DOB" onkeypress="return tabE(this,event)" name="DOB" placeholder="1998.10.05"
                                   type="date" class="form-control" value="{{ old('DOB') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="DOB" class="col-4 col-form-label">Gender</label>
                        <div class="col-5">
                            <input type="radio" onkeypress="return tabE(this,event)" name="gender" value="Male"
                                   @if(old('gender')=='Male' ) checked="checked" @endif required="required">
                            Male<br>
                            <input type="radio" onkeypress="return tabE(this,event)" name="gender" value="Female"
                                   @if(old('gender')=="Female" ) checked="checked" @endif required="required">
                            Female<br>
                            <input type="radio" onkeypress="return tabE(this,event)" name="gender" value="Other"
                                   @if(old('gender')=="Other" ) checked="checked" @endif required="required"> Other
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dop" class="col-4 col-form-label">Joined Date</label>
                        <div class="col-5">
                            <input id="joindate" onkeypress="return tabE(this,event)" name="joindate"
                                   placeholder="2005.10.05" type="date" class="form-control"
                                   value="{{ old('joindate') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="salary" class="col-4 col-form-label">Salary</label>
                        <div class="col-5">
                            <input id="salary" name="salary" onkeypress="return tabE(this,event)"
                                   placeholder="20000" type="text" class="form-control" required="required"
                                   value="{{ old('salary') }}">
                        </div>
                    </div>

                    <hr size="2" color="black">

                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Email</label>
                        <div class="col-5">
                            <input id="Email" name="Email" onkeypress="return tabE(this,event)"
                                   placeholder="peaterplace@gmail.com" type="email" class="form-control"
                                   required="required" value="{{ old('Email') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tp1" class="col-4 col-form-label">Telephone No.</label>
                        <div class="col-5">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"></div>
                                </div>
                                <input id="tp" name="tp" onkeypress="return tabE(this,event)"
                                       placeholder="011 x xxx xxx" type="number" class="form-control"
                                       required="required" minlength="10" value="{{ old('tp') }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="remark" class="col-4 col-form-label">Remark</label>
                        <div class="col-8">
                            <input id="remark" onkeypress="return tabE(this,event)" name="remark" type="text"
                                   class="form-control" value="{{ old('remark') }}">
                        </div>
                    </div>


                    <div class="form-group row">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<script>
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
