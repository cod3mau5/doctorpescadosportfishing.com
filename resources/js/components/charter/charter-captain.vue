<template>
<!-- container-fluid -->
<div class="container-fluid px-0">

            <!-- charter_form -->
            <div class="row px-0">
                <div class="col-12">
                    <!-- charter_form -->
                    <form class="mb-4" method="POST" action="" enctype='multipart/form-data' id="charter-form">



                        <!-- charter_img -->
                        <div class="row">
                            <div class="col-md-4 offset-md-4 px-0">
                            <div class="file-field">
                                <div class="z-depth-1-half mb-4">
                                    <img :src="charter.img ? charter.img : 'https://mdbootstrap.com/img/Photos/Others/placeholder.jpg'" class="img-fluid"
                                    alt="example placeholder" v-show="!charter.img_preview && charter.img">

                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-mdb-color btn-rounded" :class="{ 'alert-red': alert.img_charter }" style="max-width:100%">
                                        <span>Subir Imagen Principal de la Lancha</span> <br>
                                        <input type="file" name="img" id="imgCharter" style="max-width:100%;overflow:hidden!important" placeholder="Seleccionar Imagen" v-on:change="previewFiles" @click="alert.img_charter = false">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- charter_name -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group"  :class="{ 'alert-red': alert.charter_errors.name }">
                                    <label for="name">Nombre de la lancha</label>
                                    <input name="name" class="form-control form-control-lg" type="text" placeholder="Escribe aqui el nombre de la lancha" id="name" v-model="charter.name"  @click="alert.charter_errors.name = false">
                                </div>
                            </div>
                        </div>
                        <!-- charter_max_anglers -->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group" :class="{ 'alert-red': alert.charter_errors.max_anglers }">
                                    <label for="max_anglers" class="mb-1 mb-sm-2" >Capacidad maxima (personas a bordo)</label>
                                    <input type="number" name="max_anglers" class="form-control" id="max_anglers" v-model="charter.max_anglers"
                                    @click="alert.charter_errors.max_anglers = false">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group" :class="{ 'alert-red': alert.charter_errors.feets }">
                                    <label for="feets" class="mb-3 mb-sm-2"># Pies </label>
                                    <input type="number" name="feets" class="form-control" id="feets" v-model="charter.feets" @click="alert.charter_errors.feets = false">
                                </div>
                            </div>
                        </div>

                        <!-- charter_description -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" :class="{ 'alert-red': alert.charter_errors.description }">

                                    <label for="description">Descripción (opcional)  </label>

                                    <textarea name="description" class="form-control" id="description" rows="3" v-model="charter.description" @click="alert.charter_errors.description = false"></textarea>

                                </div>
                                    <button type="submit" class="btn btn-info float-right mt-2 py-2 px-4" style="font-size:18px;font-weight:bolder" id="submitCharter" v-show="!editing_charter">Subir Lancha</button>
                                    <button type="submit" class="btn btn-edit float-right mt-2 py-2 px-4" style="font-size:18px;font-weight:bolder" id="editCharter" v-show="editing_charter">Editar Lancha</button>

                            </div>
                        </div>


                            <input type="hidden" v-model="charter.id">




                    </form>
                    <!-- /.charter_form -->
                </div>
            </div>
            <!-- /.charter_form -->

            <!--Navbar Boat Specifications-->
            <nav class="navbar navbar-light cyan lighten-4 text-center row px-0">

                <div class="col-12" :class="{'bg-success': boat_features, 'bg-secondary section-disabled': !boat_features}">
                    <!-- Navbar brand -->
                    <i class="fa fa-lock float-left mt-3" aria-hidden="true" v-show="!boat_features"></i>
                    <i class="fa fa-unlock-alt text-white float-left mt-3" aria-hidden="true" v-show="boat_features"></i>
                    <a class="navbar-brand mx-auto text-white" style="font-weight: 900;">ESPECIFICACIONES DEL BOTE</a>
                    <!-- Collapse button -->
                    <button class="navbar-toggler toggler-example blue darken-4 float-right hamburguer_button my-2" :class="{ 'section-disabled': !boat_features }" type="button" data-toggle="collapse" onclick="expandFunction(event,'navbarSupportedContent41','navbarSon1')" id="boatSpecifications" :disabled="!boat_features">
                        <span class="text-white">
                            <i class="fas fa-bars fa-1x"></i></span>
                    </button>
                </div>


                <div class="col-12 navbarSon1" id="master_app_2">

                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse-burguer not-show col-12" id="navbarSupportedContent41">

                        <!-- Links -->
                        <div id="navbarSon1" class="mt-3">

                            <!-- boat_specifications inputs -->
                            <div class="row">

                                <!-- fishing_gear input -->
                                <div class="col-6 pl-0 px-sm-1 text-center" :class="{ 'alert-red': alert.boat_features_errors.fishing_gear }" @click="alert.boat_features_errors.fishing_gear = false">
                                    <p class="my-1 label-boat-features" style="line-height: 1.2">
                                        Equipo de pesca <br>
                                        (cañas etc..):
                                    </p>
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" id="fishingGearCandidate">
                                        <div class="input-group-append mt-1 justify-content-center justify-content-sm-start">
                                            <button onclick="addItem('fishing_gear','fishingGearCandidate')" type="button" class="btn btn-success btn-sm">
                                                Agregar <br> Elemento
                                            </button>
                                            <button onclick="removeItem('fishing_gear','fishingGearCandidate')" type="button" class="btn btn-danger btn-sm">
                                                Remover <br>
                                                Ultimo <br>
                                                Elemento
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- boat_features input -->
                                <div class="col-6 pr-0 px-sm-1 text-center" :class="{ 'alert-red': alert.boat_features_errors.boat_features }" @click="alert.boat_features_errors.boat_features = false">
                                    <p class="my-1 label-boat-features" style="line-height: 1.2">
                                        Caracteristicas del bote <br>
                                        (motor etc..):
                                    </p>
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" id="boatFeaturesCandidate">
                                        <div class="input-group-append mt-1 justify-content-center justify-content-sm-start">
                                            <button onclick="addItem('boat_features','boatFeaturesCandidate')" type="button" class="btn btn-success btn-sm">
                                                Agregar <br> Elemento
                                            </button>
                                            <button onclick="removeItem('boat_features','boatFeaturesCandidate')" type="button" class="btn btn-danger btn-sm">
                                                Remover <br>
                                                Ultimo <br>
                                                Elemento
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- list of boat_specifications -->
                            <form class="row" action="" method="POST" id="boatSpecificationsForm">

                                <!-- fishing_gear -->
                                <div class="col-6 px-1 py-1">
                                    <ul id="fishing_gear" class="dynamic-list">

                                    </ul>
                                </div>

                                <!-- boat_features -->
                                <div class="col-6 px-1 py-1">
                                    <ul id="boat_features" class="dynamic-list">

                                    </ul>
                                    <button class="btn btn-info float-right mt-2 py-2 px-4"
                                            id="boatsSpecifications"
                                            style="font-size:18px;font-weight:bolder"
                                            v-show="!editing_boat_specifications"
                                            @click.prevent="submitBoatSpecs()">
                                            Publicar
                                    </button>
                                    <button class="btn btn-edit float-right mt-2 py-2 px-4"
                                            style="font-size:18px;font-weight:bolder"
                                            id="editBoatSpecifications"
                                            v-show="editing_boat_specifications"
                                            @click.prevent="updateBoatSpecs()">
                                            Editar
                                    </button>
                                </div>
                                <input type="hidden" name="charter_id" v-model="charter.id">
                                <input type="hidden" name="_token" :value="$props.csrf_token">
                            </form>

                        </div>
                        <!-- Links -->
                    </div>
                    <!-- Collapsible content -->

                </div><!-- navbarSon1 -->

            </nav>
            <!--/.Navbar Boat Specifications-->

            <!--Navbar Image Boats-->
            <nav class="navbar navbar-light cyan lighten-4 text-center row px-0">

                <div class="col-12" :class="{'bg-success': boat_features, 'bg-secondary section-disabled': !boat_features}">
                    <!-- Navbar brand -->
                    <i class="fa fa-lock float-left mt-3" aria-hidden="true" v-show="!boat_features"></i>
                    <i class="fa fa-unlock-alt text-white float-left mt-3" aria-hidden="true" v-show="boat_features"></i>
                    <a class="navbar-brand mx-auto text-white" style="font-weight: 900;">IMAGENES DEL BOTE</a>
                    <!-- Collapse button -->
                    <button class="navbar-toggler toggler-example blue darken-4 float-right hamburguer_button my-2" :class="{ 'section-disabled': !boat_features }" type="button" data-toggle="collapse" onclick="expandFunction(event,'navbarSupportedContent42','navbarSon2')" :disabled="!boat_features" >
                    <span class="text-white">
                        <i class="fas fa-bars fa-1x"></i></span>
                    </button>
                </div>


                <div class="col-12 navbarSon2">

                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse-burguer not-show col-12" id="navbarSupportedContent42">


                        <div id="navbarSon2" class="my-3">

                                    <div class="row mb-3" ref="imageUpload">
                                        <button class="col-12 bg-dark text-white rounded py-3 my-2 text-center fileinput-button"
                                        type="button" @click.prevent="sendingEvent()" id="contentDropZone">
                                            Haga click o arrastre las imágenes aqui. <br>
                                            (se recomienda un minimo de 5 imágenes)
                                            </button>

                                    </div>

                            </div>



                    </div>
                    <!-- Collapsible content -->

                </div>
            </nav>
            <!--/.Navbar Image Boats-->


        <!-- end container-fluid -->


            <!--Navbar Captain Info-->
            <nav class="navbar navbar-light cyan lighten-4 text-center row px-0">

                <div class="col-12" :class="{'bg-success': boat_features, 'bg-secondary section-disabled': !boat_features}">
                        <!-- Navbar brand -->
                        <i class="fa fa-lock float-left mt-3" aria-hidden="true" v-show="!boat_features"></i>
                        <i class="fa fa-unlock-alt text-white float-left mt-3" aria-hidden="true" v-show="boat_features"></i>
                        <a class="navbar-brand mx-auto text-white" style="font-weight: 900;">INFORMACIÓN DEL CAPITAN</a>
                        <!-- Collapse button -->
                        <button class="navbar-toggler toggler-example blue darken-4 float-right hamburguer_button my-2" type="button" data-toggle="collapse" onclick="expandFunction(event,'navbarSupportedContent43','navbarSon3')" :class="{ 'section-disabled': !boat_features }" :disabled="!boat_features">
                        <span class="text-white">
                            <i class="fas fa-bars fa-1x"></i></span>
                        </button>
                </div>

                <div class="col-12 navbarSon3">
                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse-burguer not-show col-12" id="navbarSupportedContent43">



                        <div id="navbarSon3" class="my-3">

                            <form id="captain_form">
                                <!-- captain_img -->
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <div class="file-field">
                                            <div class="z-depth-1-half mb-4">
                                            <img :src="captain.captain_img ? captain.captain_img : 'https://mdbootstrap.com/img/Photos/Others/placeholder.jpg'" class="img-fluid"
                                                alt="example placeholder">
                                            </div>
                                            <div class="d-flex justify-content-center">
                                            <div class="btn btn-mdb-color btn-rounded" style="max-width:100%" :class="{ 'alert-red': alert.img_captain }">
                                                <span>Subir Imagen del Capitan</span> <br>
                                                <input type="file" name="captain_img" id="captainImageUploader" style="max-width:100%;overflow:hidden" @click="alert.img_captain = false">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- captain_name, captain_experience, captain_origin -->
                                <div class="row">

                                    <div class="col-6 col-sm-4">
                                        <div class="form-group">
                                            <label for="max_anglers">Nombre</label>
                                            <input type="text" v-model="captain.name" class="form-control" id="captain_name">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <div class="form-group">
                                            <label for="feets"># Años de experiencia</label>
                                            <input type="number" v-model="captain.experience" class="form-control" id="captain_experience">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="feets">Lugar de Nacimiento</label>
                                            <input type="text" v-model="captain.origin" class="form-control" id="captain_origin">
                                        </div>
                                    </div>
                                </div>

                                <!-- favorite_fish, Hobby, reason_to_fish -->
                                <div class="row">

                                    <div class="col-6 col-sm-4">
                                    <div class="form-group">
                                        <label for="max_anglers">Pez favorito (opcional)</label>
                                        <input type="text" v-model="captain.favorite_fish" class="form-control" id="favorite_fish">
                                    </div>
                                    </div>
                                    <div class="col-6 col-sm-4">
                                        <div class="form-group">
                                            <label for="feets">Hobby (opcional)</label>
                                            <input type="text" v-model="captain.hobby" class="form-control" id="hobby">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="feets">Motivación o razón para pescar (opcional)</label>
                                            <input type="text" v-model="captain.reason_to_fish" class="form-control" id="reason_to_fish">
                                            <input type="hidden"  :value="$props.csrf_token">
                                        </div>
                                        <button type="submit" class="btn btn-info float-right mt-2 py-2 px-4" style="font-size:18px;font-weight:bolder" id="submitCaptain" v-show="!editing_captain">Publicar</button>
                                        <button type="submit" class="btn btn-edit float-right mt-2 py-2 px-4" style="font-size:18px;font-weight:bolder" id="editCaptain" v-show="editing_captain">Editar</button>
                                    </div>
                                </div>

                            </form>

                        </div>


                    </div>
                    <!-- Collapsible content -->
                </div>

            </nav>
            <!--/.Navbar-->


            <!--Navbar Rates-->
            <nav class="navbar navbar-light cyan lighten-4 text-center row px-0">

                <div class="col-12" :class="{'bg-success': boat_features, 'bg-secondary section-disabled': !boat_features}">
                    <!-- Navbar brand -->
                    <i class="fa fa-lock float-left mt-3" aria-hidden="true" v-show="!boat_features"></i>
                    <i class="fa fa-unlock-alt text-white float-left mt-3" aria-hidden="true" v-show="boat_features"></i>
                    <a class="navbar-brand mx-auto text-white" style="font-weight: 900;">TARIFAS</a>
                    <!-- Collapse button -->
                    <button class="navbar-toggler toggler-example blue darken-4 float-right hamburguer_button my-2" type="button" data-toggle="collapse" onclick="expandFunction(event,'navbarSupportedContent44','navbarSon4')" :class="{ 'section-disabled': !boat_features }" :disabled="!boat_features">
                    <span class="text-white">
                        <i class="fas fa-bars fa-1x"></i></span>
                    </button>
                </div>

                <div class="col-12 navbarSon4">
                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse-burguer not-show col-12" id="navbarSupportedContent44">


                        <div id="navbarSon4" class="my-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="half_day">Precio (medio dia):</label>
                                        <input type="number" v-model="rates.half_day" class="form-control" id="half_day">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="feets">Duración (en horas):</label>
                                        <input type="number" v-model="rates.duration_half_day" class="form-control" id="duration_half_day">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="feets">Descripción (que incluye un medio dia)</label>
                                        <input type="text" v-model="rates.half_day_description" class="form-control" id="half_day_description">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="full_day">Precio (dia completo):</label>
                                        <input type="number" v-model="rates.full_day" class="form-control" id="full_day">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="duration_full_day">Duración (en horas):</label>
                                        <input type="number" v-model="rates.duration_full_day" class="form-control" id="duration_full_day">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="feets">Descripción (que incluye un dia completo)</label>
                                        <input type="text" v-model="rates.full_day_description" class="form-control" id="full_day_description">
                                    </div>
                                     <button type="submit" class="btn btn-info float-right mt-2 py-2 px-4" style="font-size:18px;font-weight:bolder" id="submitRates" v-show="!editing_rates">Publicar</button>
                                    <button type="submit" class="btn btn-edit float-right mt-2 py-2 px-4" style="font-size:18px;font-weight:bolder" id="editRates" v-show="editing_rates">Editar</button>
                                </div>

                            </div>
                        </div>


                    </div>
                    <!-- Collapsible content -->
                </div>

            </nav>
            <!--/.Navbar-->



