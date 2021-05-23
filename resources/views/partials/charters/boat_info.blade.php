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
                        <b>Origin:</b> <br>
                        {{$charter->captain->origin}}
                    </p>
                    {{-- <p class="mb-1">
                        <b>How long have they been fishing?</b> <br>
                        {{$charter->captain->experience}}
                    </p>
                    <p class="mb-1">
                        <b>Favorite fish?</b> <br>
                        {{$charter->captain->favorite_fish}}
                    </p> --}}
                    <p class="mb-1">
                        <b>About the crew:</b> <br>
                        {{$charter->captain->reason_to_fish}}
                    </p>
                    {{-- <p class="mb-1">
                        <b>Favorite hobby</b> <br>
                        {{$charter->captain->hobby}}
                    </p> --}}
                    <p>
                        <b>health information <span style="color:red">(COVID-19)</span></b><br>
                        After each tour We have the boats properly sanitized with all the sanitary measures that the Secretary of Health requires of us to be able to operate and give confidence to our clients. Our staff will wear mask if clients wish, they can use them during the tour or not use them. You can demand that the crew use them if it makes them feel safer.
                    </p>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-lg-12 px-4">
                    <p class="mb-1" style="font-size:1rem">
                        <b style="font-size:1rem">health information <span style="color:red">(COVID-19)</span></b><br>
                        After each tour We have the boats properly sanitized with all the sanitary measures that the Secretary of Health requires of us to be able to operate and give confidence to our clients. Our staff will wear mask if clients wish, they can use them during the tour or not use them. You can demand that the crew use them if it makes them feel safer.
                    </p>
                </div>
            </div>
        @endif
        <div class="row mb-3">

                @php
                    $fishing_gears = explode(',', $charter->feature->fishing_gear);
                    $boat_features= explode(',',$charter->feature->boat_features);
                @endphp

            <div class="col-lg-12">
                <div class="row">

                    {{-- Fishing Gear this time is not nesesary--}}

                    {{-- @if(empty($charter->percentage_reservation))
                        @for ($i=0;$i<=7;$i++)
                            @if ($i==0)
                                <div class="col-lg-4">
                                    <ul class="list-group list-group-flush pb-2">
                                        <li class="list-group-item p-1"><b>Fishing Gear:</b></li>
                            @endif
                                        @if ($i < 7)
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
                    @endif --}}

                      @for ($i = 0; $i < sizeof($fishing_gears); $i++)
                            @if ($i == 0)
                                <div class="col-lg-6">
                                    <ul class="list-group list-group-flush pb-2">
                                        <li class="list-group-item p-1"><b>Fishing Gear:</b></li>

                            @endif
                                        <li class="list-group-item p-0">
                                            {{$fishing_gears[$i]}}
                                        </li>
                            @if ($i == sizeof($fishing_gears)-1)
                                    </ul>
                                </div>
                            @endif
                    @endfor

                    <div class="col-lg-6">
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
