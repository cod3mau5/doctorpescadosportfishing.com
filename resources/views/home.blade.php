@extends('layouts.master')

@section('home-styles')
    <style>
        .slick-next {
              display: none!important;
          }
        .card_image {
            background-image: url("{{ url('/img/pangas/pelagic_gear.jpg') }}");
        }
        .card_image.panga{
          background-position-y:45%;
        }
        @media(min-width:1200px) {
              .card_image {
                  height: 230px;
              }
          }

        @media(min-width:1200px){
            .card{
            min-width: 350px;
          }
        }
        #CDSWIDCOE{
          margin: 1rem auto!important;
        }
        #CDSSCROLLINGRAVE.wide{
          width: 100%!important;
        }
        #CDSWIDSSP{
          width: 100%!important;
        }


        /* header {
            overflow: hidden;
        }

        .hero-text h2 {
            margin-bottom: 50px;
        }

        .hero-text .home-slider {
            position: relative;
        }

        .hero-text .home-slider .hero-slide a:hover span {
            color: #033a71;
        }

        .home-slider .hero-slide img {
            width: 100%;
        }

        .home-slider .hero-slide .header-content {
            top: 20%;
            margin-left: 8rem;
            max-width: 550px;
            width: 100%;
            padding: 2rem;
        }

        .slide-content {
            padding: 10px 20px 10px 0;
        }

        .slide-content .h1 {
            font-size: 62px;
        }

        .btn-primary {
            background-color: #5302FE;
            border-radius: 0;
        }

        .slick-dots {
            position: absolute;
            bottom: 10px;
            display: block;
            width: 100%;
            padding: 0;
            list-style: none;
            text-align: center;
        }

        .slick-dots li {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            margin: 0 5px;
            padding: 0;
            cursor: pointer;
        }

        .slick-dots li button {
            font-size: 0;
            line-height: 0;
            display: block;
            width: 20px;
            height: 20px;
            padding: 5px;
            cursor: pointer;
            border-radius: 50%;
            border: 0;
            outline: none;
        }

        .slick-dots li button::before {
            font-size: 18px;
            color: #fff;
            opacity: 1;
        }

        .slick-active button {
            background: #d60e96;
        }

        // Text Animation

        @-webkit-keyframes fadeInUpSD {
            0% {
                opacity: 0;
                -webkit-transform: translateY(100px);
                transform: translateY(100px);
            }

            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

        @keyframes fadeInUpSD {
            0% {
                opacity: 0;
                -webkit-transform: translateY(100px);
                transform: translateY(100px);
            }

            100% {
                opacity: 1;
                -webkit-transform: none;
                transform: none;
            }
        }

        .fadeInUpSD {
            -webkit-animation-name: fadeInUpSD;
            animation-name: fadeInUpSD;
        }

        .slick-active .slide-content {
            animation-name: fadeInUpSD;
            animation-duration: 1s;
            opacity: 1;
            width: 100%;
            padding: 10px 20px 30px 0;
        }

        // Media Queries

        @media (max-width: 768px) {
            .hero-text .home-slider .hero-slide a {
                padding-top: 0.8rem;
            }

            .hero-text .home-slider .hero-slide a span {
                font-size: 20px;
                margin-top: 0.5rem;
            }

            .home-slider .hero-slide .header-content {
                left: 50%;
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
                margin: 0 auto;
            }
        } */
  </style>
@endsection

@section('content')

