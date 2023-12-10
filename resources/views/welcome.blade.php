@extends('layout.main')

@section('title', 'Livestock')


@section('main-container')

@if(session('offer_success'))
    <div class="alert alert-success">
        Your request has been successfully sent to the driver. You will be promptly notified by the driver.    </div>
@endif

<div class="container video"></div>

<div class="container my-5">
  <h3 style="text-align: center">Animals</h3>
  <div class="row">

      @php
$animal = DB::table('product')
    ->orderBy('created_at', 'desc')
    ->take(12)
    ->get();
      @endphp
@foreach ($animal as $animal)

@php
    $id = $animal->id;
    $image = DB::table('product_images')->where('product_id' , $id)->take(1)->get();
@endphp
<div class="col-md-4">
    <div class="card" style="height: 100%">
      <div class="row">
        <img src="{{  $image[0]->image }}" />
      </div>
      <div class="row">
        <h4>{{ $animal->name }}</h4>
        <p>{{ $animal->description }}</p>
      </div>
      <div class="row">
        <div class="two">
          <div class="left">{{ $animal->price }} $</div>
          <div class="right">
            <form method="POST" action="{{ route('detail') }}">
                @csrf
                <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                <button type="submit" style="border: none;height: 100%;background-color: transparent"> <img src="./Assets/shop.png" alt="Shop Image"></button>
            </form>


                      </div>
        </div>
      </div>
    </div>
  </div>


@endforeach
  </div>


</div>

<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="category my-5">
          <form action="{{ route('filter_animal') }}" method="POST">
            @csrf
            <input type="hidden" name="animal" value="horse">
            <button type="submit" class="categorybtn">HORSES</button>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="category2 my-5">
          <form action="{{ route('filter_animal') }}" method="POST">
            @csrf
            <input type="hidden" name="animal" value="sheep">
            <button type="submit" class="categorybtn">SHEEPS</button>
          </form>
        </div>
      </div>
      <div class="col-md-4">
        <div class="category3 my-5">
          <form action="{{ route('filter_animal') }}" method="POST">
            @csrf
            <input type="hidden" name="animal" value="camel">
            <button type="submit" class="categorybtn">CAMELS</button>
          </form>
        </div>
      </div>
    </div>
  </div>


<div class="contact my-5">
  <div class="contactrow">
    <div class="contactbtn"><a href="{{ route('contact_us') }}">CONTACT US</a></div>
  </div>
</div>
@endsection
