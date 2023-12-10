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

    @if(session('location'))
        <div class="alert alert-success">
            {{ session('location') }}
        </div>
    @endif
    @if(session('asd'))
        <div class="alert alert-danger">
            {{ session('asd') }}
        </div>
    @endif
<div class="alert alert-warning" role="alert">
    <strong>Keep updating order location so  buyer can see where it order is.</strong>
</div>
    <div class="container">
        <table id="userTable" class="display">
            <!-- Table headers here -->
            <thead>
                <tr>
                    <th>Truck Driver</th>
                    <th>Animal</th>
                    <th>Cost per km</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th>Delivery Status</th>
                </tr>
            </thead>
            @php

            $id = session('id');
            $offers = DB::table('offers')
                ->join('send_an_offer', 'offers.order_id', '=', 'send_an_offer.id')
                ->where('offers.status', 1) // Use integer value instead of '='
                ->where('offers.truck_user_id', $id) // Remove '='
                ->where('offers.delivery_status', 0)
                ->select('offers.id as o_id', 'offers.*', 'send_an_offer.*')
                ->get();

            @endphp

            <tbody>

                @foreach (  $offers as   $offer )
                @php
                    $t_id = $offer->truck_user_id;
                    $p_id = $offer->product_id;
                    $product = DB::table('product')->where('id' , $p_id)->first();
                    $user = DB::table('users')->where('id' , $t_id )->first();
                @endphp
                <tr>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $offer->cost }}</td>
                    <td>{{ $offer->qty }}</td>

              <td style="display: flex;flex-direction: row">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId{{ $offer->id }}">
                  track-order
                </button>













                <!-- Modal -->
                <div class="modal fade" id="modelId{{ $offer->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title">order Location</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                 <form action="{{route('location_update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">location</label>
                                        <input type="text"
                                          class="form-control" name="location" id="location" placeholder="Enter order Current Location">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Latitude</label>
                                            <input type="text"
                                              class="form-control" name="lat" id="lat" placeholder="latitude">
                                            </div>     <div class="form-group">
                                                <label for="">Longitude</label>
                                                <input type="text"
                                                  class="form-control" name="long" id="long" placeholder="Longitude">
                                                </div>
                                        <input type="hidden" value="{{ $offer->id }}" name="offer_id">

                                           <button type="submit" class="btn btn-primary">Add</button>

                                  </div>
                                 </form>
                            </div>
                            <div class="modal-footer">
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

                 <td>
                    @if($offer->delivery_status == 0){
                        <button type="button" class="btn btn-sm btn-danger UpdatEdeliveryStatus">Delivered</button>
                        <input type="hidden" name="did" id="did" value="{{ $offer->o_id }}">

                    }

                    @endif
                 </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Include SweetAlert 2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

<!-- Include SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#userTable').DataTable();

        // Add click event to the "Delivered" buttons
        $('.UpdatEdeliveryStatus').click(function() {
            var id = $(this).siblings('input[name="did"]').val();

            // Show a confirmation dialog using SweetAlert
            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to mark this order as delivered!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, mark as delivered!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, send an AJAX request to the controller
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('update_delivery_status') }}', // Replace with your controller route
                        data: {
                            _token: '{{ csrf_token() }}', // Add CSRF token
                            id: id // Send the ID to the controller
                        },
                        dataType: 'json', // Expect JSON response from the server
                        success: function(response) {
                            Swal.fire({
                            title: 'Success!',
                            text: 'The order has been marked as delivered.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Redirect to your desired URL on "OK" click
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });

                        },
                        error: function(error) {
                            // Handle any errors here (e.g., display an error message)
                            console.error(error);
                        }
                    });
                }
            });
        });
    });
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
