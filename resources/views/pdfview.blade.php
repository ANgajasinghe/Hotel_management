<style type="text/css">
    table,
    td,
    th {
        border: 1px solid #ddd;
        text-align: left;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 15px;
    }

    .avatar {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

</style>


<div class="container">


    <br/>
    <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>

    <h3>All Employees List On
        <table>
            <tr>
                <th></th>
                <th><b>Avatar</b></th>

                <th><b>Rrgistaion NO</b></th>
                <th><b>Type</b></th>
                <th><b>Name</b></th>
                <th><b>Email</b></th>
                <th><b>Telephone No</b></th>
            </tr>
            @foreach ($items as $key => $row)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td><a href="{{ asset ('uploads/appsetting/'.$row->image) }}">Avatar</a></td>
                    <th><b>{{$row->id}}</b></th>
                    <td>{{$row->type}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->Email}}</td>
                    <td>{{$row->tp}}</td>
                </tr>
            @endforeach
        </table>


</div>
