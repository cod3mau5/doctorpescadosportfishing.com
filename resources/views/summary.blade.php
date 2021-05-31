@extends('layouts.master')

@section('styles')
    @include('partials.style_for_summary')
@endsection

@section('content')


        <div class="bg my-4" id="bg">

            <div class="card my-3">

                <span class="card__success"><i class="fa fa-check"></i></span>

                {{-- <h1 class="card__msg">Payment Complete</h1> --}}
                <h1 class="card__msg">Reservation Complete</h1>

                <h2 class="card__submsg">Thanks for your purchase.</h2>

                <div class="card__body">
                    <div class="card__recipient-info">
                        <p>We have successfully processed your information. Shortly our staff will contact you to confirm your reservation.</p>
                        <p>Also, an email was sent to you with a copy of the Service details.</p>
                    </div>

                    <h6 class="card__price">Thank you for your business!</h6>

                    {{-- <p class="card__method text-center">Payment method</p>
                    <div class="card__payment">
                        <img src="/img/paypal-logo-preview.png" class="card__credit-card">
                        <div class="card__card-details">

                        </div>
                    </div> --}}

                </div>

                <div class="card__tags">
                    <span class="card__tag">completed</span>
                    <span class="card__tag"># {{$reservation->orderID}}</span>
                </div>

            </div><!-- bg -->

        </div><!-- card -->

@endsection
