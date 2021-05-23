@extends('layouts.master')

@section('content')

    <div class="grid-container">
      <img src="https://source.unsplash.com/1300x1200/?algeria">
      <img src="https://source.unsplash.com/1300x1200/?lebanon">
      <img src="https://source.unsplash.com/1300x1200/?qatar">
      <img src="https://source.unsplash.com/1300x1200/?uae">
      <img src="https://source.unsplash.com/1300x1200/?kuwait">
      <img src="https://source.unsplash.com/1300x1200/?oman">
      <img src="https://source.unsplash.com/1300x1200/?turkey">
      <img src="https://source.unsplash.com/1300x1200/?iran">
      <img src="https://source.unsplash.com/1300x1200/?jordan">
      <img src="https://source.unsplash.com/1300x1200/?Kuwait">
    </div>

@endsection

@section('map')
  <div id="map"></div>
@endsection

@section('map-scripts')

  @include('partials.scripts.google_map')

@endsection