<header class="hero-text">

    <div class="home-slider" data-arrows="true" data-autoplay="true">

        <div class="hero-slide">
            <img src="{{asset('img/slider/slide_1.jpg').'?'.date('Y-m-d')}}" class="w-100" alt="">
            <div class="header-content text-white position-absolute slide-content col-lg-4">
                <h1 class="mb-4">Be part of the <span class="d-block font-weight-bold">Lunar XPerience</span></h1>
                <a class="btn btn-primary btn-lg w-max mt-2" href="#" tabindex="0">Tour Our Ships</a>
            </div>
        </div>

        <div class="hero-slide">
            <img src="{{asset('img/slider/slide_2.jpg').'?'.date('Y-m-d')}}" class="w-100" alt="">
            <div class="header-content text-white position-absolute slide-content col-lg-4">
                <h1 class="mb-4">LunarXP Voted Best Mars Mission</h1>
                <p class="font-weight-bold">Inc. magazine today ranked LunarXP as the fastest growing company in the Mars Mission category.</p>
                <a class="btn btn-primary btn-lg w-max mt-2" href="#" tabindex="0">Read More</a>
            </div>
        </div>

        <div class="hero-slide">
            <img src="{{asset('img/slider/slide_3.jpg').'?'.date('Y-m-d')}}" class="w-100" alt="">
            <div class="header-content text-white position-absolute slide-content col-lg-4">
                <p>Our fleet of advanced spacecraft have revolutionized the lunar economy and provided safe travel for thousands of scientists, engineers, technicians, medical staff and civilians. These amazing vessels are also paving the way for reaching Mars in the next decade.</p>
				<a class="btn btn-primary btn-lg w-max mt-2" href="#" tabindex="0">Read More</a>
			</div>
        </div>

        <div class="hero-slide">
            <img src="{{asset('img/slider/slide_4.jpg').'?'.date('Y-m-d')}}" class="w-100" alt="">
            <div class="header-content text-white position-absolute slide-content col-lg-4">
                <p>Our fleet of advanced spacecraft have revolutionized the lunar economy and provided safe travel for thousands of scientists, engineers, technicians, medical staff and civilians. These amazing vessels are also paving the way for reaching Mars in the next decade.</p>
				<a class="btn btn-primary btn-lg w-max mt-2" href="#" tabindex="0">Read More</a>
			</div>
        </div>

    </div>

</header>



@if(!empty($pangas))

        @foreach ($pangas as $panga)
          <div class="main py-5">
            <h1 class="home-title">PANGAS LIST</h1>
            <ul class="cards">
              <li class="cards_item">
                  <div class="card" style="min-width:315px">
                    <div class="card_image panga" style="background-image: url('{{ url($panga->img) }}')!important;"></div>
                    <h2 class="card_title pt-3 pb-2 px-1">{{$panga->name}} <small>{{$panga->feets}} <span>ft</span> </small></h2>
                      <div class="card_content">

                          <ul class="pb-2 pl-0">

                            @php
                              if(!empty($panga->feature->fishing_gear) && !empty($panga->feature->boat_features)){
                                  $fishing_gears = explode(',', $panga->feature->fishing_gear);
                                  $boat_features= explode(',',$panga->feature->boat_features);
                              }
                            @endphp
                            @if (!empty($panga->rate->half_day))
                              <p class="card_text panga_price text-center mb-1">${{$panga->rate->half_day}} USD</p>
                              @elseif(!empty($panga->rate->full_day))
                              <p class="card_text panga_price text-center mb-1">${{$panga->rate->full_day}} USD</p>
                            @endif
                                {{-- <a href="{{url('/pangas')}}">
                                  <button class="btn btn-view-fleet">
                                    VIEW ALL pangas
                                  </button>
                                </a> --}}
                                <ul class="card_text py-0">
                                  <li>max {{$panga->max_anglers}} anglers.</li>
                                @foreach ($boat_features as $boat_feature)
                                  <li>{{$boat_feature}}</li>
                                @endforeach
                          </ul>
                        </ul>


                      <a href="/pangas">
                        <button class="btn-book-now card_btn"><b style="font-size: .8rem">{{$panga->percentage_reservation ? "RESERVE ".$panga->name. " WITH ".$panga->percentage_reservation."%" : "BOOK " .$panga->name. " NOW"}}</b></button>
                      </a>
                      </div>
                  </div>
              </li>
            </ul>
          </div>
          {{-- <ul class="cards">
            <li class="cards_single">
              <div class="card">
                <div class="card_image"></div>
                <h2 class="card_title pt-3 pb-2 ">SUPER PANGA 23'</h2>
                <div class="card_content">
                    <p class="card_text panga_price text-center mb-1">${{$panga->rate->half_day}} USD</p>
                    <a href="{{url('/pangas')}}">
                      <button class="btn btn-view-fleet">
                        VIEW ALL PANGAS
                      </button>
                    </a>
                    <ul class="card_text py-1">
                    <li>max 3 anglers.</li>
                    <li>GPS, fish finder & radio.</li>
                    <li>Bathroom</li>
                    </ul>
                    <a href="{{url('/book-now')}}">
                      <button class="btn-book-now card_btn"><b>BOOK NOW</b></button>
                    </a>
                </div>
              </div>
            </li>
          </ul> --}}

        @endforeach



