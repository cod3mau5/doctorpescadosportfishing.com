@extends('layouts.admin.master_admin')

@section('styles')
    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        .dynamic-list{
            display:flex;
            flex-direction:column;
            padding-left: 0;
            margin-bottom: 0;
        }
        .dynamic-list li{
            position: relative;
            display: block;
            padding:10px 20px;
            margin-bottom: 10px;
            background-color: #fff;
            border: 1px solid #c1c1c1;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            border-top-bottom-radius: .25rem;
        }
        .btn-sm{
            font-size: .7rem!important;
            line-height: 1.2!important;
        }
        label{
            font-size: 11px;
        }
        .label-boat-features{
            font-size: 11px;
        }
        @media(min-width:1200px){
            label{
                font-size: 1rem;
            }
            .label-boat-features{
                font-size: .9rem;
            }
        }
        .dz-default.dz-message{
            display: none;
        }

        .fa-1x {
            font-size: 1.5rem;
        }
        .navbar-toggler.toggler-example {
            cursor: pointer;
        }
        .dark-blue-text {
            color: #0A38F5;
        }
        .dark-pink-text {
            color: #AC003A;
        }
        .dark-amber-text {
            color: #ff6f00;
        }
        .dark-teal-text {
            color: #004d40;
        }
        #navbarSon1{
            display: none;
        }
        #navbarSon2{
            display: none;
        }
        #navbarSon3{
            display: none;
        }
        #navbarSon4{
            display: none;
        }
        

        .navbarSon1,
        .navbarSon2,
        .navbarSon3,
        .navbarSon4{
            opacity: 0;
            -webkit-transition: all 1.5s ease-in-out;
            -moz-transition: all 1.5s ease-in-out;
            -ms-transition: all 1.5s ease-in-out;
            -o-transition: all 1.5s ease-in-out;
            transition: all 1.5s ease-in-out;
        }
        .opaco{
            opacity: 1;
        }

        .navbar-collapse-burguer{
            opacity: 0;
            height: 0px;
            transition: height 0.3s ease-in;
        }
        .collapsed-active{
            opacity: 1!important;
            transition: height 0.3s ease-out;
        }
        .collapsed-active ul{
            opacity: 1!important;
            height: inherit!important;
        }
        /* .navbar-collapse-header{
            display: block!important;
        } */
        .display-block{
            display: block!important;
        }
        .bg-secondary {
            background-color: #6c757d!important;
        }
        .not-show{
            display: block!important;
            height: 0px;
        }

        .section-disabled{
            cursor:not-allowed!important;
        }
        .btn-edit{
            background-color: #662e9b;
            font-size:18px;
            font-weight:bolder;
            color: #fff;
        }
        .btn-edit:hover{
            color: #fff!important;
        }
        .dz-filename{
            display:none!important;
        }

    </style>

@endsection

