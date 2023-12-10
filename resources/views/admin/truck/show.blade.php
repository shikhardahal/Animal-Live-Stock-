<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Record</title>
    <!-- Include DataTables CSS and JavaScript files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<body>
    @include('admin.layout.header')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <table id="userTable" class="display">
            <!-- Table headers here -->
            <thead>
                <tr>
                    <th>Truck</th>
                    <th>manufacture</th>
                    <th>capacity</th>
                    <th>Availability</th>
                    <th>Description</th>
                    <th>Image</th>


                </tr>
            </thead>
            <tbody>
              @foreach ($trucks as $truck)
                <tr>
                    <td>{{ $truck->truck_name }}</td>
                    <td>{{ $truck->manufacture }}</td>
                    <td>{{ $truck->capacity }}</td>
                    <td>{{ $truck->availability }}</td>
                    <td>{{ $truck->comments }}</td>
                    <td><img src="{{ $truck->image }}" alt="{{ $truck->image }}" height="60px"></td>
                </tr>
              @endforeach

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();

            // Add search functionality
            $('#searchInput').on('keyup', function() {
                $('#userTable').DataTable().search(this.value).draw();
            });
        });
    </script>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
