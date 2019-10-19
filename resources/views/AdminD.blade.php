@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome Admin</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3" style="background-color: #2C3E50 ">
                                    <div class="container-fluid" style="margin-top: 15px">
                                        <a href="{{url('/Emanagement') }}">
                                            <table class="table"
                                                   style="width:300px;height:100px; margin-left: 0px;margin-top:20px">
                                                <thead class="thead-dark">
                                                <tr class="btn" style="">
                                                    <th class="text-center" scope="row"
                                                        style="width:300px ; height:10px">HR MANAGEMENT
                                                    </th>
                                                </tr>

                                                </thead>
                                            </table>
                                        </a>

                                        <a href="{{url('/room_management') }}">
                                            <table class="table"
                                                   style="width:300px ; margin-left: 0px; margin-top:-40px;">
                                                <thead class="thead-dark">
                                                <tr class="btn">
                                                    <th class="text-center" scope="row" style="width:300px;height:10px">
                                                        ROOM MANAGEMENT
                                                    </th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </a>
                                        <a href="{{url('/customer')}}">
                                            <table class="table" style="width:300px;margin-left: 0px">
                                                <thead class="thead-dark">
                                                <tr class="btn">
                                                    <th class="text-center" scope="row" style="width:300px;height:10px">
                                                        FRONT OFFICE
                                                    </th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </a>
                                        <a href="{{url('/u')}}">
                                            <table class="table" style="width:300px;margin-left: 0px">
                                                <thead class="thead-dark">
                                                <tr class="btn">
                                                    <th class="text-center" scope="row" style="width:300px;height:10px">
                                                        FINANCIAL MANAGEMENT
                                                    </th>
                                                </tr>
                                                </thead>
                                            </table>
                                            </table>
                                        </a>

                                        <a href="{{url('/eventh')}}">
                                            <table class="table" style="width:300px;margin-left: 0px">
                                                <thead class="thead-dark">
                                                <tr class="btn">
                                                    <th class="text-center" scope="row" style="width:300px;height:10px">
                                                        EVENT MANAGEMENT
                                                    </th>
                                                </tr>
                                                </thead>
                                            </table>
                                            </table>
                                        </a>

                                        <a href="{{url('/vie2')}}">
                                            <table class="table" style="width:300px;margin-left: 0px">
                                                <thead class="thead-dark">
                                                <tr class="btn">
                                                    <th class="text-center" scope="row" style="width:300px;height:10px">
                                                        HOUSEKEEPING MANAGEMENT
                                                    </th>
                                                </tr>
                                                </thead>
                                            </table>
                                            </table>
                                        </a>

                                        <a href="{{url('/supplier')}}">
                                            <table class="table" style="width:300px;margin-left: 0px">
                                                <thead class="thead-dark">
                                                <tr class="btn">
                                                    <th class="text-center" scope="row" style="width:300px;height:10px">
                                                        SUPPLIER MANAGEMENT
                                                    </th>
                                                </tr>
                                                </thead>
                                            </table>
                                            </table>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-2" style="margin-left: 230px;margin-top: 60px">
                                    <img src="{{ asset ('uploads/appsetting/loho.jpg') }}"
                                         style="  width: 200px;height: 200px;border: 2px solid #51D2B7;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
