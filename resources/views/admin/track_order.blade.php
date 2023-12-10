<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Record</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<body>
    <!-- Include your header if needed -->
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
                    <th>Current Location</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Action</th>

                </tr>
            </thead>
            @php
                if(session()->has('id')){
                    $id = session('id');
                    $tracks = DB::table('track')
                    ->join('send_an_offer','send_an_offer.id' ,'=','track.offer_id')
                    ->where('send_an_offer.user_id' , $id)->get();
                }
            @endphp
            <tbody>

                @foreach ($tracks as $track)
                <tr>
                    <td>{{ $track->location }}</td>
                    <td>{{ $track->lat }}</td>
                    <td>{{ $track->long }}</td>
                    <td>
                         <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modelId{{ $track->id }}">
                           View Location
                         </button>
                         <div class="modal fade" id="modelId{{ $track->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title">Location</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
                                            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                                            <script src="https://unpkg.com/leaflet-control-geocoder@1.13.0/dist/Control.Geocoder.js"></script>
                                        </head>
                                        <body>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="latitude">Latitude:</label>
                                                    <input type="text" disabled id="latitude" name="latitude" value="{{ $track->lat }}" style="width: 100%; margin-bottom: 10px;">
                                               </div>
                                               <div class="col-md-6">

                                                <label for="longitude">Longitude:</label>
                                                <input type="text" disabled id="longitude" name="longitude" value="{{ $track->long }}" style="width: 100%; margin-bottom: 10px;">

                                               </div>
                                            </div>


                                            <div id="map" style="height: 400px;"></div>

                                            <script>
                                                var map = L.map('map').setView([0, 0], 8);

                                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                    maxZoom: 19,
                                                }).addTo(map);

                                                var inputLatitude = document.getElementById('latitude');
                                                var inputLongitude = document.getElementById('longitude');

                                                function updateMapFromInput() {
                                                    var lat = parseFloat(inputLatitude.value);
                                                    var lon = parseFloat(inputLongitude.value);

                                                    if (!isNaN(lat) && !isNaN(lon)) {
                                                        map.setView([lat, lon], 16);
                                                    }
                                                }

                                                inputLatitude.addEventListener('input', updateMapFromInput);
                                                inputLongitude.addEventListener('input', updateMapFromInput);
                                            </script>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                         </div>
                         <script>
                            $('#exampleModal').on('show.bs.modal', event => {
                                var button = $(event.relatedTarget);
                                var modal = $(this);
                            });
                         </script>
                    </td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
