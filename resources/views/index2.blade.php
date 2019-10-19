<!doctype html>
<html>

<style>
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {

  padding: 8px 18px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 16px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<head><title>PetersPlace</title>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all'/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="/u">Utility Bills</a>
  <a href="/rep">Reports</a>

</div>
<br>

<span style="font-size:20px;cursor:pointer; padding-top: 200px " onclick="openNav()">&#9776; Finance Management</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<div id="main">
    <nav>

        <ul style="display: inline-block">
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a>
            <li><a href="#">About</a></li>
            <li><a href="#">Update</a></li>
            <li><a href="#">Search</a></li>

        </ul>
    </nav>
</div>

@extends('layout')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h1>Utility Details</h1>
            <a href= "{{ url('dynamicVisna/pdf') }}" class="btn btn-warning">PDF</a>
            <br>
            <br>
        </div>
        <div class="col-md-4">
            <form action="/search3" method="get" >
                <div class="input-group">
                    <input type="search" name="search3" class="form-control" placeholder="Search by Date">
                    <span class="input-group-prepend">
					<button type="submit" class="btn btn-primary">Search</button>
				</span>
                </div>
            </form>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{ action('utilitycontroller@create') }}" class="btn btn-primary">Add Details</a>
        </div>
    </div>


    <form method="post">
        @csrf
        @method('DELETE')
        <button formaction="/deleteall3" type="submit" class="btn btn-danger">Delete All Selected</button>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="230"></th>
                <th width="230">ID</th>
                <th width="230">Type</th>
                <th width="230">Date</th>
                <th width="230">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utilities as $utility)
                <tr>
                    <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $utility->id}}"></td>
                    <td>{{ $utility->id }}</td>
                    <td>{{ $utility->type }}</td>
                    <td>{{ $utility->date }}</td>
                    <td>{{ $utility->amount }}</td>

                    <td>
                        <a href="{{ action('utilitycontroller@edit', $utility->id) }}"
                           class="btn btn-warning">UPDATE</a>
                        <button formaction="{{ action('utilitycontroller@destroy', $utility->id)}}" type="submit"
                                class="btn btn-danger">DELETE
                        </button>

                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
    </form>



    <script type="text/javascript">
        $('.selectall').click(function () {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall2').prop('checked', $(this).prop('checked'));
        });
        $('.selectall').click(function () {
            $('.selectbox').prop('checked', $(this).prop('checked'));
            $('.selectall').prop('checked', $(this).prop('checked'));
        });
        $('.selectbox').change(function () {
            var total = $('.selectbox').length;
            var number = $('.selectbox:checked').length;
            if (total == number) {
                $('.selectall').prop('checked', true);
                $('.selectall2').prop('checked', true);
            } else {
                $('.selectall').prop('checked', false);
                $('.selectall2').prop('checked', false);
            }
        })
    </script>

@endsection
</body>
