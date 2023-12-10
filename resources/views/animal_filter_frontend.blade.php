@extends('layout.main')

@section('title', 'Livestock')

@section('main-container')
<div class="container my-5">
  <h3 style="text-align: center">Animals</h3>
  <div class="row">
    @if (count($results) === 0)
      <div class="col-md-12">
        <h1 class="text-center">No Result Found</h1><br><br>
      </div>
    @else
      @foreach ($results as $animal)
        @php
          $id = $animal->id;
          $image = DB::table('product_images')->where('product_id', $id)->take(1)->get();
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
    @endif
  </div>
</div>
@endsection
