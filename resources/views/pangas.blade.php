@extends('layouts.master')
@section('pangas-styles')
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@700&display=swap" rel="stylesheet">
    @include('partials.general_style')
@endsection

@section('content')
    <div class="container-fluid px-4 py-1">
        <div class="row">
            <div class="col-lg-10">
                @foreach ($pangas as $panga)
                    <div class="panga_box">
                        <ul class="cards">
                            <h2 class="panga_title"> SUPER PANGA {{strtoupper($panga->name)}} <small>{{$panga->feets}}ft</small></h2>
                        </ul>

                                <div class="row">

                                    @include('partials.pangas.panga_images')

                                    @include('partials.pangas.boat_info')

                                </div>
                                <div class="panga_rates">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="mx-auto tl-fixed w-100 mt-3">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center m-text-head py-2">Duration</th>
                                                        <th class="text-center m-text-head py-2 m-none">Description</th>
                                                        <th class="text-center m-text-head py-2">Max Anglers</th>
                                                        <th class="text-center m-text-head py-2">Price</th>
                                                        <th class="text-center m-text-head py-2" id="boat_name">
                                                            {{$panga->name}}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($panga->name == 'Doctor Pescado I')
                                                        @include('partials.pangas.rates_table.only-half-day')
                                                        @else
                                                            @include('partials.pangas.rates_table.half&full-day')
                                                    @endif
                                                </tbody>
                                            </table>
                                            <table class="mx-auto tl-fixed w-100 mt-3" id="mobile_description">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th class="text-center p-0 bg-sidebar">FULL & HALF DAY DESCRIPTION</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-center pt-1 pb-0">
                                                            <b>
                                                                {{$panga->rate->half_day_description ? $panga->rate->half_day_description : $panga->rate->default_half_day_description}}
                                                            </b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="taxes p-0">
                                                            <p></p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                            </table>
                                            @if($panga->name == 'Doctor Pescado I')
                                                @include('partials.pangas.extra_costs.extra_costs_1')
                                                @else
                                                    @include('partials.pangas.extra_costs.only_iva')
                                            @endif
                                        </div>
                                    </div>
                                </div>

                        </div>



                @endforeach
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
            arrows: false,
            centerMode: true,
            focusOnSelect: true
        });

    </script>
    @include('partials.scripts.similar_boats_bar')

@endsection
