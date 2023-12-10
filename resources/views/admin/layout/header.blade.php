<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
    /*
    DEMO STYLE
*/
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

    body {
      font-family: 'Poppins', sans-serif;
      background: #fafafa;
    }

    p {
      font-family: 'Poppins', sans-serif;
      font-size: 1.1em;
      font-weight: 300;
      line-height: 1.7em;
      color: #999;
    }

    a,
    a:hover,
    a:focus {
      color: inherit;
      text-decoration: none;
      transition: all 0.3s;
    }

    .navbar {
      padding: 15px 10px;
      background: #fff;
      border: none;
      border-radius: 0;
      margin-bottom: 40px;
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
      box-shadow: none;
      outline: none !important;
      border: none;
    }

    .line {
      width: 100%;
      height: 1px;
      border-bottom: 1px dashed #ddd;
      margin: 40px 0;
    }

    /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */
    .wrapper {
      display: flex;
      width: 100%;
      align-items: stretch;
    }

    #sidebar {
      min-width: 250px;
      max-width: 250px;
      background: #000;
      color: #fff;
      transition: all 0.3s;
    }

    #sidebar.active {
      margin-left: -250px;
    }

    #sidebar .sidebar-header {
      padding: 20px;
      background: #fff;
    }

    #sidebar ul.components {
      padding: 20px 0;
    }

    #sidebar ul p {
      color: #fff;
      padding: 10px;
    }

    #sidebar ul li a {
      padding: 10px;
      font-size: 1.1em;
      display: block;
    }

    #sidebar ul li a:hover {
      color: #000;
      background: #fff;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
      color: #fff;
      background: #000;
    }

    a[data-toggle="collapse"] {
      position: relative;
    }

    .dropdown-toggle::after {
      display: block;
      position: absolute;
      top: 50%;
      right: 20px;
      transform: translateY(-50%);
    }

    ul ul a {
      font-size: 0.9em !important;
      padding-left: 30px !important;
      background: #000;
    }

    ul.CTAs {
      padding: 20px;
    }

    ul.CTAs a {
      text-align: center;
      font-size: 0.9em !important;
      display: block;
      border-radius: 5px;
      margin-bottom: 5px;
    }

    a.download {
      background: #fff;
      color: #ae23282a;
    }

    a.article,
    a.article:hover {
      background: #000 !important;
      color: #fff !important;
    }

    /* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */
    #content {
      width: 100%;
      padding: 20px;
      min-height: 100vh;
      transition: all 0.3s;
    }

    /* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */
    @media (max-width: 768px) {
      #sidebar {
        margin-left: -250px;
      }

      #sidebar.active {
        margin-left: 0;
      }

      #sidebarCollapse span {
        display: none;
      }
    }

    .nav-link {
      text-decoration: none;
      color: white
    }

    .navlink {
      text-decoration: none;
      color: white
    }

    .dropdown-toggle {
      text-decoration: none;
      color: white;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <body>
    <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
        <ul class="list-unstyled components">
            <?php
            if(session()->has('id')){
              $id = session('id');
              $user = DB::table('users')->where('id' , $id)->first();
              $type = $user->type;

            }
          ?>
@if ($type == "admin")
<h2 style="text-align: center">Admin Portal</h2>
<ul class="list-unstyled components">
    <li class="active">
      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
        <i class="fas fa-user" style="margin-right: 20px"></i> User </a>
      <ul class="collapse list-unstyled" id="homeSubmenu">
        <li>
          <a href="{{ route('add_user') }}" class="navlink">
            <i class="fas fa-plus" style="margin-right: 20px"></i> Add User </a>
        </li>
        <li>
          <a href="{{ route('show_user') }}" class="navlink">
            <i class="fas fa-eye" style="margin-right: 20px"></i> View User </a>
        </li>
      </ul>
    </li>
    <ul class="list-unstyled components">
      <li class="active">
        <a href="#truck" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
          <i class="fas fa-car" style="margin-right: 20px"></i> Truck </a>
        <ul class="collapse list-unstyled" id="truck">
          <li>
            <a href="{{ route('add_truck') }}" class="navlink">
              <i class="fas fa-plus" style="margin-right: 20px"></i> Add Truck </a>
          </li>
          <li>
            <a href="{{ route('show_truck') }}" class="navlink">
              <i class="fas fa-eye" style="margin-right: 20px"></i> View Truck </a>
          </li>
        </ul>
      </li>
    </ul>
    <li class="active">
      <a href="#pro" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
        <i class="fas fa-horse" style="margin-right: 20px"></i> Animal </a>
      <ul class="collapse list-unstyled" id="pro">
        <li>
          <a href="{{ route('add_product') }}" class="navlink">
            <i class="fas fa-plus" style="margin-right: 20px"></i> Add Product </a>
        </li>
        <li>
          <a href="{{ route('show_product') }}" class="navlink">
            <i class="fas fa-eye" style="margin-right: 20px"></i> View Product </a>
        </li>
    </li>

  </ul>
        <li class="active">
        <a href="#abt" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
          <i class="fas fa-book" style="margin-right: 20px"></i>Website Content</a>
        <ul class="collapse list-unstyled" id="abt">
          <li>
            <a href="{{ route('view_about') }}" class="navlink">
              <i class="fas fa-plus" style="margin-right: 20px"></i> About Us </a>
          </li>
          <li>
            <a href="{{ route('contact') }}" class="navlink">
              <i class="fas fa-phone" style="margin-right: 20px"></i> Contact Us </a>
          </li>
      </li>
  @elseif ($type == "user")
<h2 style="text-align: center">User Portal</h2>
<ul class="list-unstyled components">
    <li class="active">
      <a href="#truck" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
        <i class="fas fa-shopping-cart" style="margin-right: 20px"></i>View Requests </a>
      <ul class="collapse list-unstyled" id="truck">
        <li>
          <a href="{{ route('view_request') }}" class="navlink">
            <i class="fas fa-eye" style="margin-right: 20px"></i> View Requests </a>
        </li>
      </ul>
    </li>
  </ul>

  <ul class="list-unstyled components">
    <li class="active">
      <a href="#track_order" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
        <i class="fas fa-map" style="margin-right: 20px"></i>Track Order </a>
      <ul class="collapse list-unstyled" id="track_order">
        <li>
          <a href="{{ route('track_order') }}" class="navlink">
            <i class="fas fa-eye" style="margin-right: 20px"></i> Track Order </a>
        </li>
      </ul>
    </li>
  </ul>

  <ul class="list-unstyled components">
    <li class="active">
      <a href="#ratings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
        <i class="fas fa-map" style="margin-right: 20px"></i>Ratings </a>
      <ul class="collapse list-unstyled" id="ratings">
        <li>
          <a href="{{ route('ratings') }}" class="navlink">
            <i class="fas fa-eye" style="margin-right: 20px"></i> Rating </a>
        </li>
      </ul>
    </li>
  </ul>




@elseif ($type == "driver" || $type == "admin")
<h2 style="text-align: center">Driver Portal</h2>

<ul class="list-unstyled components">
    <li class="active">
      <a href="#truck" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
        <i class="fas fa-shopping-cart" style="margin-right: 20px"></i>Find Orders </a>
      <ul class="collapse list-unstyled" id="truck">
        <li>
          <a href="{{ route('view_orders') }}" class="navlink">
            <i class="fas fa-eye" style="margin-right: 20px"></i> View Orders </a>
        </li>
      </ul>
    </li>
  </ul>
  <ul class="list-unstyled components">
    <li class="active">
      <a href="#loc" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
        <i class="fas fa-map" style="margin-right: 20px"></i>location </a>
      <ul class="collapse list-unstyled" id="loc">
        <li>
          <a href="{{ route('location') }}" class="navlink">
            <i class="fas fa-eye" style="margin-right: 20px"></i> location </a>
        </li>
      </ul>
    </li>
  </ul>


  <ul class="list-unstyled components">
    <li class="active">
      <a href="#View_Ratings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" class="navlink">
        <i class="fas fa-map" style="margin-right: 20px"></i>Ratings </a>
      <ul class="collapse list-unstyled" id="View_Ratings">
        <li>
          <a href="{{ route('View_Ratings') }}" class="navlink">
            <i class="fas fa-eye" style="margin-right: 20px"></i> Ratings </a>
        </li>
      </ul>
    </li>
  </ul>

@endif


        </ul>
        </ul>
      </nav>
      <!-- Page Content  -->
      <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-dark">
              <i class="fas fa-align-left"></i>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item" style="display: flex;flex-direction: row">
                  <a class="nav-link" href="#" id="notificationIcon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell d-none"></i>
                    <span class="badge badge-danger"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right notification-box custom-notification-box" aria-labelledby="notificationIcon">
                    @php
                    if (session()->has('id')) {
                        $id = session('id');
                        $notifications = DB::table('offers')
                            ->where('truck_user_id', $id)
                            ->where('status', 1)
                            ->get();
                    }
                    @endphp

                    @foreach ($notifications as $notification)
                        @php
                        $user = $notification->deliver_to;

                        $offer = DB::table('offers')
                            ->join('send_an_offer', 'offers.order_id', '=', 'send_an_offer.id')
                            ->where('offers.status', '=', 1)
                            ->where('offers.id', '=', $notification->id)
                            ->select('offers.id as o_id', 'offers.*', 'send_an_offer.*')
                            ->first();

                        $product = DB::table('product')->where('id', $offer->product_id)->first();
                        @endphp

                        <div class="alert alert-success" role="alert">
                            <strong>Your Order Accepted successfully</strong><br>
                            <strong>Animal name: {{ $product->name }}</strong><br>
                        </div>
                    @endforeach


                  </div>
                  <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <?php
                    if(session()->has('id')){
                        $id = session('id');
                        $pro = DB::table('users')->where('id' , $id)->first();
                    }
                    ?>

                       @if (!empty($pro->img))
                       <img src="{{ $pro->img }}" height="20px" />
                       @else
                           <img src="http://127.0.0.1:8000/img/8b7ec506435be69a3449e2d787fdc2f8.avif" height="20px" />
                       @endif

                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-left: -75px">
                      <a class="dropdown-item" href="{{ route('Profile_Page') }}">
                        <i class="fa fa-user" aria-hidden="true"></i> Profile </a>
                        <form id="logoutForm" action="{{ route('logout_user') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out" aria-hidden="true"></i> Log out
                            </button>
                        </form>

                    </div>
                  </div>
                </li>
                <style>
                  p {
                    font-family: 'Poppins', sans-serif;
                    font-size: 13px;
                    font-weight: 300;
                    line-height: 0.7em;
                    color: #000;
                    margin-left: 10px;
                  }

                  .custom-notification-box {
                    width: 395;
                  }

                  .h6,
                  h6 {
                    margin-left: 10px;
                    font-size: 13px;
                    color: #000;
                  }
                </style>
              </ul>
            </div>
          </div>
        </nav>
