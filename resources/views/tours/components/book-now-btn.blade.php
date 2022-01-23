<transition name="fade" mode="out-in">
        {{-- <div id="paypal-button-container" class="mt-5" v-show="showPayPalBtns"></div> --}}
        <button 
                class="btn btn-danger float-right text-white"
                style="font-weight: bolder" 
                v-show="showPayPalBtns"
        >
                Book Now
        </button>
</transition>