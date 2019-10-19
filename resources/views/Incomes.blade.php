<!doctype html>
<html>
<head><title>PetersPlace</title>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all'/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

@extends('layout1')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h1>Income Details</h1>
            <a href= "{{ url('income/pdf') }}" class="btn btn-danger"> Convert into PDF </a>
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
            <tr style="background-color:#4D6D9A">
                <th style="width: 60px">Arrival</th>
                <th style="width: 80px">Room No</th>
                <th style="width: 80px">Payment</th>
            </tr>
            </thead>
            <tbody>
            @foreach($accoms as $accom)
                <tr>
                    <td>{{ $accom->arrival_date }}</td>
                    <td>{{ $accom->room_no }}</td>
                    <td>{{ $accom->payment }}</td>
                </tr>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->mid }}</td>
                        <td>{{ $event->total}}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
            <tfoot>

            </tfoot>

        </table>
    </form>

@endsection
</body>
