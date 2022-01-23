
    <div class="row">
        <div class="col-md-12 form-group">

            <label for="exampleInputEmail1" class="required">
                Email address 
                <small style="color: red">(required)</small>
            </label>
           <input   type="email"
                    name="email"
                    required="required"
                    class="form-control"
                    v-model="email"
                    id="exampleInputEmail1"
                    @change="checkFields"
                    v-on:keyup="checkFields">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 form-group">
            <label class="required" for="fullname">
                First Name 
                <small style="color: red">(required)</small></label><br>
            <input type="text" 
                    name="firstName" 
                    class="form-control" 
                    v-model="firstName" 
                    @change="checkFields"
                    v-on:keyup="checkFields">

        </div>
        <div class="col-md-6 form-group">
            <label class="required" for="fullname">
                Last Name 
                <small style="color: red">(required)</small></label><br>
            <input type="text" 
                    name="fullname" 
                    class="form-control" 
                    v-model="lastName" 
                    @change="checkFields"
                    v-on:keyup="checkFields">

        </div>
    </div>
    <div class="row">

        <div class="col-md-6 form-group">

            <label class="required" for="anglers">
                Persons 
                <small style="color: red">(required)</small></label>
            <select name="anglers" 
                    id="anglers" 
                    class="form-control" 
                    v-model="anglers" 
                    @change="checkFields"
                    v-on:keyup="checkFields">
                <option disabled="disabled" selected="selected"># people</option>
                @for ($i = 2; $i <=4 ; $i++)
                    <option value="{{ $i }}">
                        <span>{{ $i }} persons</span>
                    </option>
                @endfor
            </select>

        </div>
        <div class="col-md-6 form-group">
            <label class="required" for="trip_date">
                Trip date 
                <small style="color: red">(required)</small></label><br>
            <input type="text" 
                name="trip_date" 
                v-model="fishingDate" 
                id="datetimepicker7" 
                required="required"
                class="calendario form-control" 
                @change="checkFields"
                v-on:keyup="checkFields">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="special_request">
                Special Request</label><br>
            <textarea   type="text" 
                        name="special_request" 
                        rows="6" class="form-control"
                        v-model="specialRequest">
            </textarea>
        </div>
    </div>

 

    <transition name="fade" mode="out-in">
        <div v-show="!showPayPalBtns">
            <div class="alert alert-secondary text-center mt-3" role="alert">
                Complete the form to see the payment button...
            </div>
        </div>
    </transition>

