@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($fishing_report_cabos as $fishing_report_cabo)
                <div class="col-sm-4 my-4">
                    <div class="card">
                        <img class="card-img-top" src="{{url('uploads/'.$fishing_report_cabo->thumbnail_path.'/'.$fishing_report_cabo->thumbnail)}}" alt="Card image cap">
                            <div class="card-body">
                                <h1 class="card-title" style="font-size:1.5rem">
                                    <strong>{{$fishing_report_cabo->title}}</strong> <br>
                                    <small>{{$fishing_report_cabo->date}}</small>
                                </h1>
                                <a href="{{route('fishing-report-cabo.show',[$fishing_report_cabo->slug])}}" class="btn btn-primary">Go to the post</a>
                            </div>
                    </div>
                </div>
            @endforeach  
        </div>
    </div>
@endsection