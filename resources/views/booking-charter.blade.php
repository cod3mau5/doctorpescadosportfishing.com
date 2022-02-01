@extends('layouts.master')
@section('pangas-styles')

    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@700&display=swap" rel="stylesheet">
    {{-- <script
        src="https://www.paypal.com/sdk/js?client-id={{config('paypal.client_id')}}&currency=USD"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script> --}}
    @include('partials.general_style_forPangas')
    <link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
    <link href="{{asset('css/bootstrap-glyphicons.css')}}" rel="stylesheet">

@endsection

@section('content')


    <div class="container mt-3 mb-5" 
        id="booking">
        <div class="modal fade" 
        id="modal-container-633658" 
        role="dialog" 
        aria-labelledby="myModalLabel" 
        aria-hidden="true">

        </div>
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
                                <h4 class="panga_title m-0 text-center mb-3">{{$charter->name}} <small>{{$charter->feets}}ft</small></h4>
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

                                        @if($price ?? '')
                                            @if(!empty($price) || $price === "false")
                                                @elseif($price === null)
                                                    <option selected="selected">Choose Duration</option>
                                            @endif
                                        @endif
                                        @if(empty($price))
                                            <option disabled selected="selected">Choose Duration</option>
                                        @endif

                                       @if (!empty($charter->rate->half_day)){{-- IF HALF DAY PRICE EXIST --}}

                                           @if ($charter->percentage_reservation){{-- IF RESERVATION WITH DISCOUNT EXIST --}}
                                                @php
                                                    $calcPercentaje= $charter->percentage_reservation * $charter->rate->half_day / 100;
                                                @endphp

                                                <option value="{{ $charter->rate->duration_half_day  }}_{{ $calcPercentaje  }}"

                                                        @if($price ?? ''){{-- IF $PRICE EXIST MEANS THAT THE USER CHOOSE THE PRICE FROM THE PAGE BEFORE THIS --}}
                                                            @if(!empty($price) || $price === "false") selected @endif
                                                        @endif
                                                    >
                                                    <span>Half day {{ $charter->rate->duration_half_day }}</span> - ${{ $calcPercentaje  }}USD
                                                </option>



                                               @else
                                                    <option value="{{ $charter->rate->duration_half_day  }}_{{ $charter->rate->half_day  }}"

                                                            @if($price ?? ''){{-- IF $PRICE EXIST MEANS THAT THE USER CHOOSE THE PRICE FROM THE PAGE BEFORE THIS --}}
                                                                @if(!empty($price) || $price === "false") selected @endif
                                                            @endif
                                                        >
                                                        <span>Half day {{ $charter->rate->duration_half_day }}</span> - ${{ $charter->rate->half_day  }}USD
                                                    </option>


                                           @endif

                                        @endif


                                        @if (!empty($charter->rate->full_day)){{-- IF FULL DAY PRICE EXIST --}}

                                            @if (!empty($charter->percentage_reservation)){{-- IF RESERVATION WITH DISCOUNT EXIST --}}
                                                @php
                                                    $calcPercentaje= $charter->percentage_reservation * $charter->rate->full_day / 100;
                                                @endphp

                                                <option value="{{ $charter->rate->duration_full_day  }}_{{ $calcPercentaje  }}"

                                                        @if($price ?? ''){{-- IF $PRICE EXIST MEANS THAT THE USER CHOOSE THE PRICE FROM THE PAGE BEFORE THIS --}}
                                                            @if(!empty($price) || $price === "true") selected @endif
                                                        @endif
                                                    >
                                                    <span>Full day {{ $charter->rate->duration_full_day }}</span> - ${{ $calcPercentaje  }}USD
                                                </option>



                                                @else
                                                    <option value="{{ $charter->rate->duration_full_day  }}_{{ $charter->rate->full_day  }}"

                                                            @if($price ?? ''){{-- IF $PRICE EXIST MEANS THAT THE USER CHOOSE THE PRICE FROM THE PAGE BEFORE THIS --}}
                                                                @if(!empty($price) || $price === "true") selected @endif
                                                            @endif
                                                        >
                                                        <span>Full day {{ $charter->rate->duration_full_day }}</span> - ${{ $charter->rate->full_day  }}USD
                                                    </option>



                                            @endif

                                        @endif

                                        {{-- @if ($charter->rate->full_day)

                                            <option value="{{ $charter->rate->duration_full_day }}_{{ $charter->rate->full_day }}"
                                                @if($price ?? '')
                                                    @if(!empty($price) || $price === "true") selected @endif
                                                @endif
                                            >
                                                <span>Full day {{ $charter->rate->duration_full_day }}</span> - ${{ $charter->rate->full_day }}USD
                                            </option>

                                        @endif --}}

                                    </select>
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-md-6 form-group">

                                    <label class="required" for="anglers">Anglers</label>
                                    <select name="anglers" id="anglers" class="form-control" v-model="anglers" @change="checkFields">
                                        <option disabled="disabled" selected="selected">Choose max anglers</option>
                                        @for ($i = 1; $i <= $charter->max_anglers; $i++)
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
                                        <option value="7:00:00">7:00 AM</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="clientOrigin">
                                        How did you find our website?
                                    </label><br>
                                    <select name="clientOrigin" class="form-control" v-model="clientOrigin">
                                        <option value="none" disabled selected></option>
                                        <option value="Google">Google</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="YouTube">YouTube</option>
                                        <option value="Recomended">Recomended by a friend</option>
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-12">
                                <label for="special_request">Special Request</label><br>
                                <textarea type="text" name="special_request" rows="6" class="form-control" v-model="specialRequest"></textarea>
                            </div>
                        </div>
                    </div>




                    <input name="total_cost" id="total" amountdata="" type="hidden">
                    <input name="voucher" id="voucher" vouchertdata="BOATS-BAJA-497484649" type="hidden" value="BOATS-BAJA-497484649">
                    <input name="_token" id="csrf-token" type="hidden" value="{{csrf_token()}}">

                    <transition name="fade" mode="out-in">
                            {{-- <div id="paypal-button-container" class="mt-5" v-show="showPayPalBtns"></div> --}}
                            <div class="btn btn-success mt-5 float-right"
                            v-show="showPayPalBtns"     
                            @click="sendReservation">
                                Reserve now
                            </div>
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

                    <p class="summary-title"><strong><i class="fa fa-info-circle" aria-hidden="true"></i></strong> ORDER SUMMARY </p>

                        <div class="summary-content mt-lg-4">

                            <p class="text-center mb-4"><img src="{{$charter->img}}" class="w-100 thumbnail"></p>

                            <p class="boat_name">
                                <span>CHARTER:</span> <br>
                                <b>{{$charter->name}}</b>
                            </p>

                            <p class="boat_name">
                                <span>DATE:</span> <br>
                                <b v-if="fishingDate">@{{ fishingDate }}</b>
                                <b v-else> <i class="fa fa-question-circle" aria-hidden="true"></i> </b>
                            </p>

                            <p class="boat_name">
                                <span>DURATION:</span> <br>
                                <b v-if="fishingDuration">@{{fishingDuration.slice(0, 1)+'Hrs'}}</b>
                                <b v-else><i class="fa fa-question-circle" aria-hidden="true"></i></b>
                            </p>

                            <p class="boat_name">
                                <span>#ANGLERS:</span> <br>
                                <b v-if="anglers">@{{anglers}}</b>
                                <b v-else><i class="fa fa-question-circle" aria-hidden="true"></i></b>
                            </p>

                            {{-- <p class="boat_name text-center">
                                <span>SUBTOTAL:</span> <br>
                                <b>$@{{subtotal}} USD</b>
                            </p> --}}

                            <p class="boat_name text-center">
                                <span>TOTAL:</span> <br>
                                <b style="line-height: .8">$@{{total}} USD <br>
                                {{-- <small class="taxes" v-if="total !== '0'">(TAXES INCLUDED)</small> --}}
                                </b>
                            </p>

                        </div>
                        <div class="summary-footer"></div>
                    </button>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('footer-scripts')

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('../js/vue.js') }}"></script>
<script src="{{ asset('../js/axios.min.js') }}"></script>
    <script src="{{ asset('/js/moment.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        var duration= ''
    </script>
    @if($price ?? '')
        @include('partials.scripts.charters_choosed_price')
    @endif

    @include('partials.scripts.charters_vue_js')

@endsection
