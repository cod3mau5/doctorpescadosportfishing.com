@extends('layouts.master')

@section('content')

<section class="my-5">
    <div class="container">
        <div class="row">
            <h1 class="hero-title-blue">
                Contact Us
            </h1>
        </div>

        <div class="row">

            <div class="col-md-4">

                    <p id="suico_5ebb9593d6c74" class="su-icon">
                        <i class="fa fa-map-marker"></i>
                        <strong>Ubication:</strong><br/>
                        Andador Atun Dock 1-B Orange Gate Near Cabo Dolfins 23450 Cabo San Lucas, Baja California Sur Mexico.
                    </p>
                    <p id="suico_5ebb9593d6d7a" class="su-icon phone">
                        <i class="fa fa-phone"></i>
                        From USA: +52 (624) 117 79 92<br/>
                    </p>
                    {{-- <p id="suico_5ebb9593d6e65" class="su-icon phone">
                        <i class="fa fa-phone"></i>
                        USA. 000 00 0 000 000 00 00
                    </p> --}}


            </div>
            <div class="col-md-8">
                <div class="su-column-inner su-clearfix">
                    <p>
                        <div id="map" style="height: 256px;"></div>
                    </p>
                    <form  method="post" id="contact-form">
                        <div class="form-group">
                            <input class="form-control" name="fullname" id="fullname" required="" type="text" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="phone" id="phone" required="" pattern=".{8,10}" type="tel" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" required="" type="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" required="" rows="4" placeholder="Message"></textarea>
                        </div>

                        @csrf
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg w-max mt-2 float-right send-btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
</section>

@endsection

@section('footer-scripts')
<script  src="{{asset('/assets/jquery.validate.min.js')}}"></script>
<script  src="{{asset('/assets/additional-methods.min.js')}}"></script>
<script  src="{{asset('/assets/jquery.blockUI.min.js')}}"></script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcjB5D6m1N4UAcwssY-tmPYLTi2wgF7Uc&callback=initMap">
</script>
@include('partials.scripts.google_map')

<script>
    $(document).ready(function(){
        $('#m-button').click(function(){
            $('#navbarNavDropdown').toggle();
        });

        var sendButton = $('.send-btn');
        let form = $('#contact-form');

        form.validate({
            rules: {
                fullname: {
                    required: true
                },
                email: {
                    required: true
                },
                message: {
                    required: true
                }
            }
        });

        form.on('submit', function (e) {
            e.preventDefault();

            if (form.valid()) {
                var data = form.serialize();
                sendButton.html('<i class="fa fa-hourglass-o" aria-hidden="true"></i>');
                $.ajax({
                    url     : "/sendmail",
                    method  : "POST",
                    cache   : false,
                    dataType: "JSON",
                    data:       data,

                }).done(function(response)
                {

                    if (response.response == 'success') {
                            form[0].reset();

                            $.blockUI({
                                message: '<h2 style="font-weight:bolder;font-size:4em;text-align:center;margin-bottom:1rem">Message sent succesfully!</h2><br><p style="font-weight:bolder;font-size:2.8rem;line-height:1;text-align:center">We will get in touch with you very soon!</p>',
                                css: {
                                    width:'650px',
                                    border: 'none',
                                    padding: '15px',
                                    backgroundColor: '#34bf49',
                                    '-webkit-border-radius': '10px',
                                    '-moz-border-radius': '10px',
                                    opacity: .5,
                                    color: '#fff',
                                    top:'30%'
                                }
                            });
                            setTimeout(function(){
                                $.unblockUI();
                            }, 3000);


                        } else {
                            $('.alert-danger').slideToggle();
                        }
                });
            }
        });
    });
</script>
@endsection
