<!doctype html>
<html>
<head><title>PetersPlace</title>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all'/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


@extends('layout')

@section('content')


    <div class="row">
        <div class="col-md-6">
            <h1>Utility Details</h1>
            <a href= "{{ url('dynamic/pdf') }}" class="btn btn-danger"> Convert into PDF </a>
            <br>
            <br>
        </div>



    </div>
    <form method="post">
        @csrf


        <br>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>

                <th width="230">ID</th>
                <th width="230">Type</th>
                <th width="230">Date</th>
                <th width="230">Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($utilities as $utility)
                <tr>

                    <td>{{ $utility->id }}</td>
                    <td>{{ $utility->type }}</td>
                    <td>{{ $utility->date }}</td>
                    <td>{{ $utility->amount }}</td>

                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
    </form>

@endsection
</body>

