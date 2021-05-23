@extends('layouts.admin.master_admin')

@section('styles')
  {{-- BOOTSTRAP --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media(max-width:450px){
            #create-report{
                z-index: 100000000!important;
                position: fixed!important;
                right: 0!important;
                bottom: 10px!important;
            }
        }
    </style>
@endsection

@section('content')
<a href="{{route('report.create')}}" id="create-report" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Crear Fishing Report">
    Crear <i class="fa fa-plus float-right" aria-hidden="true"></i>
    <br> FishingReport <br>
</a>

    @if(Session::has('message'))

        <div class="container">
                <div class="alert  alert-{{Session::get('typealert')}} {{Session::get('display')}} alert-dismissible fade show floating-alert my-3" role="alert" style="flex-direction: column;justify-content: center;height:auto">
                    {{Session::get('message')}}
                    <button type="button" class="close" id="closeAlert" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            
                                <li>{{$error}}</li>
                            
                            @endforeach
                        </ul>

                    @endif
                        <script>
                            $('.alert').slideDown();
                            $('#closeAlert').click(function(){$('.alert').slideUp()});
                            setTimeout(
                                function(){$('.alert').slideUp();},8000
                            );
                        </script>
                </div>
        </div>


    @endif
   
    <div class="container-fliud">
        <div class="row justify-content-center">
            @foreach ($fishing_report_cabos as $fishing_report_cabo)
                <div class="col-sm-4 my-4">
                        
                    <div class="card" >
                            <img class="card-img-top" src="{{url('uploads/'.$fishing_report_cabo->thumbnail_path.'/'.$fishing_report_cabo->thumbnail)}}" alt="Card image cap">
                            <div class="card-body p-1">
                                <h5 class="card-title">
                                    {{$fishing_report_cabo->title}} <br>
                                    <small>{{$fishing_report_cabo->date}}</small>
                                </h5>
                                <a href="{{route('fishing-report-cabo.show',[$fishing_report_cabo->slug])}}" class="btn btn-primary mb-2 px-3 w-100 text-center" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ver el post">Go to the post...</a>
                                <form method="POST" action="{{route('report.destroy',[$fishing_report_cabo->id])}}" class="d-inline">
                                    <button type="submit" class="btn btn-danger float-right px-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar" style="font-size: 12px;width:40%">
                                        Eliminar
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <a href="{{route('report.edit',[$fishing_report_cabo->id])}}" class="btn btn-info px-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar" style="font-size: 12px;width:40%">
                                    Editar
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                    </div>
                </div>
            @endforeach  
        </div>
    </div>
    
@endsection