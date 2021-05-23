<div class="col-lg-6 mb-4 boat_info_column">
    <div class="description_box">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{url($panga->captain->captain_img)}}" class="w-100" alt="">
            </div>
            <div class="col-lg-6">
                <h4 class="mb-1">{{$panga->captain->name}}</h4>

                @if($panga->name == 'Doctor Pescado I')

                    <p class="mb-1">
                        <b>Experience:</b> <br>
                        More than {{$panga->captain->experience}} years in sport fishing.
                    </p>
                    <p class="mb-1">
                        <b>Favorite fish?</b> <br>
                        {{$panga->captain->favorite_fish}}
                    </p>
                    <p class="mb-1">
                        <b>About the captain</b> <br>
                        {{$panga->captain->reason_to_fish}}
                    </p>
                    <p>
                        <b>health information <span style="color:red">(COVID-19)</span></b><br>
                        After each tour We have the boats properly sanitized with all the sanitary measures that the Secretary of Health requires of us to be able to operate and give confidence to our clients. Our staff will wear mask if clients wish, they can use them during the tour or not use them. You can demand that the crew use them if it makes them feel safer.
                    </p>
                    @else
                    <p class="mb-1">
                        <b>Origin:</b> <br>
                        {{$panga->captain->origin}}
                    </p>
                    <p class="mb-1">
                        <b>Experience</b> <br>
                        {{$panga->captain->experience}}
                    </p>
                    {{-- <p class="mb-1">
                        <b>Favorite fish?</b> <br>
                        {{$panga->captain->favorite_fish}}
                    </p> --}}
                    <p class="mb-1">
                        <b>About the crew:</b> <br>
                        {{$panga->captain->reason_to_fish}}
                    </p>
                    {{-- <p class="mb-1">
                        <b>Favorite hobby</b> <br>
                        {{$panga->captain->hobby}}
                    </p> --}}
                    <p>
                        <b>health information <span style="color:red">(COVID-19)</span></b><br>
                        After each tour We have the boats properly sanitized with all the sanitary measures that the Secretary of Health requires of us to be able to operate and give confidence to our clients. Our staff will wear mask if clients wish, they can use them during the tour or not use them. You can demand that the crew use them if it makes them feel safer.
                    </p>
                @endif
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
                            <div class="col-lg-6">
                                <ul class="list-group list-group-flush pb-2">
                                    <li class="list-group-item p-1"><b>Fishing Gear:</b></li>
                        @endif
                            @if ($i < sizeof($fishing_gears)                                                                                                                                  )
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
                                <div class="col-lg-6">
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
    @endif
    </div>

    <a href="/book-now/panga/{{$panga->id}}">
        <button class="btn-book-now w-100">BOOK {{strtoupper($panga->name)}} NOW</button>
    </a>
</div>
