@extends('voyager::master')
@section('page_title', 'Mis negocios')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-shop"></i>Mis negocios
    </h1>
@stop
@section('content')
    <div class="page-content">
        <div class="page-content browse container-fluid">
            @include('voyager::alerts')
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="60px">Portada</th>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Dirección</th>
                                            <th>Ultima actualización</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($company as $item)
                                            <tr onclick="redirect_view('{{ $item->id }}')" title="Click para editar" style="cursor:pointer">
                                                <td><img src="{{ url('storage').'/'.str_replace('.', '_small.', $item->image) }}" width="50px" /></td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->address}}</td>
                                                <td>{{date('d-m-Y', strtotime($item->updated_at))}} <br> <small>{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}</small> </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7"><p class="text-center"><br>No hay registros para mostrar.</p></td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('css')
    <style>
/* Modelar para movil */
@media (max-width: 700px) {
    .container-fluid {
        padding: 0px !important;
    }
}
    </style>
@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({ html : true });
            $('[data-toggle="tooltip"]').tooltip();

        });

        function redirect_view(id){
            window.location = "{{url('admin/negocios')}}/"+id+"/view"
        }
    </script>
@stop
