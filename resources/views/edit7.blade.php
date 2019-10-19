<!doctype html>
<html>

<head>
    <title>PetersPlace</title>
    <link href="{{ URL::asset('css/pay.css')}}" rel='stylesheet' media='all'/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
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
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @foreach($reports_visnas as $reports_visna)
                <form action="{{ action('reportVisnacontroller@update', $reports_visna->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nic</label>
                        <input class="form-control" type="text" name="nic" value="{{ $reports_visna->nic}}">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input class="form-control" type="text" name="name" value="{{ $reports_visna->name}}">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input class="form-control" type="text" name="type" value="{{ $reports_visna->type}}">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input class="form-control" type="date" name="date" value="{{ $reports_visna->date}}">
                    </div>
                    <div class="form-group">
                        <label>Month</label>
                        <input class="form-control" type="month" name"month" value"{{ $reports_visna->month}}">
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input class="form-control" type="number" name="amount" value="{{ $reports_visna->amount}}">
                    </div>

                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="{{ action('reportVisnacontroller@index') }}" class="btn btn-default">Back</a>
                </form>
            @endforeach
        </div>
    </div>
@endsection

</body>

