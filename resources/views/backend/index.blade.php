@extends('voyager::master')
@section('page_title', __('voyager::generic.viewing').' '.$dataType->display_name_plural)
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->display_name_plural }}
        </h1>
        @can('add', app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan       
    </div>
@stop
@section('css')

@endsection

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        @foreach($dataType->browseRows as $row)
                                            <th>
                                                {{ $row->display_name }}   
                                            </th>
                                        @endforeach
                                        <th class="actions text-center">{{ __('voyager::generic.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataTypeContent as $data)
                                    {{--  {{ $data }}  --}}
                                    <tr>
                                        @foreach($dataType->browseRows as $row)
                                        <td>
                                            @if ($row->type == 'relationship')
                                                @include('voyager::formfields.relationship', ['view' => 'browse','options' => $row->details])
                                            @elseif($row->type == 'image')
                                            <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                            @else
                                                {{ $data->{$row->field} }}
                                            @endif
                                        
                                        </td>
                                        @endforeach
                                        <th class="actions text-center">
                                            <a href="#" class="btn btn-primary" title="">
                                                <i class="voyager-params"></i> <span class="hidden-xs hidden-sm">Opciones</span>
                                            </a>
                                        </th>
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
@endsection

@section('js')
    
@endsection