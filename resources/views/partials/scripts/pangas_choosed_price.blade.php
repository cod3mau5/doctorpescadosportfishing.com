<script> 
    if("{{$price}}" === 'false'){
        var duration= "{{$panga->rate->duration_half_day}}"+'_'+"{{ $panga->rate->half_day  }}";
    }else if("{{$price}}" === 'true'){
        var duration= "{{$panga->rate->duration_full_day}}"+'_'+"{{ $panga->rate->full_day  }}";
    }
</script>