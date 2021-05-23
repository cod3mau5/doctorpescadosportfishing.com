<div class="col-lg-6">
    @if(!empty($charter->images))
       @php
           $images= $charter->images->where('charter_id',$charter->id)->pluck('name')->all();
       @endphp
       <div class="slider-for">
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="" style="height:250px">
           </div>
           @foreach ($images as $image)
               <div>
                   <img src="{{url('/img/charters/gallery/'.$image)}}" class="w-100" style="height:250px" alt="">
               </div>
           @endforeach
       </div>
       <div class="slider-nav">
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="" style="height:80px">
           </div>
           @foreach ($images as $image)
               <div>
                   <img src="{{url('/img/charters/gallery/'.$image)}}" class="w-100" style="height:80px" alt="">
               </div>
           @endforeach
       </div>
       @else
       <div class="slider-for">
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="">
           </div>
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="">
           </div>
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="">
           </div>
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="">
           </div>
       </div>
       <div class="slider-nav">
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="">
           </div>
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="">
           </div>
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="">
           </div>
           <div>
               <img src="{{url($charter->img)}}" class="w-100" alt="">
           </div>
       </div>
   @endif
</div>
