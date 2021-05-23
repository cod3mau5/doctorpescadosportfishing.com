@extends('layouts.master')
@section('styles')
  <link href="{{url('/css/lightbox.css')}}" rel="stylesheet" />
  <style>
      .grid-container img {
        width: 100%;
        display: block;
        filter: none;
        transition: all 100ms ease-out;
      }
    @media(min-width:1200px){
      .grid-container img {
        -webkit-filter: grayscale(1);
        filter: grayscale(1);
      }
    }
  </style>
@endsection
@section('content')

    <div class="grid-container">

        @for($fish = 0; $fish <= 73; $fish++)
            <a href="{{url('/img/gallery/tuna/1 ('.$fish.').jpg')}}" data-lightbox="tuna">
                <img src="{{url('/img/gallery/tuna/1 ('.$fish.').jpg')}}">
            </a>
        @endfor

    </div>

@endsection

@section('map')
  <div id="map"></div>
@endsection

@section('map-scripts')

  @include('partials.scripts.google_map')

@endsection
@section('footer-scripts')

  <script src="{{url('/js/lightbox.js')}}"></script>
  <script>
     lightbox.option({
        'resizeDuration': 200,
      })
  </script>

@endsection
