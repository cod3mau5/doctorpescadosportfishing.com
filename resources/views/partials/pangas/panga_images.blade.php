<div class="col-lg-6">
    @php
        $images= $panga->images->where('panga_id',$panga->id)->pluck('name')->all();
    @endphp
    @if(!empty($images))
        <div class="slider-for">
            <div>
                <img src="{{url($panga->img)}}" class="w-100" alt="" style="height:250px">
            </div>
            @foreach ($images as $image)
                <div>
                    <img src="{{url('/img/pangas/gallery/'.$image)}}" class="w-100" style="height:250px" alt="">
                </div>
            @endforeach
        </div>
        <div class="slider-nav">
            @foreach ($images as $image)
                <div>
                    <img src="{{url('/img/pangas/gallery/'.$image)}}" class="w-100" style="height:80px" alt="">
                </div>
            @endforeach
        </div>
            @else
                <div class="slider-for">
                    <div>
                        <img src="{{url($panga->img)}}" class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{url($panga->img)}}" class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{url($panga->img)}}" class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{url($panga->img)}}" class="w-100" alt="">
                    </div>
                </div>
                <div class="slider-nav">
                    <div>
                        <img src="{{url($panga->img)}}" class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{url($panga->img)}}" class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{url($panga->img)}}" class="w-100" alt="">
                    </div>
                    <div>
                        <img src="{{url($panga->img)}}" class="w-100" alt="">
                    </div>
                </div>
    @endif

</div>
