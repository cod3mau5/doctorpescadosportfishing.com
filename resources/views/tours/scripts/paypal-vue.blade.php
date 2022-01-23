<script>
    var app = new Vue({
                el: '#booking',
                data: {
                    firstName: '',
                    lastName: '',
                    email:'',
                    tripDuration: duration,
                    anglers: '',
                    fishingDate: '',
                    startingTime:startingTime,
                    specialRequest:'',
                    showPayPalBtns:false,
                    total: total,
                },//data
                mounted: function (){
                    var vm= this;
                    var duration= vm.tripDuration;
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
                    //         vm.tripDuration;
                    //         var duration=vm.tripDuration;

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
                    //             description: trip+","+duration+","+vm.anglers+","+vm.fishingDate+","+vm.startingTime+","+'0'+","+vm.clientOrigin+","+vm.specialRequest
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
                    //             window.location= '/tour-reservation/completed/'+data.orderID;
                    //         });
                    //     }
                    // }).render('#paypal-button-container');
                    // //This function displays Smart Payment Buttons on your web page.

                },
                methods:{
                    checkFields(){
                        var vm=this;

                        if(
                            vm.firstName == ''
                            || vm.lastName  == ''
                            || vm.email  == ''
                            || vm.tripDuration  == ''
                            || vm.anglers  == ''
                            || vm.fishingDate  == ''
                            || vm.startingTime  == ''
                        )
                        {
                            vm.showPayPalBtns=false;
                        }
                        else{
                            vm.showPayPalBtns=true;
                        }
                    },//checkFields()

                    sendOrder(){
                        alert('hola');
                        if(vm.specialRequest=== ''){
                                vm.specialRequest='No request.';
                            }
                            vm.tripDuration;
                            var duration=vm.tripDuration;
                    }
                },//methods
            });//Vue

</script>