@endif

    <div class="main py-5">
      <h1 class="home-title">CHARTERS LIST</h1>
      <ul class="cards">
        @foreach ($charters as $charter)
          <li class="cards_item">
              <div class="card">
                <div class="card_image" style="background-image: url('{{ url($charter->img) }}')!important;"></div>
                <h2 class="card_title pt-3 pb-2 px-1">{{$charter->name}} <small>{{$charter->feets}} <span>ft</span> </small></h2>
                  <div class="card_content">

                      <ul class="pb-2 pl-0">

                        @php
                          if(!empty($charter->feature->fishing_gear) && !empty($charter->feature->boat_features)){
                              $fishing_gears = explode(',', $charter->feature->fishing_gear);
                              $boat_features= explode(',',$charter->feature->boat_features);
                          }
                        @endphp
                        @if (!empty($charter->rate->half_day))
                          <p class="card_text panga_price text-center mb-0">${{$charter->rate->half_day}} USD <small style="color: #444">Half day</small></p>

                        @endif
                        @if(!empty($charter->rate->full_day))
                            <p class="card_text panga_price text-center mb-1">${{$charter->rate->full_day}} USD <small style="color: #444">Full day</small></p>
                        @endif
                            {{-- <a href="{{url('/charters')}}">
                              <button class="btn btn-view-fleet">
                                VIEW ALL CHARTERS
                              </button>
                            </a> --}}
                            <ul class="card_text py-0">
                              <li>max {{$charter->max_anglers}} anglers.</li>
                            @foreach ($boat_features as $boat_feature)
                              <li>{{$boat_feature}}</li>
                            @endforeach
                      </ul>
                    </ul>


                  <a href="{{route('charter-id',$charter->id)}}">
                    <button class="btn-book-now card_btn"><b style="font-size: .8rem">{{$charter->percentage_reservation ? "RESERVE ".$charter->name. " WITH ".$charter->percentage_reservation."%" : "BOOK " .$charter->name. " NOW"}}</b></button>
                  </a>
                  </div>
              </div>

          </li>
        @endforeach
      </ul>
    </div>
    <!-- LightWidget WIDGET -->
    {{-- <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script>
    <iframe src="//lightwidget.com/widgets/a8dcbc585088523882a4ed8b4e7b882b.html" scrolling="no" allowtransparency="true"
    class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe> --}}

    {{-- TRIP-ADVISOR --}}
    {{--
      <div class="container mb-4">
        <div class="row">
          <div class="col-lg-12 text-center mb-4">

              <div id="TA_certificateOfExcellence204" class="TA_certificateOfExcellence text-center"><ul id="qRNl5mXP8E1" class="TA_links 8fRZbD"><li id="7q3IDmn7" class="ulx8OImR"><a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g152515-d12675916-Reviews-Mahi_Fishingcharters-Cabo_San_Lucas_Los_Cabos_Baja_California.html"><img src="https://www.tripadvisor.com/img/cdsi/img2/awards/v2/tchotel_2020_L-14348-2.png" alt="TripAdvisor" class="widCOEImg" id="CDSWIDCOELOGO"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&amp;uniq=204&amp;locationId=12675916&amp;lang=en_US&amp;year=2020&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="row mb-3">

              <div class="col-md-6 mb-3">
                <p class="mb-2">
                  <b>{{config('app.name')}},</b> <br>
                  It offers you our fleet of 23-foot Super Pangas and offshore vessels. The fleet is made up of Captains and Crew members native to Cabo San Lucas, with high experience in the art of sport fishing.
                  Booking a boat with us is <b>easy</b>, <b>safe</b> and <b>we guarantee</b> that you will have a dream fishing trip.
                  Our fleet is kept <b>clean</b> and in <b>excellent condition</b> to make your trip pleasant and safe.
                </p>
              </div>
              <div class="col-md-6 text-center mb-2">
                <img src="{{asset('/img/dorados-and-wahoo-aboard.jpg').'?'.date('Y-m-d')}}" alt=""  style="width:100%;border-radius:10px;margin:0 auto">
              </div>


            </div>

            <div class="row">

              <div class="col-md-12">

                  <div id="TA_cdsscrollingravewide226" class="TA_cdsscrollingravewide"><ul id="GzgjmCquGM" class="TA_links iQyrrf5Wb"><li id="K0kGqM" class="PSLYJhSfjb2P"><a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g152515-d12675916-Reviews-Mahi_Fishingcharters-Cabo_San_Lucas_Los_Cabos_Baja_California.html"><img src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_lockup_vertical.svg" alt="TripAdvisor" class="widEXCIMG" id="CDSWIDEXCLOGO"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=cdsscrollingravewide&amp;uniq=226&amp;locationId=12675916&amp;lang=en_US&amp;border=true&amp;shadow=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>

              </div>

            </div>
          </div>
          <div class="col-lg-4">
            <div id="TA_selfserveprop38" class="TA_selfserveprop"><ul id="cmiAXtjC2Obl" class="TA_links qZNUFyMgpz"><li id="tu1hO1wy" class="LLPtkt9"><a target="_blank" href="https://www.tripadvisor.com/Attraction_Review-g152515-d12675916-Reviews-Mahi_Fishingcharters-Cabo_San_Lucas_Los_Cabos_Baja_California.html"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/v2/Tripadvisor_lockup_horizontal_secondary_registered-11900-2.svg" alt="TripAdvisor"/></a></li></ul></div><script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=38&amp;locationId=12675916&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
          </div>
        </div>

      </div>
    --}}


      {{-- INSTAFEED (APP PARA IMG DE INSTAGRAM) --}}

      
      @include('partials.externals.instafeed')
     

      @section('map')
      <div id="map"></div>
      @endsection
      @section('map-scripts')
        @include('partials.scripts.google_map')
      @endsection

@endsection

@section('footer-scripts')

  <script>
    $(document).ready(function(){
    //   $('.home-slider').slick({
    //     autoplay: true,
    //     pauseOnHover: false,
    //     infinite: true,
    //     speed: 1600,
    //     autoplaySpeed: 4400,
    //     fade: true,
    //     cssEase: 'linear'
    //   });


      $('.home-slider').slick({
            // dots: true,
            infinite: true,
            speed: 500,
            fade: !0,
            cssEase: 'linear',
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 8000,
            draggable: false,
            arrows: false,
            pauseOnHover: false,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true
                        }
                },
                {
                breakpoint: 768,
                settings: {
                draggable: true,
                        }
                },
                {
                breakpoint: 600,
                settings: {
                slidesToShow: 1,
                draggable: true,
                slidesToScroll: 1
                        }
                },
                {
                breakpoint: 480,
                settings: {
                slidesToShow: 1,
                draggable: true,
                slidesToScroll: 1
                        }
                }

            ]
        });
    });
  </script>
@endsection
