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

                    sendOrder(event){
                        event.preventDefault();
                        let vm=this;
                        let cost= '{{ $cost }}' * Number(vm.anglers);
                        if(vm.specialRequest=== ''){
                                vm.specialRequest='No request.';
                        }
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
                            url: '{{ route("reserveTour") }}',
                            data: {
                                name: vm.firstName + ' ' + vm.lastName,
                                email: vm.email,
                                charter:"Default boat for the " + tour,
                                feets: "",
                                anglers:vm.anglers,
                                duration: vm.tripDuration,
                                fishingDate:vm.fishingDate,
                                fishingTime:vm.startingTime,
                                client_origin:'web',
                                cost:cost,
                                request:vm.specialRequest,
                                _token: '{{ csrf_token() }}'
                            },

                        })
                        .then((response) =>{
                            if(response === "Email invalid"){
                                $('#modal-container-633658').html(`
                                    <div class="modal-dialog" role="document">
                                        <div class="alert alert-danger" role="alert">
                                            <h2>Invalid email</h2>
                                        </div>
                                    </div>`);
                                setTimeout(function(){
                                    $("#modal-container-633658").hide();
                                    // $(".modal-backdrop").removeClass('show'); 
                                    $('#modal-container-633658').html(`
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form role="form" id="booking">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Book Your Trip <small>(Whale Watching)</small>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @include('tours.forms.form_1')
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal" style="font-weight:bolder">
                                                        Cancel
                                                    </button>
                                                    @include('tours.components.book-now-btn')

                                                </div>
                                            </form>
                                        </div>
                                    </div>`);
                                    $("#modal-container-633658").show();
                                },3000);
                            }else{
                                $("#modal-container-633658").show();
                                window.location= '/reservation/completed/'+response;
                            }
                        });

                    }
                },//methods
            });//Vue

</script>
