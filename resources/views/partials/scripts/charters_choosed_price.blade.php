{{-- {{dd($charter->rate->duration_full_day)}} --}}
<script> 
    if("{{$price}}" === 'false'){
        if("{{$charter->percentage_reservation}}"){
            var duration= "{{$charter->percentage_reservation * $charter->rate->half_day / 100}}"
            duration= "{{$charter->rate->duration_half_day}}"+'_'+duration;
            // alert(duration)
        }else{
            var duration= "{{$charter->rate->duration_half_day}}"+'_'+"{{ $charter->rate->half_day  }}";
            // alert(duration)
        }
    }else if("{{$price}}" === 'true'){
        if("{{$charter->percentage_reservation}}"){
            var duration= "{{$charter->percentage_reservation * $charter->rate->full_day / 100}}"
            duration= "{{$charter->rate->duration_full_day}}"+'_'+duration;
            // alert(duration)
        }else{
            var duration= "{{$charter->rate->duration_full_day}}"+'_'+"{{ $charter->rate->full_day  }}";
            // alert(duration)
        }
    }
</script>