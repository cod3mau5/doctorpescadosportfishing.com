<table class="mx-auto tl-fixed w-100 mt-3">
    <thead>
        <tr>
            <th class="text-center m-text-head py-2">Duration</th>
            {{-- <th class="text-center m-text-head py-2 m-none">Description</th> --}}
            <th class="text-center m-text-head py-2">Max Anglers</th>
            <th class="text-center m-text-head py-2">Price</th>
            <th class="text-center m-text-head py-2">
                {{$charter->name}}
            </th>
        </tr>
    </thead>
    <tbody>

        @if ($charter->rate->full_day)
            <tr>
                <td class="text-center">
                    <b>Full Day </b><br>
                    {{$charter->rate->duration_full_day}}
                </td>
                {{-- <td class="break-this text-center m-none">
                    {{$charter->rate->full_day_description ? $charter->rate->full_day_description : $charter->rate->default_full_day_description }}
                </td> --}}
                <td class="text-center">
                    {{$charter->max_anglers}}
                </td>
                <td class="text-center">${{$charter->rate->full_day}}usd</td>
                @if ($charter->percentage_reservation)
                    <td class="text-center">
                        <a href="/book-now/charter/{{$charter->id}}/true">
                            <button class="m-button">Reserve full day with {{$charter->percentage_reservation}}%</button>
                        </a>
                    </td>
                    @else
                        <td class="text-center">
                            <a href="/book-now/charter/{{$charter->id}}/true">
                                <button class="m-button">Book full day</button>
                            </a>
                        </td>
                @endif
            </tr>
        @endif

        @if ($charter->rate->half_day)
            <tr>
                <td class="text-center">
                    <b>Half Day </b><br>
                    {{$charter->rate->duration_half_day}}
                </td>
                {{-- <td class="break-this text-center m-none">
                    {{$charter->rate->half_day_description ? $charter->rate->half_day_description : $charter->rate->default_half_day_description}}
                </td> --}}
                <td class="text-center">
                    {{$charter->max_anglers}}
                </td>
                <td class="text-center">${{$charter->rate->half_day}}usd</td>
                @if ($charter->percentage_reservation)
                <td class="text-center">
                    <a href="/book-now/charter/{{$charter->id}}/false">
                        <button class="m-button">Reserve half day with {{$charter->percentage_reservation}}%</button>
                    </a>
                </td>
                @else
                    <td class="text-center">
                        <a href="/book-now/charter/{{$charter->id}}/true">
                            <button class="m-button">Book half day</button>
                        </a>
                    </td>
            @endif
            </tr>
        @endif
    </tbody>
</table>
