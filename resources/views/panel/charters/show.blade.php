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
                        <h2 class="panga_title">{{strtoupper($charter->name)}} <small>{{$charter->feets}}ft</small></h2>
                    </ul>
                      
                    <div class="row">
                        <div class="col-lg-6">
                            @if(!empty($images))
                                @php
                                    $images= $charter->images->where('charter_id',$charter->id)->pluck('name')->all();
                                @endphp
                                <div class="slider-for"> 
                                    @foreach ($images as $image)    
                                        <div>
                                            <img src="{{url('/img/charters/gallery/'.$image)}}" class="w-100" style="height:250px" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="slider-nav">
                                    @foreach ($images as $image)  
                                        <div>
                                            <img src="{{url('/img/charters/gallery/'.$image)}}" class="w-100" style="height:80px" alt="">
                                        </div> 
                                    @endforeach
                                </div>
                                    @else
                                        <div class="slider-for">
                                            <div>
                                                <img src="{{url($charter->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($charter->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($charter->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($charter->img)}}" class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="slider-nav">
                                            <div>
                                                <img src="{{url($charter->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($charter->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($charter->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($charter->img)}}" class="w-100" alt="">
                                            </div>
                                        </div>
                            @endif
                            
                        </div>
                        <div class="col-lg-6 mb-4 boat_info_column">
                            <div class="description_box">
                                @if(!empty($charter->captain))
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img src="{{url($charter->captain->captain_img)}}" class="w-100" alt="">
                                        </div>
                                        <div class="col-lg-6">
                                            <h4 class="mb-1">{{$charter->captain->name}}</h4>
                                            <p class="mb-1">
                                                <b>Where are you from?</b> <br>
                                                {{$charter->captain->origin}}
                                            </p>
                                            <p class="mb-1">
                                                <b>How long have they been fishing?</b> <br>
                                                {{$charter->captain->experience}}
                                            </p>
                                            <p class="mb-1">
                                                <b>Favorite fish?</b> <br>
                                                {{$charter->captain->favorite_fish}}
                                            </p>
                                            <p class="mb-1">
                                                <b>Why they like to fish?</b> <br>
                                                {{$charter->captain->reason_to_fish}}
                                            </p>
                                            <p class="mb-1">
                                                <b>Favorite hobby</b> <br>
                                                {{$charter->captain->hobby}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($charter->feature->fishing_gear))
                                    <div class="row mb-3">
                                        @php
                                            $fishing_gears = explode(',', $charter->feature->fishing_gear);
                                            $boat_features= explode(',',$charter->feature->boat_features);  
                                        @endphp
                            
                                        <div class="col-lg-12">
                                            <div class="row">

                                                @for ($i=0;$i<=7;$i++)
                                                    @if ($i==0)
                                                        <div class="col-lg-4">
                                                            <ul class="list-group list-group-flush pb-2">
                                                                <li class="list-group-item p-1"><b>Fishing Gear:</b></li>
                                                    @endif
                                                        @if ($i < sizeof($fishing_gears)                                                                                                                                )
                                                            <li class="list-group-item p-0">
                                                                {{$fishing_gears[$i]}}
                                                            </li>
                                                        @endif
                                                    @if ($i==7)
                                                            </ul>
                                                        </div>
                                                    @endif

                                                @endfor

                                                @for ($i = 7; $i < sizeof($fishing_gears); $i++)
                                                        @if ($i == 7)
                                                            <div class="col-lg-4"> 
                                                                <ul class="list-group list-group-flush pb-2">
                                                                    <li class="list-group-item p-0" style="color: transparent">
                                                                        hello world
                                                                    </li>
                                                        @endif
                                                                    <li class="list-group-item p-0">
                                                                        {{$fishing_gears[$i]}}
                                                                    </li>
                                                        @if ($i == sizeof($fishing_gears)-1)
                                                                </ul>
                                                            </div>
                                                        @endif
                                                @endfor

                                                <div class="col-lg-4">
                                                    <ul class="list-group list-group-flush pb-2">
                                                        <li class="list-group-item p-1"><b>Boat Features:</b></li>
                                                        @foreach ($boat_features as $boat_feature)
                                                            <li class="list-group-item p-0">
                                                                {{$boat_feature}}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                        
                                    </div>
                                @endif
                            </div>
        
                            <a href="/book-now/charter/{{$charter->id}}">
                                <button class="btn-book-now w-100">BOOK {{strtoupper($charter->name)}} NOW</button>
                            </a>
                        </div>
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
                                            {{$charter->name}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ( property_exists($charter, $charter->rate->full_day) )
                                    <tr>
                                        <td class="text-center">
                                            <b>Full Day </b><br>
                                            {{$charter->rate->duration_full_day}}
                                        </td>
                                        <td class="break-this text-center m-none">
                                            {{$charter->rate->full_day_description ? $charter->rate->full_day_description : $charter->rate->default_full_day_description }}
                                        </td>
                                        <td class="text-center">
                                            {{$charter->max_anglers}}
                                        </td>
                                        <td class="text-center">${{$charter->rate->full_day}}usd</td>
                                        @if ($charter->percentage_reservation)
                                            <td class="text-center">
                                                <a href="/book-now/charter/{{$charter->id}}/true">
                                                    <button class="m-button">Reserve full day with {{$charter->percentage_reservation}}%</button>
                                                </a>
                                            </td>
                                            @else
                                                <td class="text-center">
                                                    <a href="/book-now/charter/{{$charter->id}}/true">
                                                        <button class="m-button">Book full day</button>
                                                    </a>
                                                </td>
                                        @endif
                                    </tr>
                                @endif
                                @if (property_exists($charter, $charter->rate->half_day))
                                    <tr>
                                        <td class="text-center">
                                            <b>Half Day </b><br>
                                            {{$charter->rate->duration_half_day}}
                                        </td>
                                        <td class="break-this text-center m-none">
                                            {{$charter->rate->half_day_description ? $charter->rate->half_day_description : $charter->rate->default_half_day_description}}
                                        </td>
                                        <td class="text-center">
                                            {{$charter->max_anglers}}
                                        </td>
                                        <td class="text-center">${{$charter->rate->half_day}}usd</td>

                                        @if ($charter->percentage_reservation)
                                            <td class="text-center">
                                                <a href="/book-now/charter/{{$charter->id}}/false">
                                                    <button class="m-button">Reserve half day with {{$charter->percentage_reservation}}%</button>
                                                </a>
                                            </td>
                                            @else
                                                <td class="text-center">
                                                    <a href="/book-now/charter/{{$charter->id}}/false">
                                                        <button class="m-button">Book half day</button>
                                                    </a>
                                                </td>
                                        @endif

                                    </tr>
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
                                                {{$charter->rate->half_day_description ? $charter->rate->half_day_description : $charter->rate->default_half_day_description}}
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
                            <table class="mx-auto tl-fixed w-100 mt-3">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center p-0 bg-sidebar">EXTRA COSTS</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <tr>
                                        <td class="taxes p-0">
                                            <p class="text-center mb-2">mexican taxes 16% not included</p>
                                        </td>
                                    </tr>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                        
    </div>
                

        
       
</div>
        <div class="col-lg-2 w-100 bg-sidebar" style="min-height:100%">
            <h2>View Similar Boats</h2>
            <aside class="charters-container natural">
                <div class="charters-wrapper">
                        <div class="row">
                            <a href="">
                                <div class="col-lg-12 side_boat_container">
                                    <h3>{{$charter->name.' '.$charter->feets}}</h3>
                                    <img src="{{asset($charter->img)}}" alt="" class="w-100">
                                    <p>max {{$charter->max_anglers}} anglers</p>
                                </div>
                            </a>
                        </div>

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