@extends('layouts.master')
@section('pangas-styles')
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@700&display=swap" rel="stylesheet">

      <script
            src="https://www.paypal.com/sdk/js?client-id={{config('paypal.client_id')}}&currency=USD"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
        </script>
    {{-- <style>
        .boat_title {
            font-family: 'Rowdies', cursive !important;
            font-size: 3rem;
            letter-spacing: 1px;
        }



        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }
        
        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 55%;
                margin: 0 auto;
            }
        }
        
        a.danger{
            color: red!important;
            font-weight: 700;
        }
        .fade-enter-active, .fade-leave-active {
            transition: opacity .8s;
        }
        .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
            opacity: 0;
        }
        .required:after {
            content:" *";
            color: red;
            font-weight: 900;
        }
    </style> --}}
    @include('partials.general_style_forPangas')
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    <link href="{{asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="container mt-3 mb-5" id="booking">
        <div class="row mx-0">
            <div class="col-lg-8">
                @if (session('status'))
                    <div class="alert alert-danger text-center mt-2">
                        <a href="contact" class="danger">
                            {{ session('status') }}
                        </a>
                    </div>
                @endif
                <form id="form_details" class="container-fluid px-0 form_details">
                    <div class="reservation_details">
                        <div class="row">
                            <div class="px-4 py-2 mx-3 w-100 bar blue_bar">
                                <h4 class="panga_title m-0 text-center mb-3">{{$panga->name}} <small>{{$panga->feets}}ft</small></h4>
                            </div>
                        </div>
                        <div class="col-md-12 client_details">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="required" for="fullname">First Name</label><br>
                                    <input type="text" name="firstName" class="form-control" v-model="firstName" @change="checkFields">
                                   
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="required" for="fullname">Last Name</label><br>
                                    <input type="text" name="fullname" class="form-control" v-model="lastName" @change="checkFields">
                                   
                                </div>
                             
                            </div>
                            
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label class="required" for="email">Email</label><br>
                                    <input type="email" name="email" required="required" class="form-control" v-model="email" @change="checkFields">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="required" for="duration">Fishing Duration</label><br>
                                    <select name="duration" id="duration" class="form-control" v-model="fishingDuration" @change="checkFields">
                                        <option disabled="disabled" selected="selected">Choose Duration</option>
                                        <option value="{{ $panga->rate->duration_half_day  }}_{{ $panga->rate->half_day  }}">
                                            <span>Half day {{ $panga->rate->duration_half_day }} </span> - ${{ $panga->rate->half_day  }}USD
                                        </option>

                                        <option value="{{ $panga->rate->duration_full_day }}_{{ $panga->rate->full_day }}">
                                            <span>Full day {{ $panga->rate->duration_full_day }} </span> - ${{ $panga->rate->full_day }}USD
                                        </option>
                                    </select>
                                </div>
                                

                            </div>

                            <div class="row">
                               
                                <div class="col-md-6 form-group">

                                    <label class="required" for="anglers">Anglers</label>
                                    <select name="anglers" id="anglers" class="form-control" v-model="anglers" @change="checkFields">
                                        <option disabled="disabled" selected="selected">Choose max anglers</option>
                                        @for ($i = 1; $i <= $panga->max_anglers; $i++)
                                            <option value="{{ $i }}">
                                                <span>{{ $i }} anglers</span>
                                            </option>
                                        @endfor
                                    </select>

                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="required" for="trip_date">Fishing date</label><br>
                                    <input type="text" name="trip_date" v-model="fishingDate" id="datetimepicker7" required="required"
                                        class="calendario form-control" @click="checkFields" @change="checkFields">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 date_details">
                           
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label class="required" for="time">Trip starting time</label><br>
                                    <select name="time" id="" class="form-control" v-model="startingTime" @change="checkFields">
                                        <option value="6:00:00">6:00 AM</option>
                                        <option value="6:30:00">6:30 AM</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="clientOrigin">
                                        How did you find our website?
                                    </label><br>
                                    <select name="clientOrigin" class="form-control" v-model="clientOrigin">
                                        <option value="" disabled selected></option>
                                        <option value="">Google</option>
                                        <option value="">Facebook</option>
                                        <option value="">Instagram</option>
                                        <option value="">YouTube</option>
                                        <option value="">Recomended by a friend</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 date_details form-group">
                            <div class="row">
                                <label for="special_request">Special Request</label><br>
                                <textarea type="text" name="special_request" rows="6" class="form-control" v-model="specialRequest"></textarea>
                            </div>
                        </div>

                    </div>

                  


                    <input name="total_cost" id="total" amountdata="" type="hidden"> 
                    <input name="voucher" id="voucher" vouchertdata="BOATS-BAJA-497484649" type="hidden" value="BOATS-BAJA-497484649"> 
                    <input name="_token" id="csrf-token" type="hidden" value="{{csrf_token()}}"> 

                    <transition name="fade" mode="out-in">
                            <div id="paypal-button-container" class="mt-5" v-show="showPayPalBtns"></div>    
                    </transition>
                    

                    <transition name="fade" mode="out-in">
                        
                        <div v-show="!showPayPalBtns">
                            <div class="alert alert-secondary text-center mt-3" role="alert">
                                Complete all the required fields to see the booking button...
                            </div>
                        </div>

                    </transition>

                </form>

            </div>
            <div class="col-lg-4 d-flex">
                <div class="alert alert-summary d-flex flex-column w-100 px-4 pt-4" role="alert">

                    <p class="summary-title"><strong><i class="fa fa-info-circle" aria-hidden="true"></i></strong> ORDER  SUMMARY </p>
                        
                        <div class="summary-content mt-lg-4">

                            <p class="boat_name">
                                <b>{{$panga->name}}</b>
                            </p>
                            
                            {{-- <p class="text-center mb-4"><img src="{{$panga->img}}" class="w-100 thumbnail"></p> --}}


                            <p class="boat_name">
                                <span>DATE:</span> <br>
                                <b v-if="fishingDate">@{{ fishingDate }}</b>
                                <b v-else> <i class="fa fa-question-circle" aria-hidden="true"></i> </b>
                            </p>

                            <p class="boat_name">
                                <span>DURATION:</span> <br>
                                <b v-if="fishingDuration">@{{fishingDuration.slice(0, 4)}}</b>
                                <b v-else><i class="fa fa-question-circle" aria-hidden="true"></i></b>
                            </p>

                            <p class="boat_name">
                                <span>#ANGLERS:</span> <br>
                                <b v-if="anglers">@{{anglers}}</b>
                                <b v-else><i class="fa fa-question-circle" aria-hidden="true"></i></b>
                            </p>

                            <p class="boat_name text-center">
                                <span>SUBTOTAL:</span> <br>
                                <b>$@{{subtotal}} USD</b>
                            </p>

                            <p class="boat_name text-center">
                                <span>TOTAL:</span> <br>
                                <b style="line-height: .8">$@{{total}} USD <br><small class="taxes" v-if="total !== '0'">(TAXES INCLUDED)</small></b>
                            </p>

                        </div>
                        <div class="summary-footer"></div>
                    </button>
                </div>
            </div>

        </div>
    </div>

    @section('map')
        <div id="map"></div>
    @endsection
    @section('map-scripts')
        @include('partials.scripts.google_map')
    @endsection

