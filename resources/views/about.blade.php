@extends('layout.main')

@section('title', 'About us')


@section('main-container')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="content row card card-style mt-2" style="height: 100%;">

    @php
      $content = DB::table('about')->FIRST();
      $con = $content->content;
    @endphp

      {!! $con !!}

    <br><br>
</div>


@endsection

