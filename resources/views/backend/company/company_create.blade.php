@extends('voyager::master')
@section('page_title', 'Nuevo negocio')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-shop"></i> Nuevo negocio
    </h1>
@stop

@section('content')
    <div class="page-content">
        <div class="page-content browse container-fluid">
            <form action="{{ route('negocios_store') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bordered">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Categoría <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i> </label>
                                            <select name="categoria_id" class="select2" required>
                                                <option value="">Seleccione una categoría</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id}}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nombre de su negocio o empresa <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i> </label>
                                            <input type="text" name="name" class="form-control" placeholder="Nombre de su empresa opnegocio" required>
                                            @error('name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">N&deg; de celular <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i> </label>
                                            <input type="number" name="phone" class="form-control" placeholder="Numero de celular" required>
                                            @error('phone')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sitio web</label>
                                            <input type="text" name="site" class="form-control" placeholder="Sitio web" maxlength="100">
                                            @error('site')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Descripción corta del negocio <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i> </label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="Descripción" required></textarea>
                                            @error('description')
                                            <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Ubicación <i class="voyager-thumb-tack text-danger" data-toggle="tooltip" title="Requerido"></i> <br> <small>(Seleccionar la ubicación de su empresa o negocio para cambiar el puntero del mapa.)</small></label>
                                            <div id="contentMap"></div>
                                            <textarea name="addres" id="" class="form-control" rows="3" placeholder="Dirección" required></textarea>
                                            <input type="hidden" name="ubicacion" id="input-ubicacion" value="-14.835816,-64.9042999">
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
                                                <input class="filefield" type="file" name="imagen" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Galeria de imagenes (1024x768)</label>
                                        <div class="img-small-wrap" style="height:250px;overflow-y:auto;border:3px solid #ccc;padding:5px">
                                            <div class="item-gallery" id="img-preview">
                                                <button type="button" title="Agregar imagen(es)" onclick="add_img()" class="btn btn-primary" style="padding:5px 20px;font-size:50px">
                                                    <span class="voyager-plus"></span>
                                                </button>
                                            </div>
                                            <input type="file" name="imagenes[]" style="display:none" accept="image/png, image/jpeg" multiple id="gallery-photo-add">
                                        </div>
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
                                                @endphp
                                                <tbody>
                                                    @foreach ($dias as $item)
                                                        <tr>
                                                            <td>{{ $item }}</td>
                                                            <td><input type="time" class="form-control" name="hora_inicio1[]"></td>
                                                            <td><input type="time" class="form-control" name="hora_final1[]"></td>
                                                            <td><input type="time" class="form-control" name="hora_inicio2[]"></td>
                                                            <td><input type="time" class="form-control" name="hora_final2[]"></td>
                                                        </tr>
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
                                                @endphp
                                                <tbody>
                                                    @foreach ($social as $item)
                                                        <tr>
                                                            <td>{{ $item['name'] }}</td>
                                                            <td>
                                                                <input type="url" class="form-control" name="link_social[]" placeholder="{{ 'https://'.strtolower($item['name']).'.com/user...' }}">
                                                                <input type="hidden" name="icon_social[]" value="{{ $item['icon'] }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
                            <textarea class="form-control richTextBox" name="description_long" id="richtext-description_long"></textarea>
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
                            <textarea class="form-control richTextBox" name="description_app" id="richtext-description_long2"></textarea>
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
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('image_preview/image_preview.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <style>
        #mapid { height: 285px; }
    </style>
@stop

@section('javascript')
    <script src="{{asset('image_preview/image_preview.js')}}" type="text/javascript"></script>
    <script src="{{asset('image_preview/images_preview.js')}}" type="text/javascript"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            setTimeout(()=>renderMap(), 200);
        });

        function renderMap(){
            
            $('#contentMap').html('<div id="mapid"></div>')
            var mymap = L.map('mapid').setView([-14.835, -64.902], 13);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 20,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);

            var marker = L.marker();
            marker
                .setLatLng({lat: -14.835816, lng: -64.9042999 })
                .addTo(mymap);

            mymap.on('click', function(e) {
                marker
                    .setLatLng(e.latlng)
                    .addTo(mymap);
                    $('#input-ubicacion').val(`${e.latlng.lat},${e.latlng.lng}`);
            });
        }
    </script>
@endsection
