<html>

<head>


    <title>Lost and Found</title>

    <link href="css\f.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>


@foreach($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
        {{$error}}

    </div>

@endforeach


<h1>Lost and Found Items</h1>
<div class="container">
    <div class="jumbotron">
        <form action="{{ route('addimage') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label>Item Type</label>
                <input type="text" name="typo" class="form-control" placeholder="Enter Type">
            </div>

            <div class="form-group">
                <label>Place</label>
                <input type="text" name="place" class="form-control" placeholder="Enter place">
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="Description" class="form-control" placeholder="Enter descroption">
            </div>

            <label>Image</label>
            <div class="input-group">
                <div class="custon-file">
                    <input type="file" name="image" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <br/>
            <br/>

            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
</body>

</html>
