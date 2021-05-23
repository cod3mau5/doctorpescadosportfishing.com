@extends('layouts.admin.master_admin')

@section('styles')
 {{-- BOOTSTRAP --}}
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        .card{
            background-color: transparent!important;
            border-left:1px solid #c1c1c1!important;
            border-right:1px solid #c1c1c1!important;
            border-bottom:1px solid #c1c1c1!important;
        }

        .card_image {
              height: 200px;
              background-size: cover;
              background-repeat: no-repeat;
              background-position: center;
              background-position-y: 75%;
              border-top-left-radius: 4px;
              border-top-right-radius: 4px;
              display: block;
              margin: 0 auto;
              width: 100%;
            
          }
          
          .card_image img {
              height: auto;
              max-width: 100%;
              vertical-align: middle;
              max-height: 250px;
              min-width: 100%;
              min-height: 250px;
          }

        @media(max-width:450px){
            #create-report{
                z-index: 100000000!important;
                position: fixed!important;
                right: 0!important;
                bottom: 10px!important;
            }
        }

        @media(min-width:1200px) {
              .card_image {
                  height: 230px;
              }
          }
          
        @media(min-width:1200px){
            .card{
                min-width: 250px;
          }
        }

    </style>
@endsection

@section('content')

    @if(auth()->user()->role == '1') 

        <a href="{{route('panga.create')}}" id="create-report" class="btn btn-success float-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Crear Fishing Report">
            Add <i class="fa fa-plus float-right" aria-hidden="true"></i>
            <br> New Panga <br>
        </a>
        
    @endif

    @if(Session::has('message'))

        <div class="container">
            <div class="row">
              <div class="col-12">
                    <div class="alert  alert-{{Session::get('typealert')}} {{Session::get('display')}} alert-dismissible fade show floating-alert my-3" role="alert" style="flex-direction: column;justify-content: center;height:auto">
                        {{Session::get('message')}}
                        <button type="button" class="close" id="closeAlert" data-dismiss="alert" aria-label="Close" style="top:24px;color:darkred">
                            <span aria-hidden="true" style="color:darkred">&times;</span>
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
            </div>
        </div>


    @endif
   
    <div class="container-fliud">
        <div class="row justify-content-center">
            @foreach ($pangas as $panga)
                <div class="col-sm-4 mt-4">
                
                    <div class="card mb-4">
                        <div class="card_image" style="background-image: url('{{ url($panga->img) }}')!important;"></div>
                            <div class="card-body p-2">
                                <h5 class="card-title mb-1">
                                    {{$panga->name}}  <small>{{$panga->feets}}</small>
                                    
                                </h5>
                            @if($panga->rate && $panga->captain)
                                <a href="{{route('panga.show',[$panga->id])}}" class="btn btn-primary mb-2 px-3 w-100 text-center" 
                                    data-toggle="tooltip" 
                                    data-placement="top" 
                                    title="" 
                                    data-original-title="Ver el post">
                                    <i class="ni ni-glasses-2"></i>  
                                    Preview
                                </a>
                                @else
                                  <button href="#" 
                                    class="btn btn-secondary mb-2 px-3 w-100 text-center disabled"
                                    style="cursor: not-allowed;"
                                    >
                                        <i class="fa fa-ban"></i>  
                                        Preview not available
                                    </button>
                            @endif
                                <form method="POST" action="{{route('panga.destroy',[$panga->id])}}" class="d-inline">
                                    <button type="submit" class="btn btn-danger float-right px-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Eliminar" style="font-size: 12px;width:40%">
                                        Eliminar
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <a href="{{route('panga.edit',[$panga->id])}}" class="btn btn-info px-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar" style="font-size: 12px;width:40%">
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