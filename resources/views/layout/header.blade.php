<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Latest compiled and minified CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css" />
    <title>Live Stock Transport</title>
  </head>
  <body>
    <div>
      <div class="haedermain">
        <div class="headsub">
          <div class="headsub1"></div>
          <div class="headsub2">Transport LiveStock</div>
          <div class="headsub3">
<style>
 .hover {
    display: flex;
    justify-content: center;
    align-items: center;
}
.hover:hover {

    background-color: lightgrey;
}
.ho:hover{
    color:'blue';
    cursor: pointer;
}
.ddhp{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-bottom: 1px solid #CECECE;
}
  .ddop{
    display: flex;
    flex-direction: column;
    align-items: left;
    justify-content: left;
    padding-top: 10px;
    padding-left: 30px;
  }

  .my-1 {
    color: black !important;
    margin-top: 0.25rem!important;
    margin-bottom: 0.25rem!important;
}

</style>
        <?php
            if (session()->has('id')){
       ?>
             @php
             $id = session('id');
             $pro  = DB::table('users')->where('id', $id)->first();
         @endphp
<div class="profile">
<?php
  if(!empty($pro->img)){
    ?>
        <img src="{{ $pro->img }}" height="20px" id="profile-image" data-bs-toggle="dropdown" aria-expanded="false" />

    <?php
  }else{
    ?>
        <img src="http://127.0.0.1:8000/img/8b7ec506435be69a3449e2d787fdc2f8.avif" height="20px" id="profile-image" data-bs-toggle="dropdown" aria-expanded="false" />

    <?php
  }
?>

    <div class="dropdown-menu" aria-labelledby="profile-image" style="height: 200px;width: 200px;">
        <div class="ddhp">
            <h6></h6>
        </div>

        <div class="ddop">
            <span class="my-1 ho">
                <i class="fas fa-user"></i>&nbsp;<a href="{{ route('Profile_Page') }}">Profile</a>
            </span>
            <a href="{{ route('dashboard') }}">
                <span class="my-1 ho text-dark">
                    <i class="fas fa-dashboard"></i>&nbsp; Dashboard
                </span>
            </a>

            <form action="{{ route('logout_user') }}" method="post">
                @csrf
                <span class="my-1 ho">
                    <i class="fas fa-sign-out-alt"></i>&nbsp;<button style="border: none" type="submit">Log out</button>
                </span>
            </form>
        </div>
    </div>
</div>

       <?php
            }
?>

          </div>
        </div>
        <div class="headsub">
          <div class="headsub1a"></div>
          <div class="headsub2a">
            <span><a href="{{ route('welcome') }}" style="text-decoration: none;color:#464646">HOME</a>  </span>
            <span><a href="{{ route('about') }}" style="text-decoration: none;color:#464646">ABOUT US</a>  </span>



            <span> <a href="{{ route('login') }}" style="text-decoration: none;color:#464646">LOGIN</a> </span>
            @if(session()->has('id'))
            <form method="POST" action="{{ route('logout_user') }}">
                @csrf
                <button type="submit" style="text-decoration: none; color:#464646; background: none; border: none;">LOG OUT</button>
            </form>
            @else
            <span><a href="{{ route('signup') }}" style="text-decoration: none; color:#464646">SIGN UP</a></span>

            @endif
          </div>
          <div class="headsub3a">
            <div class="icons">
                <a href="{{ route('checkout') }}">
                    <img src="./Assets/shop.png" alt="Shop Image" />
                  </a>
                                {{-- <img src="./Assets/search.png" />
              <img src="./Assets/heart.png" /> --}}
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark exxx">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="color: black"
            >Transport LiveStock</a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavbar"
          >
            <i class="fas fa-bars" style="color: black"></i>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('welcome') }}">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">LOG IN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('signup') }}">SIGN UP</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<style>
    a {
    text-decoration: none;
    color: #000
}
</style>