@section('content')
<div class="container-fluid" id="app">
    <div class="row">
        @if(Session::has('message'))

            <div class="container">
                <div class="alert  alert-{{Session::get('typealert')}} {{Session::get('display')}} alert-dismissible fade show floating-alert my-3" role="alert" style="flex-direction: column;justify-content: center;height:auto">
                    {{Session::get('message')}}
                    <button type="button" class="close" id="closeAlert" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)

                                <li>{{$error}}</li>

                            @endforeach
                        </ul>

                    @endif
                    <script>
                        $('.alert').slideDown();
                        $('#closeAlert').click(function(){$('.alert').slideUp()});
                        setTimeout(
                            function(){$('.alert').slideUp();},8000
                        );
                    </script>
                </div>
            </div>


        @endif
        @if(!empty($panga) && !empty($rates[0]) && !empty($captain)  && !empty($boatSpecs)){{-- ALL DATA --}}        
            <edit-panga 
                csrf_token="{{csrf_token()}}"
                url="{{url('')}}"
                this_panga='@json($panga)'
                panga_images='@json($panga_images)'
                panga_rates='@json($rates[0])'
                panga_captain='@json($captain)'
                boat_specs='@json($boatSpecs)'>
            </edit-panga>
            @elseif( !empty($panga) && empty($rates[0]) && empty($captain)  && empty($boatSpecs) ){{-- ONLY PANGA --}}
                <only-panga
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)'>
                </only-panga>
            @elseif( !empty($panga) && empty($rates[0]) && empty($captain)  && empty($boatSpecs) ){{-- ONLY PANGA --}}
                <panga-captain
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)'
                    panga_captain='@json($captain)'>
                </panga-captain>
            @elseif( !empty($panga) && !empty($boatSpecs) && empty($rates[0]) && empty($captain)  ){{-- PANGA & BOAT SPECS --}}
                <panga-boat-specs
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)'
                    boat_specs='@json($boatSpecs)'>
                </panga-boat-specs>
            @elseif( !empty($panga) && !empty($boatSpecs) && !empty($captain) && empty($rates[0])   ){{-- PANGA, BOAT SPECS & CAPTAIN --}}
                <panga-boat-specs-captain
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)'
                    boat_specs='@json($boatSpecs)'
                    panga_captain='@json($captain)'>
                </panga-boat-specs-captain>
            @elseif( !empty($panga) && !empty($boatSpecs) && !empty($rates[0]) && empty($captain)  ){{-- PANGA, BOAT SPECS & RATES --}}
                <panga-boat-specs-rates
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)'
                    boat_specs='@json($boatSpecs)'
                    panga_rates='@json($rates[0])'>
                </panga-boat-specs-rates>
            @elseif( !empty($panga) && !empty($boatSpecs) && !empty($rates[0]) && !empty($captain)  ){{-- PANGA, BOAT SPECS, RATES & CAPTAIN --}}
                <panga-boat-specs-rates-captain
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)' 
                    boat_specs='@json($boatSpecs)'
                    panga_rates='@json($rates[0])'
                    panga_captain='@json($captain)'>
                </panga-boat-specs-rates-captain>
            @elseif( !empty($panga) && empty($rates[0])  && !empty($captain)  && !empty($boatSpecs) ){{-- NOT RATES --}}
                <not-rates
                        csrf_token="{{csrf_token()}}"
                        url="{{url('')}}"
                        this_panga='@json($panga)'
                        panga_images='@json($panga_images)'
                        panga_captain='@json($captain)'
                        boat_specs='@json($boatSpecs)'>
                </not-rates>
            @elseif( !empty($panga) && empty($rates[0])  && empty($captain)  && !empty($boatSpecs) ){{-- NO CAPTAIN NO RATES --}}
                <no-captain-no-rates
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)'
                    boat_specs='@json($boatSpecs)'>
                </no-captain-no-rates>
            @elseif( !empty($panga) && !empty($rates[0])  && empty($captain)  && !empty($boatSpecs) ){{-- NO CAPTAIN --}}
                <no-captain
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)'
                    panga_rates='@json($rates[0])'
                    boat_specs='@json($boatSpecs)'>
                </no-captain>
            @elseif( !empty($panga) && !empty($rates[0])  && empty($captain) && empty($boatSpecs) ){{-- ONLY PANGA AND RATES --}}
                <panga-rates 
                    csrf_token="{{csrf_token()}}"
                    url="{{url('')}}"
                    this_panga='@json($panga)'
                    panga_images='@json($panga_images)'
                    panga_rates='@json($rates[0])'>
                </panga-rates>
        @endif

    </div>{{--  .row --}}
</div>


@endsection

@section('scripts')
{{-- <script>
    document.addEventListener('DOMContentLoaded',() => {
        alert('hello, world!');
    });

</script> --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('../js/vue.js') }}"></script> --}}

    {{-- CUSTOM FUNCTIONS --}}
    {{-- @include('panel.pangas.scripts.edit.vuejs_app2')
    @include('panel.pangas.scripts.edit.vuejs_app') --}}

    @include('panel.pangas.scripts.general_functions')

@endsection