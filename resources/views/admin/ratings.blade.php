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
    @php

    $id = session('id');
    $offers = DB::table('offers')
        ->join('send_an_offer', 'offers.order_id', '=', 'send_an_offer.id')
        ->where('offers.status', 1) // Use integer value instead of '='
        ->where('send_an_offer.user_id', $id) // Remove '='
        ->where('offers.delivery_status', 1)
        ->whereNull('offers.ratings')
        ->select('offers.id as o_id', 'offers.*', 'send_an_offer.*')
        ->get();

    @endphp
    <h4>Ratings</h4><br><br>
    <div class="container">
        <table id="userTable" class="display">
            <thead>
                <tr>
                    <th>Truck Driver</th>
                    <th>Animal</th>
                    <th>Cost per km</th>
                    <th>Quantity</th>
                    <th>Rate 10 out OF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offers as $offer)
                @php
                $t_id = $offer->truck_user_id;
                $p_id = $offer->product_id;
                $product = DB::table('product')->where('id', $p_id)->first();
                $user = DB::table('users')->where('id', $t_id)->first();
                @endphp
                <tr>
                    <td>{{ $user->fname }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $offer->cost }}</td>
                    <td>{{ $offer->qty }}</td>
                    <td>
                        @if ($offer->ratings == null)
                        <div class="form-group">
                            <label for="">Rate</label>
                            <select class="form-control" name="rating" id="rating" data-offer-id="{{ $offer->o_id }}">
                                <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>

                            </select>
                          </div>
                        @endif

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

<!-- Include SweetAlert 2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

<!-- Include SweetAlert 2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script>
    // Add a change event handler for the rating select element
    $('#rating').change(function() {
        var offerId = $(this).data('offer-id');
        var rating = $(this).val();

        // Show a confirmation dialog using SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to rate this offer?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, rate it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send an AJAX request to the controller
                $.ajax({
                    type: 'POST',
                    url: '{{ route('rate_offer') }}', // Replace with your controller route
                    data: {
                        _token: '{{ csrf_token() }}', // Add CSRF token
                        offerId: offerId,
                        rating: rating
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'You have successfully rated the offer.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reload the page or perform other actions if needed
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
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