</div>
<!-- container-fluid -->

</template>

<script>

    import Dropzone from 'dropzone';

    export default {
        data: function(){
            return {
                dropzone: null,
                boat_features: true,
                editing_charter: true,
                editing_captain: true,
                editing_rates: true,
                editing_boat_specifications:true,
                alert: {
                    img_charter: false,
                    img_captain:false,
                    boat_features_errors:{},
                    rates_errors:{},
                    captain_errors:{},
                    charter_errors: {},
                },
                charter:JSON.parse(this.$props.this_charter),
                charterImages:JSON.parse(this.$props.charter_images),
                deletedCharterImg:[],
                captain:{
                    id:'',
                    name:'',
                    experience:'',
                    origin:'',
                    favorite_fish:'',
                    hobby:'',
                    reason_to_fish:''
                },
                rates:{
                    half_day:'',
                    duration_half_day:'',
                    half_day_description:'',
                    full_day:'',
                    duration_full_day:'',
                    full_day_description:'',
                }
            }
        },

        mounted() {
            console.log('charter-captain');
            $('#submitCharter').click((event) => {
                event.preventDefault();
                var vm = this;
                var files = $('#imgCharter')[0].files[0];

                if (typeof files !== "undefined") {

                    var fd = new FormData();
                    fd.append('img', files);
                    fd.append('name', vm.charter.name);
                    fd.append('max_anglers', vm.charter.max_anglers);
                    fd.append('feets', vm.charter.feets);
                    fd.append('description', vm.charter.description);
                    fd.append('_token', vm.$props.csrf_token);
                        $.ajax({
                            type: "POST",
                            url: '/admin/store-charter',
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            data: fd,
                        success: function(response) {
                            if (response.action == "success") {
                                vm.boat_features = true;
                                vm.charter.id = response.charter_id;
                                vm.charter.img_preview = response.charter_img;
                                vm.editing_charter = true

                                $.blockUI({
                                    message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">Lancha <span style="color:#7400b8">' + response.charter_name + '</span> creada!<br> ahora puedes seguir editando más propiedades de la lancha<span style="color:#7400b8">...</span></p>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#28a745',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() {
                                    expandFunction(event, 'navbarSupportedContent41', 'navbarSon1');
                                    $.unblockUI();
                                }, 3540);
                                $('html, body').animate({
                                    scrollTop: $('#master_app_2').offset().top
                                }, 910);
                            }
                            else{

                                let unorderList='';

                                if(response.name){unorderList=unorderList+'<li>'+response.name +'</li>'}
                                if(response.max_anglers){unorderList=unorderList+'<li>'+response.max_anglers+'</li>'}
                                if(response.feets){unorderList=unorderList+'<li>'+response.feets+'</li>'}

                                $.blockUI({
                                    message: '<ul style="font-weight:bolder;font-size:1.3em;text-align:left;color:#ffffff;line-height:1;margin-bottom:.3rem">' + unorderList + '</ul>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#d00000',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() { $.unblockUI(); }, 3600);
                                vm.alert.charter_errors = response;
                            }
                        }

                    });
                }
                else {
                    $.blockUI({
                        message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">Se necesita subir la imagen principal<br>de la lancha!</p>',
                        css: {
                            width: '650px',
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#d00000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .8,
                            color: '#fff',
                            top: '30%',
                            left: 'calc( -325px + 50% )'
                        }
                    });
                    setTimeout(function() {
                        $.unblockUI();
                    }, 3540);

                    vm.alert.img_charter = true;
                    $('html, body').animate({
                        scrollTop: $('#charter-form').offset().top
                    }, 910);
                }

            });

            $('#editCharter').click((event) => {
                event.preventDefault();
                var vm = this;
                var files = $('#imgCharter')[0].files[0];
                var charter_id = vm.charter.id;

                    var fd = new FormData();
                    fd.append('img', files);
                    fd.append('name', vm.charter.name);
                    fd.append('max_anglers', vm.charter.max_anglers);
                    fd.append('feets', vm.charter.feets);
                    fd.append('description', vm.charter.description);
                    fd.append('_method', 'PATCH');
                    fd.append('_token', vm.$props.csrf_token);



                    $.ajax({
                        type: 'POST',
                        url: '/admin/edit-charter/' + charter_id,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data: fd,
                        success: function(response) {
                            if (response.action == "success") {
                                vm.boat_features = true;
                                vm.charter.id = response.charter_id;
                                vm.charter.img_preview = response.charter_img;
                                vm.editing_charter = true

                                $.blockUI({
                                    message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#28a745;line-height:1;margin-bottom:.3rem">Lancha ' + response.charter_name + ' editada!</p>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#7400b8',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .7,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() { $.unblockUI(); }, 3540);
                                $('html, body').animate({
                                    scrollTop: $('#master_app_2').offset().top
                                }, 910);
                            } else {

                                let unorderList='';
                                if(response.name){unorderList=unorderList+'<li>'+response.name +'</li>'}
                                if(response.max_anglers){unorderList=unorderList+'<li>'+response.max_anglers+'</li>'}
                                if(response.feets){unorderList=unorderList+'<li>'+response.feets+'</li>'}

                                $.blockUI({
                                    message: '<ul style="font-weight:bolder;font-size:1.3em;text-align:left;color:#ffffff;line-height:1;margin-bottom:.3rem">' + unorderList + '</ul>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#d00000',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() { $.unblockUI(); }, 3600);
                                vm.alert.charter_errors = response;
                                console.log(response);
                            }
                        }
                    });

            });

            $('#submitCaptain').click((event) =>  {
                    event.preventDefault();

                    var vm = this;
                    var files = $('#captainImageUploader')[0].files[0];
                    var fd = new FormData();

                    fd.append('captain_img', files);
                    fd.append('captain_name', vm.captain.name);
                    fd.append('captain_experience', vm.captain.experience);
                    fd.append('captain_origin', vm.captain.origin);
                    fd.append('favorite_fish', vm.captain.favorite_fish);
                    fd.append('hobby', vm.captain.hobby);
                    fd.append('reason_to_fish', vm.captain.reason_to_fish);
                    fd.append('charter_id', vm.charter.id);
                    fd.append('_token', vm.$props.csrf_token);

                    if (typeof files !== "undefined"){

                        $.ajax({
                            type: "POST",
                            url: '/admin/store-captain-info',
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            data: fd,
                            success: function(response) {
                                if (response.action == "success") {

                                    $.blockUI({
                                        message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">Guardado con exito!</p>',
                                        css: {
                                            width: '650px',
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#28a745',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .8,
                                            color: '#fff',
                                            top: '30%',
                                            left: 'calc( -325px + 50% )'
                                        }
                                    });
                                    vm.editing_captain=true;
                                    vm.captain=response;
                                    setTimeout(function() {
                                        expandFunction(event, 'navbarSupportedContent43', 'navbarSon3');
                                        $.unblockUI();
                                    }, 2540);
                                } else {
                                    let unorderList='';
                                    if(response.captain_name){unorderList=unorderList+'<li>'+response.captain_name +'</li>'}
                                    if(response.captain_experience){unorderList=unorderList+'<li>'+response.captain_experience+'</li>'}
                                    if(response.captain_origin){unorderList=unorderList+'<li>'+response.captain_origin+'</li>'}
                                    $.blockUI({
                                        message: '<ul style="font-weight:bolder;font-size:1.3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">' + unorderList + '</ul>',
                                        css: {
                                            width: '650px',
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#d00000',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .8,
                                            color: '#fff',
                                            top: '30%',
                                            left: 'calc( -325px + 50% )'
                                        }
                                    });
                                    setTimeout(function() { $.unblockUI(); }, 3600);
                                    vm.alert.captain_errors = response;
                                }
                            }
                        });

                    }
                    else {

                        $.blockUI({
                            message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">Se necesita subir la imagen principal<br>del capitan!</p>',
                            css: {
                                width: '650px',
                                border: 'none',
                                padding: '15px',
                                backgroundColor: '#d00000',
                                '-webkit-border-radius': '10px',
                                '-moz-border-radius': '10px',
                                opacity: .8,
                                color: '#fff',
                                top: '30%',
                                left: 'calc( -325px + 50% )'
                            }
                        });
                        setTimeout(function() {
                            $.unblockUI();
                        }, 3540);

                        vm.alert.img_captain = true;
                        $('html, body').animate({
                            scrollTop: $('#captain_form').offset().top
                        }, 910);

                    }


                });

            $('#editCaptain').click((event) =>  {
                event.preventDefault();

                var vm = this;
                var files = $('#captainImageUploader')[0].files[0];
                var fd = new FormData();
                var charter_id = vm.charter.id;

                fd.append('captain_img', files);
                fd.append('captain_name', vm.captain.name);
                fd.append('captain_experience', vm.captain.experience);
                fd.append('captain_origin', vm.captain.origin);
                fd.append('favorite_fish', vm.captain.favorite_fish);
                fd.append('hobby', vm.captain.hobby);
                fd.append('reason_to_fish', vm.captain.reason_to_fish);
                fd.append('charter_id', vm.charter.id);
                fd.append('_method', 'PATCH');
                fd.append('_token', vm.$props.csrf_token);

                if (typeof files !== "undefined"){

                    $.ajax({
                        type: "POST",
                        url: '/admin/update-captain-info/charter/'+charter_id,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data: fd,
                        success: function(response) {
                            if (response.action == "success") {

                                $.blockUI({
                                    message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#28a745;line-height:1;margin-bottom:.3rem">Editado con exito!</p>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#7400b8',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                vm.editing_captain=true;
                                setTimeout(function() {
                                    expandFunction(event, 'navbarSupportedContent43', 'navbarSon3');
                                    $.unblockUI();
                                }, 2540);
                            } else {
                                let unorderList='';
                                if(response.captain_name){unorderList=unorderList+'<li>'+response.captain_name +'</li>'}
                                if(response.captain_experience){unorderList=unorderList+'<li>'+response.captain_experience+'</li>'}
                                if(response.captain_origin){unorderList=unorderList+'<li>'+response.captain_origin+'</li>'}
                                $.blockUI({
                                    message: '<ul style="font-weight:bolder;font-size:1.3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">' + unorderList + '</ul>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#d00000',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() { $.unblockUI(); }, 3600);
                                vm.alert.captain_errors = response;
                            }
                        },
                        error: function (request, status, error) {
                            alert(error);
                        }

                    });

                }
                else {

                    $.blockUI({
                        message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">Se necesita subir la imagen principal<br>del capitan!</p>',
                        css: {
                            width: '650px',
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#d00000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .8,
                            color: '#fff',
                            top: '30%',
                            left: 'calc( -325px + 50% )'
                        }
                    });
                    setTimeout(function() {
                        $.unblockUI();
                    }, 3540);

                    vm.alert.img_captain = true;
                    $('html, body').animate({
                        scrollTop: $('#captain_form').offset().top
                    }, 910);

                }


            });

            $('#submitRates').click(()=>{
                var vm=this;
                var rates_data= {
                    '_token': vm.$props.csrf_token,
                    'charter_id': vm.charter.id,
                    'half_day': vm.rates.half_day,
                    'duration_half_day': vm.rates.duration_half_day,
                    'half_day_description': vm.rates.half_day_description,
                    'full_day': vm.rates.full_day,
                    'duration_full_day': vm.rates.duration_full_day,
                    'full_day_description': vm.rates.full_day_description,
                };
                var json = JSON.stringify(rates_data);
                // console.log(rates_data);
                        $.ajax({
                            type: "POST",
                            url: '/admin/store-rates',
                            data: rates_data,
                            success: function(response) {
                                if (response.action == "success") {
                                    $.blockUI({
                                        message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">Guardado con exito!</p>',
                                        css: {
                                            width: '650px',
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#28a745',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .8,
                                            color: '#fff',
                                            top: '30%',
                                            left: 'calc( -325px + 50% )'
                                        }
                                    });
                                    setTimeout(function() {
                                        expandFunction(event, 'navbarSupportedContent43', 'navbarSon3');
                                        $.unblockUI();
                                    }, 2540);
                                    vm.editing_rates=true;
                                } else {

                                    let unorderList='';

                                    if(response.half_day){unorderList=unorderList+'<li>'+response.half_day+'</li>'}
                                    if(response.half_day_description){unorderList=unorderList+'<li>'+response.half_day_description+'</li>'}
                                    if(response.duration_half_day){unorderList=unorderList+'<li>'+response.duration_half_day +'</li>'}
                                    if(response.full_day){unorderList=unorderList+'<li>'+response.full_day+'</li>'}
                                    if(response.full_day_description){unorderList=unorderList+'<li>'+response.full_day_description+'</li>'}
                                    if(response.duration_full_day){unorderList=unorderList+'<li>'+response.duration_full_day +'</li>'}

                                    $.blockUI({
                                        message: '<ul style="font-weight:bolder;font-size:1.8em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">'+unorderList+'</ul>',
                                        css: {
                                            width: '650px',
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#d00000',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .8,
                                            color: '#fff',
                                            top: '30%',
                                            left: 'calc( -325px + 50% )'
                                        }
                                    });
                                    setTimeout(function() { $.unblockUI(); }, 3600);
                                    vm.alert.rates_errors = response;
                                }
                            }
                        });
            });

            $('#editRates').click(()=>{
                var vm=this;
                var charter_id = vm.charter.id;
                var rates_data= {
                    '_token': vm.$props.csrf_token,
                    '_method':'PATCH',
                    'charter_id': vm.charter.id,
                    'half_day': vm.rates.half_day,
                    'duration_half_day': vm.rates.duration_half_day,
                    'half_day_description': vm.rates.half_day_description,
                    'full_day': vm.rates.full_day,
                    'duration_full_day': vm.rates.duration_full_day,
                    'full_day_description': vm.rates.full_day_description,
                };
                var json = JSON.stringify(rates_data);
                // console.log(rates_data);
                        $.ajax({
                            type: "POST",
                            url: '/admin/update-rates/'+charter_id,
                            data: rates_data,
                            success: function(response) {
                                if (response.action == "success") {
                                    $.blockUI({
                                           message:'<p style="font-weight:bolder;font-size:3em;text-align:center;color:#28a745;line-height:1;margin-bottom:.3rem">Editado con exito!</p>',
                                        css: {
                                            width: '650px',
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#7400b8',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .8,
                                            color: '#fff',
                                            top: '30%',
                                            left: 'calc( -325px + 50% )'
                                        }
                                    });
                                    setTimeout(function() {
                                        expandFunction(event, 'navbarSupportedContent43', 'navbarSon3');
                                        $.unblockUI();
                                    }, 2540);

                                } else {

                                    let unorderList='';

                                    if(response.half_day){unorderList=unorderList+'<li>'+response.half_day+'</li>'}
                                    if(response.half_day_description){unorderList=unorderList+'<li>'+response.half_day_description+'</li>'}
                                    if(response.duration_half_day){unorderList=unorderList+'<li>'+response.duration_half_day +'</li>'}
                                    if(response.full_day){unorderList=unorderList+'<li>'+response.full_day+'</li>'}
                                    if(response.full_day_description){unorderList=unorderList+'<li>'+response.full_day_description+'</li>'}
                                    if(response.duration_full_day){unorderList=unorderList+'<li>'+response.duration_full_day +'</li>'}

                                    $.blockUI({
                                        message: '<ul style="font-weight:bolder;font-size:1.8em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">'+unorderList+'</ul>',
                                        css: {
                                            width: '650px',
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#d00000',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .8,
                                            color: '#fff',
                                            top: '30%',
                                            left: 'calc( -325px + 50% )'
                                        }
                                    });
                                    setTimeout(function() { $.unblockUI(); }, 3600);
                                    vm.alert.rates_errors = response;
                                }
                            }
                        });
            });
        },
        methods:{
            submitBoatSpecs: function(){
                    var boatSpecificationsForm = $('#boatSpecificationsForm');
                    var data = boatSpecificationsForm.serialize();
                    var vm1 = this;
                    $.ajax({
                        type: "POST",
                        url: '/admin/store-boat-specification',
                        dataType: 'json',
                        data: data,
                        success: function(response) {
                            if (response.action == "success") {
                                var vm= vm1;


                                $.blockUI({
                                    message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#ffffff;line-height:1;margin-bottom:.3rem">Guardado con exito!</p>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#28a745',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() {
                                    expandFunction(event, 'navbarSupportedContent42', 'navbarSon2');
                                    $.unblockUI();
                                }, 2540);
                                $('html, body').animate({
                                    scrollTop: $('#master_app_2').offset().top
                                }, 710);

                                vm.editing_boat_specifications = true

                            } else {
                                var vm= vm1;
                                let unorderList='';
                                if(response.fishing_gear){unorderList=unorderList+'<li>'+response.fishing_gear +'</li>'}
                                if(response.boat_features){unorderList=unorderList+'<li>'+response.boat_features+'</li>'}
                                $.blockUI({

                                    message: '<ul style="font-weight:bolder;font-size:1.3em;text-align:left;color:#ffffff;line-height:1;margin-bottom:.3rem">' + unorderList + '</ul>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#d00000',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() { $.unblockUI(); }, 3600);
                                vm.alert.boat_features_errors = response;
                            }
                        },
                        error: function (request, status, error) {
                            console.log(status);
                            console.log(request);
                            console.log(error);
                            let unorderList='';
                            if(response.fishing_gear){unorderList=unorderList+'<li>'+response.fishing_gear +'</li>'}
                            if(response.boat_features){unorderList=unorderList+'<li>'+response.boat_features+'</li>'}
                            $.blockUI({
                                    message: '<ul style="font-weight:bolder;font-size:1.3em;text-align:left;color:#ffffff;line-height:1;margin-bottom:.3rem">' + unorderList + '</ul>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#d00000',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() { $.unblockUI(); }, 3600);
                                vm.alert.boat_features_errors = response;
                        }
                    });
            },
            updateBoatSpecs:function(){
                    var boatSpecificationsForm = $('#boatSpecificationsForm');
                    var data = boatSpecificationsForm.serialize();
                    //data.append('_method', 'PATCH');
                    data=data+'&_method=PATCH'
                    console.log(data);
                    var vm1 = this;
                    var charter_id = vm1.charter.id;
                    $.ajax({
                        type: "POST",
                        url: '/admin/edit-boat-specification/charter/'+charter_id,
                        dataType: 'json',
                        data: data,
                        success: function(response) {
                            if (response.action == "success") {
                                var vm= vm1;


                                $.blockUI({
                                    message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#28a745;line-height:1;margin-bottom:.3rem">Editado con exito!</p>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#7400b8',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() {
                                    expandFunction(event, 'navbarSupportedContent42', 'navbarSon2');
                                    $.unblockUI();
                                }, 2540);
                                $('html, body').animate({
                                    scrollTop: $('#master_app_2').offset().top
                                }, 710);

                                vm.editing_boat_specifications = true

                            }
                            else {
                                var vm= vm1;
                                let unorderList='';
                                if(response.fishing_gear){unorderList=unorderList+'<li>'+response.fishing_gear +'</li>'}
                                if(response.boat_features){unorderList=unorderList+'<li>'+response.boat_features+'</li>'}
                                $.blockUI({

                                    message: '<ul style="font-weight:bolder;font-size:1.3em;text-align:left;color:#ffffff;line-height:1;margin-bottom:.3rem">' + unorderList + '</ul>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#d00000',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() { $.unblockUI(); }, 3600);
                                vm.alert.boat_features_errors = response;
                            }
                        },
                        error: function (request, status, error) {
                            console.log(status);
                            console.log(request);
                            console.log(error);
                            let unorderList='';
                            if(response.fishing_gear){unorderList=unorderList+'<li>'+response.fishing_gear +'</li>'}
                            if(response.boat_features){unorderList=unorderList+'<li>'+response.boat_features+'</li>'}
                            $.blockUI({
                                    message: '<ul style="font-weight:bolder;font-size:1.3em;text-align:left;color:#ffffff;line-height:1;margin-bottom:.3rem">' + unorderList + '</ul>',
                                    css: {
                                        width: '650px',
                                        border: 'none',
                                        padding: '15px',
                                        backgroundColor: '#d00000',
                                        '-webkit-border-radius': '10px',
                                        '-moz-border-radius': '10px',
                                        opacity: .8,
                                        color: '#fff',
                                        top: '30%',
                                        left: 'calc( -325px + 50% )'
                                    }
                                });
                                setTimeout(function() { $.unblockUI(); }, 3600);
                                vm.alert.boat_features_errors = response;
                        }
                    });
            },
            previewFiles: function(event) {
                this.charter.img = event.target.files;
                return this.charter.img;
            },
            selectingFiles: function(value) {
                console.log(value);
                value = false;
            },
            sendingEvent: function(){
                document.getElementById('navbarSupportedContent42').style.height='auto';
                var charter_id= this.charter.id;
                this.dropzone= new Dropzone(this.$refs.imageUpload, {
                    url: '/admin/charters/image_boats',
                    clickable: ".fileinput-button",
                    params: {
                        '_token': this.$props.csrf_token,
                        'charter_id': charter_id,
                    },
                });
            },
            deleteImgBoat:function(id){
                var vm=this;
                var data= {
                        '_token': this.$props.csrf_token,
                        '_method': 'DELETE'
                    };
                $.ajax({
                    type: "POST",
                    url: '/admin/charters/image-boats-delete/'+id,
                    data: data,
                    success: function(response) {
                        if (response.action == "success") {

                            $.blockUI({
                                message: '<p style="font-weight:bolder;font-size:3em;text-align:center;color:#28a745;line-height:1;margin-bottom:.3rem">Imagen eliminada.</p>',
                                css: {
                                    width: '650px',
                                    border: 'none',
                                    padding: '15px',
                                    backgroundColor: '#d00000',
                                    '-webkit-border-radius': '10px',
                                    '-moz-border-radius': '10px',
                                    opacity: .8,
                                    color: '#fff',
                                    top: '30%',
                                    left: 'calc( -325px + 50% )'
                                }
                            });
                            setTimeout(function() {
                                $.unblockUI();
                            }, 1220);
                            vm.deletedCharterImg.push(id);
                        }
                        else {
                            $.blockUI({

                                message: '<p style="font-weight:bolder;font-size:1.3em;text-align:left;color:#ffffff;line-height:1;margin-bottom:.3rem">Error de servidor, intente de nuevo.</p>',
                                css: {
                                    width: '650px',
                                    border: 'none',
                                    padding: '15px',
                                    backgroundColor: '#d00000',
                                    '-webkit-border-radius': '10px',
                                    '-moz-border-radius': '10px',
                                    opacity: .8,
                                    color: '#fff',
                                    top: '30%',
                                    left: 'calc( -325px + 50% )'
                                }
                            });
                            setTimeout(function() { $.unblockUI(); }, 1600);
                        }
                    },
                });
            }
        },
        props: [
            'url',
            'csrf_token',
            'this_charter',
            'charter_images',
        ],
    }

</script>
