<script>
    function initMap() {
        var uluru = {lat:22.879278, lng: -109.910536};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcjB5D6m1N4UAcwssY-tmPYLTi2wgF7Uc&callback=initMap">
</script>
