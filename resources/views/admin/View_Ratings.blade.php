@php
$id = session('id');
$offers = DB::table('offers')
    ->join('send_an_offer', 'offers.order_id', '=', 'send_an_offer.id')
    ->where('offers.status', 1)
    ->where('offers.truck_user_id', $id)
    ->where('offers.delivery_status', 1)
    ->whereNotNull('offers.ratings')
    ->select('offers.id as o_id', 'offers.*', 'send_an_offer.*')
    ->get();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Record</title>
    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Include SweetAlert 2 CSS and JS -->
</head>
<style>
    .golden-star {
        color: gold; /* Set the color to gold (golden) */
    }
    .confetti {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1000;
}
.confetti-piece {
    position: absolute;
    width: 10px;
    height: 30px;
    background: #ffd300;
    top: 0;
    opacity: 0;
}
.confetti-piece:nth-child(1) {
    left: 7%;
    -webkit-transform: rotate(-40deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 182ms;
    -webkit-animation-duration: 1116ms;
}
.confetti-piece:nth-child(2) {
    left: 14%;
    -webkit-transform: rotate(4deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 161ms;
    -webkit-animation-duration: 1076ms;
}
.confetti-piece:nth-child(3) {
    left: 21%;
    -webkit-transform: rotate(-51deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 481ms;
    -webkit-animation-duration: 1103ms;
}
.confetti-piece:nth-child(4) {
    left: 28%;
    -webkit-transform: rotate(61deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 334ms;
    -webkit-animation-duration: 708ms;
}
.confetti-piece:nth-child(5) {
    left: 35%;
    -webkit-transform: rotate(-52deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 302ms;
    -webkit-animation-duration: 776ms;
}
.confetti-piece:nth-child(6) {
    left: 42%;
    -webkit-transform: rotate(38deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 180ms;
    -webkit-animation-duration: 1168ms;
}
.confetti-piece:nth-child(7) {
    left: 49%;
    -webkit-transform: rotate(11deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 395ms;
    -webkit-animation-duration: 1200ms;
}
.confetti-piece:nth-child(8) {
    left: 56%;
    -webkit-transform: rotate(49deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 14ms;
    -webkit-animation-duration: 887ms;
}
.confetti-piece:nth-child(9) {
    left: 63%;
    -webkit-transform: rotate(-72deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 149ms;
    -webkit-animation-duration: 805ms;
}
.confetti-piece:nth-child(10) {
    left: 70%;
    -webkit-transform: rotate(10deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 351ms;
    -webkit-animation-duration: 1059ms;
}
.confetti-piece:nth-child(11) {
    left: 77%;
    -webkit-transform: rotate(4deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 307ms;
    -webkit-animation-duration: 1132ms;
}
.confetti-piece:nth-child(12) {
    left: 84%;
    -webkit-transform: rotate(42deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 464ms;
    -webkit-animation-duration: 776ms;
}
.confetti-piece:nth-child(13) {
    left: 91%;
    -webkit-transform: rotate(-72deg);
    -webkit-animation: makeItRain 1000ms infinite ease-out;
    -webkit-animation-delay: 429ms;
    -webkit-animation-duration: 818ms;
}
.confetti-piece:nth-child(odd) {
    background: #7431e8;
}
.confetti-piece:nth-child(even) {
    z-index: 1;
}
.confetti-piece:nth-child(4n) {
    width: 5px;
    height: 12px;
    -webkit-animation-duration: 2000ms;
}
.confetti-piece:nth-child(3n) {
    width: 3px;
    height: 10px;
    -webkit-animation-duration: 2500ms;
    -webkit-animation-delay: 1000ms;
}
.confetti-piece:nth-child(4n-7) {
  background: red;
}
@-webkit-keyframes makeItRain {
    from {opacity: 0;}
    50% {opacity: 1;}
    to {-webkit-transform: translateY(350px);}
}
</style>

<body>
    <div class="confetti">
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
        <div class="confetti-piece"></div>
    </div>
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

    <div class="container">
        <table id="userTable" class="display">
            <!-- Table headers here -->
            <thead>
                <tr>
                    <th>Truck Driver</th>
                    <th>Animal</th>
                    <th>Cost per km</th>
                    <th>Quantity</th>
                    <th>Ratings</th>
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
                        <td><!-- Inside your Blade template -->
                            @foreach (range(1, $offer->ratings) as $rating)
                            <i class="fas fa-star golden-star"></i>
                            @endforeach
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Initialize DataTables after the table is rendered -->
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>
