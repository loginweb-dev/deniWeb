@extends('voyager::master')
@section('page_title', 'Información de la empresa')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-people"></i> Información de la empresa
    </h1>
@stop

@section('content')
    <div class="page-content">
        <div class="page-content browse container-fluid">
            <form action="{{ route('negocios_update') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $company->id }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bordered">
                            <form action="" method="post">
                                <div class="panel-body strong-panel">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombre de su negocio o empresa</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $company->name }}" placeholder="Nombre de su empresa opnegocio" required>
                                                @error('name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">N&deg; de celular</label>
                                                <input type="text" name="phone" class="form-control" value="{{ old('phone') ?? $company->phone }}" placeholder="Numero de celular">
                                                @error('phone')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Sitio web</label>
                                                <input type="text" name="site" class="form-control" value="{{ old('site') ?? $company->site }}" placeholder="Sitio web" maxlength="100">
                                                @error('site')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Descripción corta del negocio</label>
                                                <textarea name="description" class="form-control" rows="3" placeholder="Descripción">{{ old('description') ?? $company->description }}</textarea>
                                                @error('description')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Ubicación</label>
                                                <div id="contentMap"></div>
                                                <textarea name="addres" id="" class="form-control" rows="3" placeholder="Dirección">{{ old('addres') ?? $company->addres }}</textarea>
                                                <input type="hidden" name="ubicacion" id="input-ubicacion">
                                                @error('addres')
                                                <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Imagen de portada</label>
                                            <div class="content_uploader">
                                                <div class="box">
                                                <p class="select_bottom">Seleccionar un archivo</p>
                                                <div class="spinner"></div>
                                                <div class="overlay_uploader"></div>
                                                </div>
                                                <div style="display:none">
                                                    <input class="filefield" type="file" name="archivo" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Galeria de imagenes</label>
                                            <div id="list_images" style="height:250px;overflow-y:auto;border:3px solid #ccc"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea class="form-control richTextBox" name="description_long" id="richtext-description_long">
                                                {!! old('description_long')??$company->description_long !!}
                                            </textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Descripción que de muestra en la App</label>
                                            <textarea class="form-control richTextBox" name="description_app" id="richtext-description_long2">
                                                {!! old('description_app')??$company->description_app !!}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="dropzone_modal" tabindex="-1" role="dialog" aria-labelledby="dropzone_modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Agregar imagenes</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('add_images', ['id' => $company->id])}}" class='dropzone' >
                    @csrf
                    <div class="dz-default dz-message" data-dz-message="">
                        <h3 class="text-muted">
                            Da click o arrastra un archivo<br>
                            <small>(Tamaño máximo 3MB, formatos admitidos .jpeg,.jpg,.png)</small>
                        </h3>
                    </div>
                </form> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('image_preview/image_preview.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dropzone/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <style>
        #mapid { height: 230px; }
    </style>
@stop

@section('javascript')
    <script src="{{asset('image_preview/image_preview.js')}}" type="text/javascript"></script>
    <script src="{{asset('dropzone/min/dropzone.min.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <script>
        Dropzone.autoDiscover = false;
        // Dropzone
        var myDropzone = new Dropzone(".dropzone",{ 
            maxFilesize: 3,  // 3 mb
            acceptedFiles: ".jpeg,.jpg,.png",
        });
        myDropzone.on("success", function(file, res) {
            if(res.data === 'success'){
                toastr.success('Imagen agregada correctamente.', 'Bien hecho!');
                cargar_imagenes();
            }else{
                toastr.error('Ocurrio un error al agragar la imagen.', 'Error!')
            }
        });
        
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            setTimeout(()=>renderMap(), 200);

            // Agregar imagen actual a la vista previa
            $('.box').css('background-image','url({{ url('storage').'/'.$company->image }})');

            cargar_imagenes();

        });

        // Cargar imagenes del negocio
        function cargar_imagenes(){
            $.get("{{ route('list_images', ['id' => $company->id]) }}", function(data){
                $('#list_images').html(data)
            });
        }

        function renderMap(){
            
            $('#contentMap').html('<div id="mapid"></div>')
            var mymap = L.map('mapid').setView([-14.835, -64.902], 12);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 20,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);

            var marker = L.marker();
            marker
                .setLatLng({lat: {{ $company->latitude }}, lng: {{ $company->longitude }} })
                .addTo(mymap);
                $('#input-ubicacion').val('{{ $company->latitude }},{{ $company->longitude }}')

            mymap.on('click', function(e) {
                marker
                    .setLatLng(e.latlng)
                    .addTo(mymap);
                    $('#input-ubicacion').val(`${e.latlng.lat},${e.latlng.lng}`);
            });
        }
    </script>
@endsection