@endsection

@section('footer-scripts')

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('../js/vue.js') }}"></script>
<script src="{{ asset('../js/axios.min.js') }}"></script>
    <script src="{{ asset('/js/moment.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>


    <script>
            
        var app = new Vue({
                el: '#booking',
                data: {
                    id: "{{$panga->id}}",
                    firstName: '',
                    lastName: '',
                    email:'',
                    fishingDuration: '',
                    anglers: '',
                    fishingDate: '',
                    startingTime:'',
                    specialRequest:'',
                    clientOrigin: '',
                    showPayPalBtns:false,
                    subtotal: '0',
                    total: '0',
                },//data
                mounted: function (){
                    var vm= this;
                    var duration= vm.fishingDuration.slice(0, 4);
                    $('#datetimepicker7').datetimepicker({
                        useCurrent: true, //Important! See issue #1075
                        format: 'YYYY-MM-DD',
                        minDate: moment()
                    });

        
                    // AQUI SE METE EL VALOR YA QUE SOLAMENTE CON EL PURO V-MODEL NO SE PUEDE
                    $('#datetimepicker7').on("dp.change", function (e) {
                        vm.fishingDate= $('#datetimepicker7').val();
                    });


                    paypal.Buttons({
                        createOrder: function(data, actions) {
                            if(vm.specialRequest=== ''){
                                vm.specialRequest='No request.';
                            }
                            vm.fishingDuration.slice(0, 4);         
                            var duration=vm.fishingDuration.slice(0, 4);

                        // This function sets up the details of the transaction, including the amount and line item details.
                        return actions.order.create({
                            intent: 'CAPTURE',
                            payer: {
                                name: {
                                    given_name: vm.firstName,
                                    surname: vm.lastName
                                },
                                email_address: vm.email,
                            },
                            purchase_units: [{
                                amount: {
                                    value: vm.total
                                },
                                description: "{{$panga->name}} {{$panga->feets}}ft"+","+duration+","+vm.anglers+","+vm.fishingDate+","+vm.startingTime+","+vm.subtotal+","+vm.clientOrigin+","+vm.specialRequest
                            }],
                            application_context : { 
                                shipping_preference:"NO_SHIPPING"
                            },
                        });

                        },
                        onApprove: function(data, actions) {
                            // This function captures the funds from the transaction.
                            return actions.order.capture().then(function(details) {
                                // This function shows a transaction success message to your buyer.
                                // alert('Transaction completed by ' + details.payer.name.given_name);
                                window.location= '/reservation/completed/'+data.orderID;
                            });
                        }
                    }).render('#paypal-button-container');
                    //This function displays Smart Payment Buttons on your web page.
                },
                watch: {
                    total: function (newVal) {
                        var vm=this;

                        if(
                            vm.firstName == '' 
                            || vm.lastName  == '' 
                            || vm.email  == '' 
                            || vm.fishingDuration  == '' 
                            || vm.anglers  == '' 
                            || vm.fishingDate  == '' 
                            || vm.startingTime  == '' 
                        )
                        {
                            return vm.showPayPalBtns=false;
                        }

                        if(vm.fishingDuration === '' || vm.id !== "{{$panga->id}}"){
                            vm.id="{{$panga->id}}";
                            $.ajax({
                                type: "POST",
                                url: '/getPangaPrice',
                                data: {
                                    id: vm.id,
                                    duration: vm.fishingDuration.slice(0, 4),
                                    _token: '{{ csrf_token() }}'
                                },
                                
                                success: function(response)
                                {
                                    vm.total='';
                                    if(response === "Error"){
                                        vm.total='0';
                                        vm.subtotal='0';
                                        vm.showPayPalBtns=false;
                                    }else{
                                        vm.subtotal=response.price.toString();
                                        var calcTotal= 16 * response.price / 100;
                                        calcTotal= calcTotal + response.price;
                                        calcTotal=calcTotal.toFixed(2);
                                        vm.total= calcTotal.toString();
                                        
                                        vm.showPayPalBtns=true;
                                    }
                                }
                            }); 
                        }else{
                            $.ajax({
                                type: "POST",
                                url: '/getPangaPrice',
                                data: {
                                    id: vm.id,
                                    duration: vm.fishingDuration.slice(0, 4),
                                    _token: '{{ csrf_token() }}'
                                },
                                
                                success: function(response)
                                {
                                    vm.total='';
                                    if(response === "Error"){
                                        vm.total='0';
                                        vm.subtotal='0';
                                        alert('Warning! the data cannot be modifiable by this medium.');
                                        vm.showPayPalBtns=false;
                                    }else{
                                        vm.subtotal=response.price.toString();
                                        var calcTotal= 16 * response.price / 100;
                                        calcTotal= calcTotal + response.price;
                                        calcTotal=calcTotal.toFixed(2);
                                        vm.total= calcTotal.toString();
                                        vm.showPayPalBtns=true;
                                    }
                                }
                            }); 
                        }
                    }//total()
                },
                methods:{                        
                    checkFields(){
                        var vm=this;
                        let res= this.fishingDuration.slice(5, 8);
                        vm.total=res;

                        if(
                            vm.firstName == '' 
                            || vm.lastName  == '' 
                            || vm.email  == '' 
                            || vm.fishingDuration  == '' 
                            || vm.anglers  == '' 
                            || vm.fishingDate  == '' 
                            || vm.startingTime  == '' 
                        )
                        {
                            vm.total='0';
                            vm.subtotal='0';
                            vm.showPayPalBtns=false;
                        }
                        else{

                            $.ajax({
                                type: "POST",
                                url: '/getPangaPrice',
                                data: {
                                    id: vm.id,
                                    duration: vm.fishingDuration.slice(0, 4),
                                    _token: '{{ csrf_token() }}'
                                },
                                
                                success: function(response)
                                {
                                    if(response === "Error"){
                                        vm.total='0';
                                        vm.subtotal='0';
                                        vm.showPayPalBtns=false;
                                    }else{
                                        vm.total='0';
                                        vm.subtotal='0';
                                        vm.subtotal=response.price.toString();
                                        var calcTotal= 16 * response.price / 100;
                                        calcTotal= calcTotal + response.price;
                                        calcTotal=calcTotal.toFixed(2);
                                        vm.total= calcTotal.toString();
                                        vm.showPayPalBtns=true;
                                    }
                                }
                            });
                            
                        } 
                    },//checkFields()
                },//methods
            });//Vue
            
    </script> 

@endsection
