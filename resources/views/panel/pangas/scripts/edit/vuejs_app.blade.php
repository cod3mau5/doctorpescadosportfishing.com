<script>
            var app= new Vue({
            el: '#master_app_1',
            data: {    
                boat_features: true,
                panga:{
                    id:'',
                    img:{},
                    name:'{{$panga->name}}',
                    max_anglers:'{{$panga->max_anglers}}',
                    feets:'{{$panga->feets}}',
                    description:'{{$panga->description}}'
                },
            },
            mounted: function()  {
            
                $('#submitPanga').click((event)=>{
                    event.preventDefault();
                    var vm= this;
                    var fd = new FormData();
                    var files = $('#imgPanga')[0].files[0];
                    fd.append('img',files);
                    fd.append('name',vm.panga.name);
                    fd.append('max_anglers',vm.panga.max_anglers);
                    fd.append('feets',vm.panga.feets);
                    fd.append('description',vm.panga.description);
                    fd.append('_token','{{ csrf_token() }}');
                    $.ajax({
                        type: "POST",
                        url: '{{ route("panga.store") }}',
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data: fd,
                        success: function(response)
                        {
                            if(response === "Error"){
                                // vm.total='0';
                                // vm.subtotal='0';
                                // vm.showPayPalBtns=false;
                            }else{
                                // vm.total='0';
                                // vm.subtotal='0';
                                // vm.subtotal=response.price.toString();
                                // var calcTotal= 16 * response.price / 100;
                                // calcTotal= calcTotal + response.price;
                                // calcTotal=calcTotal.toFixed(2); 
                                // vm.total= calcTotal.toString();
                                // vm.showPayPalBtns=true;
                            }
                        }
                    });
                });
            },
            methods:{
                previewFiles: function(event) {
                    this.panga.img=event.target.files;
                    return this.panga.img; 
                }
            },
            watch:{
                boat_features:function(){
                    app2.boat_features=this.boat_features;
                }
            }

        });
</script>