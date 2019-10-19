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
            <h1>Report Details</h1>
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
                <th width="230"></th>
                <th width="230">NIC</th>
                <th width="230">Name</th>
                <th width="230">Type of amount</th>
                <th width="230">Amount</th>
                <th width="230">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reports_visnas as $reports_visna)
                <tr>
                    <td>{{ $reports_visna->nic }}</td>
                    <td>{{ $reports_visna->name }}</td>
                    <td>{{ $reports_visna->type }}</td>
                    <td>{{ $reports_visna->date }}</td>
                    <td>{{ $reports_visna->amount }}</td>

                </tr>
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
    </form>

@endsection
</body>


