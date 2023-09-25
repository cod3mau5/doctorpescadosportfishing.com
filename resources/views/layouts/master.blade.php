<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta id="_token" value="{{ csrf_token() }}" name="csrf-token">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-188905843-1">
        </script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-188905843-1');
        </script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}"/>
        <link rel="stylesheet" href="{{asset('/css/styles.css?=').time()}}">
        @include('global.css.loading-modal')
        @yield('styles')
        @yield('home-styles')
        @yield('pangas-styles')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-183569614-1">
        </script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-183569614-1');
        </script>
    </head>
    <body>
        <header class="flex-center position-ref full-height">
          <div class="container-fluid d-flex justify-content-between text-dark py-2 px-0 contact-info">
            <div class="mail text-center">
              <i class="fa fa-envelope pr-2"></i>info@doctorpescadosportfishing.com
            </div>
            <div class="tel text-center">
                <i class="fa fa-phone pr-2"></i> FROM MÉXICO: +52 (624) 117 79 92
            </div>
            <div class="tel text-center">
                <i class="fa fa-phone pr-2"></i> FROM TEXAS: +1 (214) 613-8296
            </div>
            <div class="tel text-center">
                <i class="fa fa-phone pr-2"></i> FROM USA: +1 (213) 406-7627
            </div>
          </div>

          <div class="container-fluid px-0">
              <nav class="navbar-expand-lg navbar-light bg-light pb-0" id="menu-wrapper">

                  <div class="row mx-0 flex-row align-items-center">
                    <div class="col-lg-4 text-center icons mb-5">
                      <a target="_blank" href="https://www.facebook.com/Dr.pescado">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                      <a target="_blank" href="https://www.youtube.com/channel/UCXdyzyH1FPO25ASSg52ZSHg/videos">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                      </a>
                      <a target="_blank" href="https://www.yelp.com/biz/dr-pescado-sport-fishing-cabo-san-lucas">
                        <i class="fa fa-yelp"></i>
                      </a>
                    </div>
                    <div class="col-lg-4 text-center">
                      <a class="navbar-brand mx-0" href="/">
                        <img src="{{asset('img/dr_pescado_logo.png') .'?'.date("Y-m-d")}}" alt="">
                      </a>
                      <a class="navbar-brand mobil mx-0" href="/">
                        <img src="{{asset('img/dr_pescado_logo.png') .'?'.date("Y-m-d")}}" alt="">
                      </a>
                    </div>
                    <div class="col-lg-4 text-center icons mb-5">
                        <a target="_blank" href="https://www.tripadvisor.com/Profile/jaimerendon2020">
                            <i class="fa fa-tripadvisor"></i>
                        </a>
                      <a target="_blank" href="https://www.instagram.com/drpescado/">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                      <a target="_blank" href="https://api.whatsapp.com/send?phone=526241177992&text=thanks%20for%20contact%20us,%20we'll%20send%20you%20a%20message%20in%20a%20few%20minutes!">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      </a>
                    </div>
                    <button class="navbar-toggler px-0 col-2 offset-80" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <p class="button-text">MENU</p>

                    </button>
                  </div>

                  <div class="container pb-3" id="menu-container">
                    <div class="row mx-0">
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav mx-auto text-center">
                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">HOME</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/charters')}}">CHARTERS LIST</a>
                          </li>
                          {{-- <li class="nav-item">
                            <a class="nav-link" href="{{url('/book-now')}}">BOOK NOW</a>
                          </li> --}}
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('fishing-report-home')}}">FISHING REPORT</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/pangas')}}">PANGAS LIST</a>
                          </li>
                          <li class="dropdown nav-item pl-1 pr-1 pr-md-3">
                            <input type="checkbox" />
                            <a class="nav-link" data-toggle="dropzone" style="line-height:1.2">PRIVATE TOURS</a>
                            <ul class="dropdown-menu">
                              <li><a href="{{url('/tours/sunset')}}" class="nav-link child">SUNSET</a></li>
                              <li><a href="{{url('/tours/snorkel')}}" class="nav-link child">SNORKEL</a></li>
                              <li><a href="{{url('/tours/whale-watching')}}" class="nav-link child">WHALE WATCHING</a></li>
                            </ul>
                            <li class="dropdown nav-item pl-1 pr-1 pr-md-3">
                              <input type="checkbox" />
                              <a class="nav-link" data-toggle="dropzone" style="line-height:1.2">GALLERY</a>
                              <ul class="dropdown-menu">
                                <li><a href="{{url('/gallery/roosterfish')}}" class="nav-link child">ROOSTERFISH</a></li>
                                <li><a href="{{url('/gallery/mahi-mahi')}}" class="nav-link child">MAHI MAHI</a></li>
                                <li><a href="{{url('/gallery/wahoo')}}" class="nav-link child">WAHOO</a></li>
                                <li><a href="{{url('/gallery/tuna')}}" class="nav-link child">TUNA</a></li>
                                <li><a href="{{url('/gallery/red-snapper')}}" class="nav-link child">RED SNAPPER</a></li>
                                <li><a href="{{url('/gallery/marlin')}}" class="nav-link child">MARLIN</a></li>
                                <li><a href="{{url('/gallery/amberjack')}}" class="nav-link child">AMBER JACK</a></li>
                                <li><a href="{{url('/gallery/jack-trevally')}}" class="nav-link child">JACK TREVALLY</a></li>
                              </ul>
                            </li>



                          <li class="nav-item">
                            <a class="nav-link" href="{{url('/contact')}}">CONTACT US</a>
                          </li>
                        </ul>

                        <ul class="mobile-icons text-center px-0">
                          <li>
                            <a href="https://www.facebook.com/Dr.pescado" target="_blank" rel="noopener noreferrer">
                              <i class="fa fa-facebook mobil-icon" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.youtube.com/channel/UCXdyzyH1FPO25ASSg52ZSHg/videos" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-youtube mobil-icon" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.yelp.com/biz/dr-pescado-sport-fishing-cabo-san-lucas" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-yelp mobil-icon" aria-hidden="true"></i>
                            </a>
                            <a href="https://www.tripadvisor.com/Profile/jaimerendon2020" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-tripadvisor mobil-icon" aria-hidden="true"></i>
                              </a>
                            <a href="https://www.instagram.com/drpescado/" target="_blank" rel="noopener noreferrer">
                              <i class="fa fa-instagram mobil-icon" aria-hidden="true"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=526241177992&text=hello%20I%20would%20like%20more%20information%20please" target="_blank" rel="noopener noreferrer">
                              <i class="fa fa-whatsapp mobil-icon" aria-hidden="true"></i>
                            </a>
                          </li>
                        </ul>
                        <div class="container-fluid justify-content-between text-white py-1 px-0 contact-info-mobil">
                            <div class="mail text-center">
                              <i class="fa fa-envelope pr-2"></i>info@doctorpescadosportfishing.com
                            </div>
                            <div class="tel text-center">
                              <i class="fa fa-phone pr-2"></i> FROM MÉXICO: +52 (624) 117 79 92
                            </div>
                            <div class="tel text-center">
                                <i class="fa fa-phone pr-2"></i> FROM TEXAS: +1 (214) 613-8296
                            </div>
                            <div class="tel text-center">
                                <i class="fa fa-phone pr-2"></i> FROM USA: +1 (213) 406-7627
                            </div>
                        </div>

                      </div>
                    </div>

                  </div> <!-- #menu-container -->

                </nav>
          </div>
        </header>

            @yield('content')

            @yield('map')

            <footer id="footer">
                <div class="container-fluid footer pt-4 px-4">
                    <div class="container">
                        <div class="row wrapper">
                            <div class="col-md-12 text-center">
                            <img src="{{asset('img/dr_pescado_logo.png') .'?'.date("Y-m-d")}}"
                                     alt=""
                                     width="250px"
                                     height="auto"
                                     class="img-fluid my-4"
                                >
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="{{url('/')}}">HOME</a> |
                                {{-- <a href="{{url('pangas')}}">PANGAS FLEET</a> |
                                <a href="{{url('/book-now')}}">BOOK NOW</a>|  --}}
                                <a href="charters">CHARTERS LIST</a> |
                                {{-- <a href="{{url('fishing-report')}}">FISHING REPORT</a> |  --}}
                                <a href="{{url('contact')}}">CONTACT US</a>
                            </div>
                            <div class="col-md-12 text-center my-2">
                                From MÉXICO: <a href="tel:+526241177992">+52 (624) 117 79 92</a> <br>
                                From TEXAS: <a href="tel:+526241177992">+52 (624) 117 79 92</a> <br>
                                From USA: <a href="tel:+526241177992">+52 (624) 117 79 92</a> <br>
                                Copyright {{date('Y')}} {{config('app.name')}}  <br>All rights reserved.
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="https://codemau5.com" target="_blank" style="font-size:12px">
                                  <i class="fa fa-bolt" aria-hidden="true" style="color:#ff0000"></i> powered by: <br>
                                  <img src="https://codemau5.com/img/poweredby_codemau5.png" alt="codemau5 web developer page" style="width:120px;position:relative;bottom:9px;left:5px">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

              <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
              <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>

              @yield('map-scripts')

              @yield('footer-scripts')
              <!--Start of Tawk.to Script-->
              <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/61edf2af9bd1f31184d8e36a/1fq4nnvjl';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
                })();
              </script>
              <!--End of Tawk.to Script-->

          </body>
      </html>
