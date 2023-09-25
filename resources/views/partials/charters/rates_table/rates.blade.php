<div class="alert alert-warning mt-3" role="alert">
    <h4 class="alert-heading text-center">
        <b>
            IMPORTANT!
        </b>
    </h4>
    <p>
        Due to the low exchange rate of the dollar against the peso and the high cost of fuel, I find myself in the not very pleasant need to increase the price of my services, all in order to be able to offer a better opportunity to take them to where you, my clients, are.
    </p>
    <hr>
    <p class="mb-0">
        <small>
            As always, it has been the best opportunity and longest fishing time without skimping on fuel. I hope for your understanding and here we will be waiting for you as always with great enthusiasm and with a lot of passion for fishing.
        </small>
    </p>
</div>

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
