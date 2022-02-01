<script>
    var app = new Vue({
                el: '#booking',
                data: {
                    id: "{{$charter->id}}",
                    firstName: '',
                    lastName: '',
                    email:'',
                    fishingDuration: duration,
                    anglers: '',
                    fishingDate: '',
                    startingTime:'',
                    specialRequest:'',
                    clientOrigin:'',
                    showPayPalBtns:false,
                    subtotal: '0',
                    total: '0',
                },//data
                mounted: function (){
                    var vm= this;
                    var duration= vm.fishingDuration.slice(0, 1);
                    $('#datetimepicker7').datetimepicker({
                        useCurrent: true, //Important! See issue #1075
                        format: 'YYYY-MM-DD',
                        minDate: moment()
                    });

      
                    // AQUI SE METE EL VALOR YA QUE SOLAMENTE CON EL PURO V-MODEL NO SE PUEDE
                    $('#datetimepicker7').on("dp.change", function (e) {
                        vm.fishingDate= $('#datetimepicker7').val();
                    });


                    // paypal.Buttons({
                    //     createOrder: function(data, actions) {
                    //         if(vm.specialRequest=== ''){
                    //             vm.specialRequest='No request.';
                    //         }
                    //         vm.fishingDuration.slice(0, 1);         
                    //        var duration=vm.fishingDuration.slice(0, 1);

                    //     // This function sets up the details of the transaction, including the amount and line item details.
                    //     return actions.order.create({
                    //         intent: 'CAPTURE',
                    //         payer: {
                    //             name: {
                    //                 given_name: vm.firstName,
                    //                 surname: vm.lastName
                    //             },
                    //             email_address: vm.email,
                    //         },
                    //         purchase_units: [{
                    //             amount: {
                    //                 value: vm.total
                    //             },
                    //             description: "{{$charter->name}} {{$charter->feets}}ft"+","+duration+","+vm.anglers+","+vm.fishingDate+","+vm.startingTime+","+vm.subtotal+","+vm.clientOrigin+","+vm.specialRequest
                    //         }],
                    //         application_context : { 
                    //             shipping_preference:"NO_SHIPPING"
                    //         },
                    //     });

                    //     },
                    //     onApprove: function(data, actions) {
                    //         // This function captures the funds from the transaction.
                    //         return actions.order.capture().then(function(details) {
                    //             // This function shows a transaction success message to your buyer.
                    //             // alert('Transaction completed by ' + details.payer.name.given_name);
                    //             window.location= '/reservation/completed/'+data.orderID;
                    //         });
                    //     }
                    // }).render('#paypal-button-container');
                    //This function displays Smart Payment Buttons on your web page.
                },
                watch: {
                    total: function (newVal) {
                        var vm=this;

                        if(
                            vm.firstName == '' 
                            || vm.lastName  == '' 
                            || vm.email  == '' 
                            || vm.fishingDuration  == '' 
                            || vm.anglers  == '' 
                            || vm.fishingDate  == '' 
                            || vm.startingTime  == '' 
                        )
                        {
                            return vm.showPayPalBtns=false;
                        }

                        if(vm.fishingDuration === '' || vm.id !== "{{$charter->id}}"){
                            vm.id="{{$charter->id}}";
                            $.ajax({
                                type: "POST",
                                url: '/getCharterPrice',
                                data: {
                                    id: vm.id,
                                    duration: vm.fishingDuration.slice(0, 1),
                                    _token: '{{ csrf_token() }}'
                                },
                                
                                success: function(response)
                                {
                                    vm.total='';
                                    if(response === "Error"){
                                        vm.total='0';
                                        vm.subtotal='0';
                                        vm.showPayPalBtns=false;
                                    }else{
                                        vm.total='0';
                                        vm.subtotal='0';
                                        vm.subtotal=response.price.toString();

                                        if("{{$charter->percentage_reservation}}" !== ''){
                                            var calcTotal= "{{$charter->percentage_reservation}}" * response.price / 100;
                                            var taxesIncluded= 16 * calcTotal / 100;
                                            var totalWithTaxes= taxesIncluded + calcTotal;

                                            totalWithTaxes=totalWithTaxes.toFixed(2);
                                            vm.subtotal=calcTotal;
                                            //vm.total= totalWithTaxes.toString(); // uncomment this to use taxes
                                            vm.total= subtotal;//comment this for no taxes
                                            vm.showPayPalBtns=true;
                                        }else{
                                            var calcTotal= 16 * response.price / 100;
                                            calcTotal= calcTotal + response.price;
                                            calcTotal=calcTotal.toFixed(2);
                                            //vm.total= calcTotal.toString(); // uncomment this to use taxes
                                            vm.total= response.price;//comment this for no taxes
                                            vm.showPayPalBtns=true;
                                        }
                                    }
                                }
                            }); 
                        }else{
                            $.ajax({
                                type: "POST",
                                url: '/getCharterPrice',
                                data: {
                                    id: vm.id,
                                    duration: vm.fishingDuration.slice(0, 1),
                                    _token: '{{ csrf_token() }}'
                                },
                                
                                success: function(response)
                                {
                                    vm.total='';
                                    if(response === "Error"){
                                        vm.total='0';
                                        vm.subtotal='0';
                                        alert('Warning! the data cannot be modifiable by this medium.');
                                        vm.showPayPalBtns=false;
                                    }else{
                                        vm.total='0';
                                        vm.subtotal='0';
                                        vm.subtotal=response.price.toString();

                                        if("{{$charter->percentage_reservation}}" !== ''){
                                            var calcTotal= "{{$charter->percentage_reservation}}" * response.price / 100;
                                            var taxesIncluded= 16 * calcTotal / 100;
                                            var totalWithTaxes= taxesIncluded + calcTotal;

                                            totalWithTaxes=totalWithTaxes.toFixed(2);
                                            vm.subtotal=calcTotal;
                                            //vm.total= totalWithTaxes.toString(); // uncomment this to use taxes
                                            vm.total= subtotal;//comment this for no taxes
                                            vm.showPayPalBtns=true;
                                        }else{
                                            var calcTotal= 16 * response.price / 100;
                                            calcTotal= calcTotal + response.price;
                                            calcTotal=calcTotal.toFixed(2);
                                            //vm.total= calcTotal.toString(); // uncomment this to use taxes
                                            vm.total= response.price;//comment this for no taxes
                                            vm.showPayPalBtns=true;
                                        }
                                    }
                                }
                            }); 
                        }
                    }//total()
                },
                methods:{                        
                    checkFields(){
                        var vm=this;
                        let res= this.fishingDuration.slice(5, 8);
                        vm.total=res;

                        if(
                            vm.firstName == '' 
                            || vm.lastName  == '' 
                            || vm.email  == '' 
                            || vm.fishingDuration  == '' 
                            || vm.anglers  == '' 
                            || vm.fishingDate  == '' 
                            || vm.startingTime  == '' 
                        )
                        {
                            vm.total='0';
                            vm.subtotal='0';
                            vm.showPayPalBtns=false;
                        }
                        else{

                            $.ajax({
                                type: "POST",
                                url: '/getCharterPrice',
                                data: {
                                    id: vm.id,
                                    duration: vm.fishingDuration.slice(0, 1),
                                    _token: '{{ csrf_token() }}'
                                },
                                
                                success: function(response)
                                {
                                    if(response === "Error"){
                                        vm.total='0';
                                        vm.subtotal='0';
                                        vm.showPayPalBtns=false;
                                    }else{
                                        vm.total='0';
                                        vm.subtotal='0';
                                        vm.subtotal=response.price.toString();

                                        if("{{$charter->percentage_reservation}}" !== ''){

                                            var calcTotal= "{{$charter->percentage_reservation}}" * response.price / 100;
                                            var taxesIncluded= 16 * calcTotal / 100;
                                            var totalWithTaxes= taxesIncluded + calcTotal;
                                            // calcTotal= calcTotal + response.price;
                                            totalWithTaxes=totalWithTaxes.toFixed(2);
                                            vm.subtotal=calcTotal;
                                            vm.total= totalWithTaxes.toString();
                                            vm.showPayPalBtns=true;
                                        }else{
                                            var calcTotal= 16 * response.price / 100;
                                            calcTotal= calcTotal + response.price;
                                            calcTotal=calcTotal.toFixed(2);
                                            vm.total= calcTotal.toString();
                                            vm.showPayPalBtns=true;
                                        }
                                    }
                                }
                            });     
                        } 
                    },//checkFields()
                    sendReservation(){
                        vm=this;
                        // alert("{{$charter->name}} {{$charter->feets}}ft"+","+duration+","+vm.anglers+","+vm.fishingDate+","+vm.startingTime+","+vm.subtotal+","+vm.clientOrigin+","+vm.specialRequest);
                        $('#modal-container-633658').show();
                        $('#modal-container-633658').html(`
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <div class="loader"></div>
                                        <div clas="loader-txt">
                                            <p>
                                                Saving reservation... <br><br>
                                                <small>please do not close this tab</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>`);
                        $.ajax({
                                type: "POST",
                                url: '/reserve-panga',
                                data: {
                                    id: vm.id,
                                    name: vm.firstName + ' ' + vm.lastName,
                                    email: vm.email,
                                    charter:"{{$charter->name}}",
                                    feets: "{{$charter->feets}}ft",
                                    duration: vm.fishingDuration.slice(0, 1),
                                    anglers:vm.anglers,
                                    fishingDate:vm.fishingDate,
                                    fishingTime:vm.startingTime,
                                    subtotal:vm.subtotal,
                                    clienOrigin:vm.clientOrigin,
                                    cost:vm.total,
                                    specialRequest:vm.specialRequest,
                                    _token: '{{ csrf_token() }}'
                                },

                            }).then((response) =>{
                                window.location= '/reservation/completed/'+response.orderID;
                            });

                    }
                },//methods
            });//Vue
      
</script> 