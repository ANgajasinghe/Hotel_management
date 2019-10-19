<html>

<head>

    <title>Update Room Status</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>

<div class="form-group">
    <fieldset>
        {{csrf_field()}}


        <legend>Room Status</legend>

        <div class="foo b"></div>
        <input type="checkbox" checked="checked" name="ch1">Clean<br/><br/>
        <div class="foo p"></div>
        <input type="checkbox" checked="checked" name="ch2">Dirty<br/><br/>
        <div class="foo w"></div>
        <input type="checkbox" checked="checked" name="ch3">Out of Service<br/><br/>


    </fieldset>
    </form><br/><br/>
</div>

<h1>Update Houskeeping Status</h1>


<span class="limiter">
        <span class="container-table100">

            <div class="wrap-table100">
                <div class="table100">
                    <table>


                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Task</th>
                                    <th scope="col">RoomNo</th>
                                    <th scope="col">RoomType</th>

                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>



                            @foreach($up as $stat)

                                <tbody>
                                <tr>
                                    <td>{{$stat->room_no}}</td>
                                    <td> {{$stat->floor}}</td>
                                    <td>{{$stat->availability}}</td>
                                    <td>{{$stat->status}}</td>





                                    <td class="dropdown">
                                        <a>Update</a>


                                        <select>
                                            <option value="volvo">Clean</option>
                                            <option value="saab">Dirty</option>
                                            <option value="opel">Out of Service</option>
                                        </select>
                                    </td>
                                </tr>



                                @endforeach



                            </tbody>
                        </table>
                </div>
            </div>
        </span>
    </span>


</body>

</html>
