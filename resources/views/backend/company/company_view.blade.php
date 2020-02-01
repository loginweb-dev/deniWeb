@extends('voyager::master')
@section('page_title', 'Información de la empresa')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-shop"></i> Información de la empresa
    </h1>
@stop

@section('content')
    <div class="page-content">
        <form action="{{ route('negocios_update') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $company->id }}">
            @csrf
            <div class="page-content browse container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bordered">
                            <div class="panel-body strong-panel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Categoría <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i></label>
                                            <select name="categoria_id" class="form-control" id="select-categoria_id" required>
                                                <option value="">Seleccione una categoría</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id}}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nombre de su negocio o empresa <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i></label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') ?? $company->name }}" placeholder="Nombre de su empresa opnegocio" required>
                                            @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">N&deg; de celular <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i></label>
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
                                            <label for="">Descripción corta del negocio <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i></label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="Descripción">{{ old('description') ?? $company->description }}</textarea>
                                            @error('description')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ubicación <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i> <br> <small>(Seleccionar la ubicación de su empresa o negocio para cambiar el puntero del mapa.)</small></label>
                                            <div id="contentMap"></div>
                                            <textarea name="addres" id="" class="form-control" rows="3" placeholder="Dirección">{{ old('addres') ?? $company->addres }}</textarea>
                                            <input type="hidden" name="ubicacion" id="input-ubicacion">
                                            @error('addres')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Imagen de portada (1024x768) <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i></label>
                                        <div class="content_uploader">
                                            <div class="box">
                                            <p class="select_bottom">Seleccionar un archivo</p>
                                            <div class="spinner"></div>
                                            <div class="overlay_uploader"></div>
                                            </div>
                                            <div style="display:none">
                                                <input class="filefield" type="file" name="imagen" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Galeria de imagenes (1024x768)</label>
                                        <div id="list_images" style="height:250px;overflow-y:auto;border:3px solid #ccc"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Horarios</label>
                                        <div class="alert alert-info">
                                            <span>En caso de que la atención sea continua solo llenar los 2 primeros campos, si no se realiza atención un día especifico dejarlo vacío.</span>
                                        </div>
                                        <div class="form-group" style="max-height:200px;overflow-y:auto">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Dias</th>
                                                        <th>De</th>
                                                        <th>a</th>
                                                        <th>De</th>
                                                        <th>a</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
                                                    $cont = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($dias as $item)
                                                        @php
                                                            $indice = '';
                                                            for($i=0; $i<count($horario);$i++){
                                                                if($cont==$horario[$i]->dia){
                                                                    $indice = $i;
                                                                }
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $item }}</td>
                                                            <td>
                                                                <input type="time" class="form-control" name="hora_inicio1[]" value="{{ $indice !== '' ? $horario[$indice]->hora_inicio1 : '' }}">
                                                            </td>
                                                            <td>
                                                                <input type="time" class="form-control" name="hora_final1[]" value="{{ $indice !== '' ? $horario[$indice]->hora_final1 : '' }}">
                                                            </td>
                                                            <td>
                                                                <input type="time" class="form-control" name="hora_inicio2[]" value="{{ $indice !== '' ? $horario[$indice]->hora_inicio2 : '' }}">
                                                            </td>
                                                            <td>
                                                                <input type="time" class="form-control" name="hora_final2[]" value="{{ $indice !== '' ? $horario[$indice]->hora_final2 : '' }}">
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $cont++;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Redes sociales</label>
                                        <div class="alert alert-info">
                                            <span>Copiar la URL de su perfil en la red solcial, en caso de no tener un perfil en alguna de las redes sociales de la lista dejarlo vacío.</span>
                                        </div>
                                        <div class="form-group" style="max-height:200px;overflow-y:auto">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>URL</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $social = collect([
                                                                    ['name' => 'Facebook', 'icon' => 'fab fa-facebook-square'],
                                                                    ['name' => 'Instagram', 'icon' => 'fab fa-instagram'],
                                                                    ['name' => 'Twitter', 'icon' => 'fab fa-twitter'],
                                                                    ['name' => 'Youtube', 'icon' => 'fab fa-youtube'],
                                                                    ['name' => 'Linkedin', 'icon' => 'fab fa-linkedin-in'],
                                                                ]);
                                                    $cont = 0;
                                                @endphp
                                                <tbody>
                                                    @foreach ($social as $item)
                                                        @php
                                                            $indice = '';
                                                            for($i=0; $i<count($redes);$i++){
                                                                if($social[$cont]['icon']==$redes[$i]->icon){
                                                                    $indice = $i;
                                                                }
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $item['name'] }}</td>
                                                            <td>
                                                                <input type="url" class="form-control" name="link_social[]" value="{{ $indice !== '' ? $redes[$indice]->link : '' }}" placeholder="{{ 'https://'.strtolower($item['name']).'.com/user...' }}">
                                                                <input type="hidden" name="icon_social[]" value="{{ $item['icon'] }}">
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $cont++;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-dark">
                              <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Descripción detallada <span class="voyager-resize-full pull-right"></span>
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <textarea class="form-control richTextBox" name="description_long" id="richtext-description_long">
                                        {!! old('description_long')??$company->description_long !!}
                                    </textarea>
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-dark">
                              <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Descripción detallada para la App <span class="voyager-resize-full pull-right"></span>
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <textarea class="form-control richTextBox" name="description_app" id="richtext-description_long2">
                                        {!! old('description_app')??$company->description_app !!}
                                    </textarea>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-bordered">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <a href="{{ route('negocios_index') }}" class="btn btn-default">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
              <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar</button>
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
        #mapid { height: 285px; }
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
            $('.box').css('background-image','url({{ url('storage').'/'.str_replace('.', '_medium.', $company->image) }})');

            cargar_imagenes();

            $('#select-categoria_id').val({{ $categoria->id }});
            $('#select-categoria_id').select2();;
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
