<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div style="width: 70%; margin: 25px auto">
    <h1 style="text-align: center">Get Weather info</h1>
    <form method="GET" action="{{ route('findCountry') }}">
        <div class="input-group col-sm-3" style="display: flex; flex-direction: row; margin: 20px 0px">
            <input id="name" type="text" class="form-control" name="countryName" placeholder="Country Name">
            <button id="filterBtn" class="btn">search</button>
        </div>
    </form>

    <table id="example" class="display" width="100%"></table>
</div>
</body>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            data: {!! $data !!},
            searching: false,
            bInfo: false,
            bLengthChange: false,
            columns: [
                {title: "Time"},
                {title: "Name"},
                {title: "Latitude"},
                {title: "Longitude."},
                {title: "Temp (in Celsius)"},
                {title: "Pressure"},
                {title: "Humidity"},
                {title: "Temp Min"},
                {title: "Temp Max"}
            ]
        });
    });
</script>

</html>


