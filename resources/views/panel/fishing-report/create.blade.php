@extends('layouts.admin.master_admin')
@section('styles')
  {{-- BOOTSTRAP --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .img-fluid {
            width: 100%;
        }
        #textarea{
            height: 800px;
        }
        @media(max-width:700px){
            .mce-floatpanel {
                max-width: 100%!important;
            }
            .mce-container-body{
                max-width: 95%!important;
            }
            .mce-abs-layout{
                max-width: 95%!important;
            }
            .mce-textbox{
                max-width: 90px!important;
            }

            .mce-textbox.mce-abs-layout-item.mce-first{
                max-width: 30px!important;
            }
            .mce-container-body.mce-abs-layout{
                max-width: 95%!important;
            }
            .mce-reset{
                max-width: 95%!important;
            }
            .mce-btn.mce-primary{
                position: initial;
            }
            .mce-btn.mce-btn-has-text{
                position: initial;
            }

        }
    </style>

@endsection
@section('content')

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
    <div class="container">
        <form method="POST" action="{{route('report.store')}}" enctype='multipart/form-data'>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                 <div class="file-field">
                     <div class="z-depth-1-half mb-4">
                       <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img-fluid"
                         alt="example placeholder">
                     </div>
                     <div class="d-flex justify-content-center">
                       <div class="btn btn-mdb-color btn-rounded float-left">
                         <span>Subir imagen</span>
                         <input type="file" name="img" id="imageUploader">
                       </div>
                     </div>
                 </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Titulo</label>
                <input name="title" class="form-control form-control-lg" type="text" placeholder="Pescados o palabras clave potenciales se separadas con un espacio." id="title">
            </div>

            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea name="content" class="form-control" id="textarea" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success float-right">Publicar</button>
            @csrf
        </form>
    </div>
@endsection

@section('scripts')
    <script src='https://cdn.tiny.cloud/1/7j4pe5e4jxsitu3qsugpm9528a1nhws7ahwwpqgjia18b6qp/tinymce/4/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
        // var editor_config= {
        //     // path_absolute : "{{url('/')}}"+'/',
        //     path_absolute : "{{url('/')}}"+'/vendor/',
        //     selector: "textarea",
        //     plugins: [
        //     "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        //     "searchreplace wordcount visualblocks visualchars code fullscreen",
        //     "insertdatetime media nonbreaking save table contextmenu directionality",
        //     "emoticons template paste textcolor colorpicker textpattern"
        //     ],
        //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        //     relative_urls: false,
        //     file_browser_callback : function(field_name, url, type, win) {

        //         var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        //         var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        //         var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        //         if (type == 'image') {
        //             cmsURL = cmsURL + "&type=Images";
        //         } else {
        //             cmsURL = cmsURL + "&type=Files";
        //         }

        //         tinyMCE.activeEditor.windowManager.open({
        //             file : cmsURL,
        //             title : 'Filemanager',
        //             width : x * 0.8,
        //             height : y * 0.8,
        //             resizable : "yes",
        //             close_previous : "no"
        //         });

        //     }
        // };
        // tinymce.init(editor_config);

        tinymce.init({
            selector: '#textarea',
            plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            // enable title field in the Image dialog
            image_title: true, 
            // enable automatic uploads of images represented by blob or data URIs
            automatic_uploads: true,
            // add custom filepicker only to Image dialog
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    // call the callback and populate the Title field with the file name
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
                };
                
                input.click();
            }
        });
    </script>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script>
            $(document).on("change", "#imageUploader", function(e) {
                if(this.files[0].size > 91872749)
                {
                    alert("La imagen destacada no puede pesar mas de 800 MB."); 
                    document.getElementById('imageUploader').value = null;
                }
            });
    </script>
@endsection