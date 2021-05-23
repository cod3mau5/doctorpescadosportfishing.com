<script>

    var app2= new Vue({
        el: '#master_app_2',
        data: {      
            boat_features: true,
        },
        mounted: function(){

        },
        methods:{
            checkSection: function(value) {
                alert('value about to change');
                    this.boat_features= document.getElementById("boat_features_model").value;
                    return this.boat_features;
        
            }
        },
    
    });


</script>