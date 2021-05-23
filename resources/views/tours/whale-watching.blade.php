@extends('layouts.master')

@section('styles')
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@700&display=swap" rel="stylesheet">
    <script
        src="https://www.paypal.com/sdk/js?client-id={{config('paypal.client_id')}}&currency=USD"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>
    @include('partials.general_style_forPangas')
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    <link href="{{asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">
    <style>
        .details{
            width: 100%;
            text-align: center;
            font-size: 2.5rem;
            margin: 1rem;
        }
        .bootstrap-datetimepicker-widget table td.day{
            height: 10px!important;
            padding: 5px!important;
        }
        .bootstrap-datetimepicker-widget table th{
            height: 5px!important;
            padding: 8px!important;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row py-3">
        <div class="col-md-12">
            <div class="row py-2">
                <div class="col-md-12">
                    <H1 class="text-center">
                        WHALE WATCHING
                    </H1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img class="w-100" alt="Bootstrap Image Preview" src="{{asset('img/slider/tours/whale-watching/slide_2.jpg')}}" />
                </div>
                <div class="col-md-4">
                    <img class="w-100" alt="Bootstrap Image Preview" src="{{asset('img/slider/tours/whale-watching/slide_3.jpg')}}" />
                </div>
                <div class="col-md-4">
                    <img class="w-100" alt="Bootstrap Image Preview" src="{{asset('img/slider/tours/whale-watching/slide_4.jpg')}}" />
                </div>
            </div>

            <div class="row pt-4 mt-4">
                <div class="col-md-8 offset-md-2 text-center">
                    <h2 class="mb-0">
                        DETAILS
                    </h2>
                </div>
            </div>

            <div class="row pb-2">
               <div class="container">
                   <div class="row">
                        <div class="col-md-6 mt-2 text-center">
                            <i class="fa details fa-money" aria-hidden="true"></i>
                            <h4 class="text-center">COST</h4>
                            Whale watching tour cost 80 dlls per person.
                        </div>
                        <div class="col-md-6 mt-2 text-center">
                            <i class="fa details fa-clock-o" aria-hidden="true"></i>
                            <h4 class="text-center">DURATION</h4>
                            2 hours, minimum 2 people maximum 4
                        </div>
                        <div class="col-md-6 mt-2 text-center">
                            <i class="fa details fa-glass" aria-hidden="true"></i>
                            <h4 class="text-center">DRINKS</h4>
                            Includes 6 drinks per person water, soda or beer
                        </div>
                        <div class="col-md-6 mt-2 text-center">
                            <i class="fa details fa-calendar" aria-hidden="true"></i>
                            <h4 class="text-center">DEPARTURES</h4>
                            Departures from 9 am
                        </div>
                   </div>
               </div>
            </div>

            <div class="row pb-2 mb-5">
                <div class="offset-md-1 col-md-10 text-center">
                    <i class="fa details fa-info-circle mb-0" aria-hidden="true"></i>
                    <h3 class="text-center mt-2 mb-0">SAFETY PROTOCOLS <small style="color: red">(COVID-19)</small>:</h3>
                    After each tour We have the boats properly sanitized with all the sanitary measures that the Secretary of Health requires of us to be able to operate and give confidence to our clients. Our staff will wear mask if clients wish, they can use them during the tour or not use them. You can demand that the crew use them if it makes them feel safer.
                </div>
            </div>

            <div class="row py-4">
                <div class="col-md-6 text-center">
                    <h2>
                        Our captains will take you up close for an experience you will never forget!
                    </h2>
                    <p style="font-size: 1.2rem">
                        Enjoy a real adventure with your partner or family on our trip with a beautiful view at sunset visiting the points of greatest interest such as lover's beach and divorce, the pelican's rock, neptuno's finger,
                        the colony of sea lions and of course the arch of san lucas after this points we take you into the Pacific for a breathtaking Sunset. so that you can enjoy an unforgettable experience that you cannot miss in cabo san lucas.
                    </p>

                    <a id="modal-633658" href="#modal-container-633658" role="button" class="btn d-flex justify-content-center" data-toggle="modal">
                        <button type="button" class="btn btn-lg btn-danger">
                            Book Now
                        </button>
                    </a>

                    <div class="modal fade" id="modal-container-633658" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">
                                        Modal title
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @include('tours.forms.form_1')
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal" style="font-weight:bolder">
                                        Cancel
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="carousel slide" id="carousel-4384">
                        <ol class="carousel-indicators">
                            <li data-slide-to="0" data-target="#carousel-4384" class="active">
                            </li>
                            <li data-slide-to="1" data-target="#carousel-4384">
                            </li>
                            <li data-slide-to="2" data-target="#carousel-4384">
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img class="d-block w-100" alt="Carousel Bootstrap First" src="{{asset('img/slider/tours/whale-watching/slide_1.jpg')}}" />
                                <div class="carousel-caption">
                                    <h4>
                                        Whale Watching at Cabo San Lucas
                                    </h4>
                                    <p>
                                        You will see the beaches like el balconcito, playa pelícano, lovers beach.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item active">
                                <img class="d-block w-100" alt="Carousel Bootstrap Second" src="{{asset('img/slider/tours/whale-watching/slide_2.jpg')}}" />
                                <div class="carousel-caption">
                                    <h4>
                                        Whale Watching at Cabo San Lucas
                                    </h4>
                                    <p>
                                         Is something you must do on your visit to Los Cabos, it is simply beautiful. And that is why we recommend you take this complete tour that we have for you, your family or friends.
                                    </p>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" alt="Carousel Bootstrap Third" src="{{asset('img/slider/tours/whale-watching/slide_3.jpg')}}" />
                                <div class="carousel-caption">

                                    <p>
                                        You will be able to see the finger of Neptune, the window of the Pacific and of course you will be able to take the unmissable photo in the Arch of Cabo San Lucas, of course, all this accompanied by your favorite drink, you will also admire the family of Sea Lions that live in the area .
                                    </p>
                                </div>
                            </div>
                        </div> <a class="carousel-control-prev" href="#carousel-4384" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-4384" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection

@section('map')
<div id="map"></div>
@endsection

@section('map-scripts')
  @include('partials.scripts.google_map')
@endsection

@section('footer-scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('../js/vue.js') }}"></script>
    <script src="{{ asset('/js/moment.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        const duration= '2';
        const startingTime='9:00am';
        const total= '80';
        const trip= 'Whale watching';
    </script>

@include('tours.scripts.paypal-vue')
@endsection
