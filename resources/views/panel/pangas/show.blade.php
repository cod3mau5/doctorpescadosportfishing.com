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
                        <h2 class="panga_title"> SUPER PANGA {{strtoupper($panga->name)}} <small>{{$panga->feets}}ft</small></h2>
                    </ul>
                      
                    <div class="row">
                        <div class="col-lg-6">
                            @php
                                $images= $panga->images->where('panga_id',$panga->id)->pluck('name')->all();
                            @endphp
                            @if(!empty($images))
                                <div class="slider-for"> 
                                    @foreach ($images as $image)    
                                        <div>
                                            <img src="{{url('/img/pangas/gallery/'.$image)}}" class="w-100" style="height:250px" alt="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="slider-nav">
                                    @foreach ($images as $image)  
                                        <div>
                                            <img src="{{url('/img/pangas/gallery/'.$image)}}" class="w-100" style="height:80px" alt="">
                                        </div> 
                                    @endforeach
                                </div>
                                    @else
                                        <div class="slider-for">
                                            <div>
                                                <img src="{{url($panga->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($panga->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($panga->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($panga->img)}}" class="w-100" alt="">
                                            </div>
                                        </div>
                                        <div class="slider-nav">
                                            <div>
                                                <img src="{{url($panga->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($panga->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($panga->img)}}" class="w-100" alt="">
                                            </div>
                                            <div>
                                                <img src="{{url($panga->img)}}" class="w-100" alt="">
                                            </div>
                                        </div>
                            @endif
                            
                        </div>
                        <div class="col-lg-6 mb-4 boat_info_column">
                            <div class="description_box">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img src="{{url($panga->captain->captain_img)}}" class="w-100" alt="">
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="mb-1">{{$panga->captain->name}}</h4>
                                        <p class="mb-1">
                                            <b>Where are you from?</b> <br>
                                            {{$panga->captain->origin}}
                                        </p>
                                        <p class="mb-1">
                                            <b>How long have they been fishing?</b> <br>
                                            {{$panga->captain->experience}}
                                        </p>
                                        <p class="mb-1">
                                            <b>Favorite fish?</b> <br>
                                            {{$panga->captain->favorite_fish}}
                                        </p>
                                        <p class="mb-1">
                                            <b>Why they like to fish?</b> <br>
                                            {{$panga->captain->reason_to_fish}}
                                        </p>
                                        <p class="mb-1">
                                            <b>Favorite hobby</b> <br>
                                            {{$panga->captain->hobby}}
                                        </p>
                                    </div>
                                </div>
                                @if (!empty($panga->feature->fishing_gear))
                                    <div class="row mb-3">
                                        @php
                                            $fishing_gears = explode(',', $panga->feature->fishing_gear);
                                            $boat_features= explode(',',$panga->feature->boat_features);  
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
        
                            <a href="/book-now/panga/{{$panga->id}}">
                                <button class="btn-book-now w-100">BOOK {{strtoupper($panga->name)}} NOW</button>
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
                                            {{$panga->name}}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ( property_exists($panga, $panga->rate->full_day) )
                                    <tr>
                                        <td class="text-center">
                                            <b>Full Day </b><br>
                                            {{$panga->rate->duration_full_day}}
                                        </td>
                                        <td class="break-this text-center m-none">
                                            {{$panga->rate->full_day_description ? $panga->rate->full_day_description : $panga->rate->default_full_day_description }}
                                        </td>
                                        <td class="text-center">
                                            {{$panga->max_anglers}}
                                        </td>
                                        <td class="text-center">${{$panga->rate->full_day}}usd</td>
                                        @if ($panga->percentage_reservation)
                                            <td class="text-center">
                                                <a href="/book-now/panga/{{$panga->id}}/true">
                                                    <button class="m-button">Reserve full day with {{$panga->percentage_reservation}}%</button>
                                                </a>
                                            </td>
                                            @else
                                                <td class="text-center">
                                                    <a href="/book-now/panga/{{$panga->id}}/true">
                                                        <button class="m-button">Book full day</button>
                                                    </a>
                                                </td>
                                        @endif
                                    </tr>
                                @endif
                                @if (property_exists($panga, $panga->rate->half_day))
                                    <tr>
                                        <td class="text-center">
                                            <b>Half Day </b><br>
                                            {{$panga->rate->duration_half_day}}
                                        </td>
                                        <td class="break-this text-center m-none">
                                            {{$panga->rate->half_day_description ? $panga->rate->half_day_description : $panga->rate->default_half_day_description}}
                                        </td>
                                        <td class="text-center">
                                            {{$panga->max_anglers}}
                                        </td>
                                        <td class="text-center">${{$panga->rate->half_day}}usd</td>

                                        @if ($panga->percentage_reservation)
                                            <td class="text-center">
                                                <a href="/book-now/charter/{{$panga->id}}/false">
                                                    <button class="m-button">Reserve half day with {{$panga->percentage_reservation}}%</button>
                                                </a>
                                            </td>
                                            @else
                                                <td class="text-center">
                                                    <a href="/book-now/charter/{{$panga->id}}/false">
                                                        <button class="m-button">Book half day</button>
                                                    </a>
                                                </td>
                                        @endif

                                        {{-- <td class="text-center">
                                            <a href="/book-now/charter/{{$charter->id}}/false">
                                                <button class="m-button">Book half day</button>
                                            </a>
                                        </td> --}}
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
                                    <h3>{{$panga->name.' '.$panga->feets}}</h3>
                                    <img src="{{asset($panga->img)}}" alt="" class="w-100">
                                    <p>max {{$panga->max_anglers}} anglers</p>
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