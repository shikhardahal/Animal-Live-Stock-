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

    @if(session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
    @if(session('asd'))
        <div class="alert alert-danger">
            {{ session('asd') }}
        </div>
    @endif

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
                </tr>
            </thead>
@php
$offers = DB::table('offers')
    ->join('send_an_offer', 'offers.order_id', '=', 'send_an_offer.id')
    ->where('offers.status', '=', 0)
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
                <form action="{{ route('acceptAction') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $offer->o_id }}">
                    <input type="hidden" name="cost" value="{{ $offer->cost }}">
                    <button type="submit" class="btn btn-success">Accept</button>
                </form>

                <form action="{{ route('rejectAction') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $offer->o_id }}">
                    <button type="submit" class="btn btn-danger">Reject</button>
                </form>


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
