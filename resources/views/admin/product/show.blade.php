<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Record</title>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>price</th>
                    <th>weight</th>
                    <th>height</th>
                    <th>color</th>
                    <th>Quantity</th>
                    <th>status</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($pro as $pro )
                <tr>
                    <td>{{ $pro->name }}</td>
                    <td>{{ $pro->description }}</td>
                    <td>{{ $pro->price }}</td>
                    <td>{{ $pro->weight}}</td>
                    <td>{{ $pro->height }}</td>
                    <td>{{ $pro->color }}</td>
                    <td>{{ $pro->qty }}</td>
                    <td>{{ $pro->status }}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modelId{{ $pro->id }}">
                       Gallery
                        </button>
                        <div class="modal fade" id="modelId{{ $pro->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                          @php
                              $img = DB::table('product_images')->where('product_id' , $pro->id)->get();
                          @endphp
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title">Gallery</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                           @foreach (  $img as   $img)
                                             <img src="{{ $img->image }}" alt="" height="60px">
                                           @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $('#exampleModal').on('show.bs.modal', event => {
                                var button = $(event.relatedTarget);
                                var modal = $(this);
                                // Use above variables to manipulate the DOM

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
