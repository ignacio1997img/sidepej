@extends('voyager::master')

@section('page_title', 'Ver Oficina')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-categories"></i> Viendo Oficinas
        <a href="{{ route('voyager.offices.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            Volver a la lista
        </a>
    </h1>
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Oficinas</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $data->name }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="border-bottom:0;">
                                <h3 class="panel-title">Descripción</h3>
                            </div>
                            <div class="panel-body" style="padding-top:0;">
                                <p>{{ $data->description }}</p>
                            </div>
                            <hr style="margin:0;">
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading" style="border-bottom:0;">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="panel-title">Documentación</h3>
                                    </div>
                                    <div class="col-md-4 text-right" style="padding-top: 20px">
                                        <a href="#" class="btn btn-success btn-add-file" data-toggle="modal" data-target="#modal-add-file" ><i class="voyager-plus"></i> <span>Agregar</span></a>
                                    </div>
                                </div>
                            </div>
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>N&deg;</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $cont = 1;
                                    @endphp
                                    @forelse ($user as $item)
                                        <tr>
                                            <td>{{ $cont }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->user->email }}</td>
                                            <td>
                                                
                                            </td>
                                            <td class="no-sort no-click bread-actions text-right">
                                               
                                                
                                            </td>
                                        </tr>
                                        @php
                                            $cont++;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="5">No hay datos disponible</td>
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

 

@stop

@section('javascript')
    <script src="{{ url('js/main.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.btn-edit-file').click(function(e){
                e.preventDefault();
                let url = $(this).data('url');
                let item = $(this).data('item');

                $('#edit-file-form').attr('action', url);
                $('#edit-file-form input[name="id"]').val(item.id);
                $('#edit-file-form input[name="title"]').val(item.title);
                $('#edit-file-form textarea[name="observations"]').val(item.observations);
            });

            $('.form-submit').submit(function(){
                $('.btn-submit').val('Guardando...');
                $('.btn-submit').attr('disabled', 'disabled');
            });

            $('.btn-add-file').click(function(e){
                e.preventDefault();
                let url = $(this).data('url');
                $('#add-file-form').attr('action', url);
            });
        });
    </script>
@stop
