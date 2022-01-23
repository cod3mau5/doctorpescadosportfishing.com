@extends('layouts.master')
@section('pangas-styles')
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@700&display=swap" rel="stylesheet">
    @include('partials.general_style')
@endsection

@section('content')
<div class="container-fluid px-4 py-1">

    <div class="row">

        <div class="col-lg-10">


                <div class="panga_box">

                    <ul class="cards">
                        <h2 class="panga_title">
                            {{strtoupper($charter->name)}} <small>{{$charter->feets}}ft</small>
                        </h2>
                    </ul>

                    <div class="row">
                        @include('partials.charters.charter_images')

                        @include('partials.charters.boat_info')

                        @if($charter->percentage_reservation)
                            <p>{{$charter->description}}</p>
                        @endif
                    </div>

                    <a href="/book-now/charter/{{$charter->id}}">
                        @if ($charter->percentage_reservation)
                            <button class="btn-book-now w-100">RESERVE {{strtoupper($charter->name)}} WITH {{$charter->percentage_reservation}}%</button>
                            @else
                                <button class="btn-book-now w-100">BOOK {{strtoupper($charter->name)}} NOW</button>
                        @endif
                    </a>

                </div>

        </div>

        <div class="panga_rates">

            <div class="row">

                <div class="col-lg-12">



                    @include('partials.charters.rates_table.rates')

                    {{-- <table class="mx-auto tl-fixed w-100 mt-3" id="mobile_description">
                        <thead class="text-center">
                            <tr>
                                <th class="text-center p-0 bg-sidebar">FULL & HALF DAY DESCRIPTION</th>
                            </tr>
                        </thead>
                            <tbody>
                            <tr>
                                <td class="text-center pt-1 pb-0">
                                    @if ($charter->rate->default_half_day_description)
                                        <b>
                                            {{$charter->rate->half_day_description ? $charter->rate->half_day_description : $charter->rate->default_half_day_description}}
                                        </b>
                                        @else
                                        <b>
                                            {{$charter->rate->full_day_description ? $charter->rate->full_day_description : $charter->rate->default_full_day_description}}
                                        </b>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="taxes p-0">
                                    <p></p>
                                </td>
                            </tr>
                            </tbody>
                    </table> --}}

                    @include('partials.charters.extra_costs.extra_costs_1')


                </div>

            </div>
        </div>

    </div>

</div>
        <div class="col-lg-2 w-100 bg-sidebar" style="min-height:100%">
            <h2>View Similar Boats</h2>
            <aside class="charters-container natural">
                <div class="charters-wrapper">
                    @foreach ($charters as $charter)
                        <div class="row">
                            <a href="{{
                                route('charter-id',$charter->id)
                                }}">
                                <div class="col-lg-12 side_boat_container">
                                    <h3>{{$charter->name.' '.$charter->feets}}</h3>
                                    <img src="{{asset($charter->img)}}" alt="" class="w-100">
                                    <p>max {{$charter->max_anglers}} anglers</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>
</div>

@endsection

@section('footer-scripts')
    <script>
         $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: '.slider-nav',
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: false
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            arrows: false,
            centerMode: true,
            focusOnSelect: true
        });

    </script>

@include('partials.scripts.similar_boats_bar')

@endsection
