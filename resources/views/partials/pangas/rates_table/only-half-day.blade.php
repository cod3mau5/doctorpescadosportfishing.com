    <tr>
        <td class="text-center">
            <b>Half Day </b><br>
            {{$panga->rate->duration_half_day}}
        </td>
        <td class="break-this text-center m-none">
            {{$panga->rate->half_day_description ? $panga->rate->half_day_description : $panga->rate->default_half_day_description}}
        </td>
        <td class="text-center">
            {{$panga->max_anglers}}
        </td>
        <td class="text-center">${{$panga->rate->half_day}}usd</td>
        <td class="text-center">
            <a href="{{url('/book-now/panga/'.$panga->id.'/false')}}">
                <button class="m-button">Book half day</button>
            </a>
        </td>
    </tr>