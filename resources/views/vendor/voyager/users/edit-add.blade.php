@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              {{-- action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif" --}}
              action="@if(!is_null($dataTypeContent->getKey())){{ route('update.users', $dataTypeContent->getKey()) }}@else{{ route('store.users') }}@endif"
              
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                    {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">

                            @if(auth()->user()->hasRole('admin'))
                                {{-- <div class="form-group">
                                    <label class="control-label">INTERNO</label>
                                    <span class="voyager-question text-info pull-left" data-toggle="tooltip" data-placement="left" title=" Seleccione no si el funcionario es externo."></span>
                                    <input 
                                        type="checkbox" 
                                        name="tipo"
                                        id="toggleswitch" 
                                        data-toggle="toggle" 
                                        data-on="Sí" 
                                        data-off="No"
                                        checked 
                                        >
                                </div> --}}

                                <div class="form-group">
                                    <label for="funcionario_id">Funcionario</label>
                                    <select 
                                        name="funcionario_id" 
                                        id="getfuncionario"
                                        class="form-control">
                                    </select>
                                </div>
                                <input type="hidden" id="people" name="name">

                            
                            
                                <div class="form-group">
                                    <label for="email">{{ __('voyager::generic.email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('voyager::generic.email') }}"
                                        value="{{ old('email', $dataTypeContent->email ?? '') }}">
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                @if(isset($dataTypeContent->password))
                                    <br>
                                    <small>{{ __('voyager::profile.password_hint') }}</small>
                                @endif
                                <input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">
                            </div>

                            @can('editRoles', $dataTypeContent)
                                <div class="form-group">
                                    <label for="default_role">{{ __('voyager::profile.role_default') }}</label>
                                    @php
                                        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};

                                        $row     = $dataTypeRows->where('field', 'user_belongsto_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                                <div class="form-group" style="display: none">
                                    <label for="additional_roles">{{ __('voyager::profile.roles_additional') }}</label>
                                    @php
                                        $row     = $dataTypeRows->where('field', 'user_belongstomany_role_relationship')->first();
                                        $options = $row->details;
                                    @endphp
                                    @include('voyager::formfields.relationship')
                                </div>
                            @endcan

                            <div class="form-group">
                                <label for="office_id">Oficina</label>
                                <select name="office_id" class="form-control select2">
                                    <option value="">No definida</option>
                                    @foreach(\App\Models\Office::where('deleted_at', null)->get() as $office)
                                        <option @if($dataTypeContent->office_id == $office->id) selected @endif value="{{ $office->id }}">{{ $office->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @php
                            if (isset($dataTypeContent->locale)) {
                                $selected_locale = $dataTypeContent->locale;
                            } else {
                                $selected_locale = config('app.locale', 'en');
                            }

                            @endphp
                            <div class="form-group" style="display: none">
                                <label for="locale">{{ __('voyager::generic.locale') }}</label>
                                <select class="form-control select2" id="locale" name="locale">
                                    @foreach (Voyager::getLocales() as $locale)
                                    <option value="{{ $locale }}"
                                    {{ ($locale == $selected_locale ? 'selected' : '') }}>{{ $locale }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                @if(isset($dataTypeContent->avatar))
                                    <img src="{{ filter_var($dataTypeContent->avatar, FILTER_VALIDATE_URL) ? $dataTypeContent->avatar : Voyager::image( $dataTypeContent->avatar ) }}" style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                                @endif
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>
        <div style="display:none">
            <input type="hidden" id="upload_url" value="{{ route('voyager.upload') }}">
            <input type="hidden" id="upload_type_slug" value="{{ $dataType->slug }}">
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
        });
    </script>

    <script>
        var tipouser = 1;

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();
            $('#toggleswitch').on('change', function() {
                if (this.checked) {
                    tipouser = 1;
                } else {
                    tipouser = 0;
                }
            });

            ruta = "{{ route('user.getFuncionario') }}";
            $('#getfuncionario').select2({
                placeholder: '<i class="fa fa-search"></i> Buscar...',
                escapeMarkup : function(markup) {
                    return markup;
                },
                language: {
                    inputTooShort: function (data) {
                        return `Por favor ingrese ${data.minimum - data.input.length} o más caracteres`;
                    },
                    noResults: function () {
                        return `<i class="far fa-frown"></i> No hay resultados encontrados`;
                    }
                },
                quietMillis: 250,
                minimumInputLength: 4,
                
                ajax: {
                    url: ruta,
                    type: "get",
                    dataType: 'json',
                    data:  (params) =>  {
                        var query = {
                            search: params.term,
                            type: tipouser
                        }
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                // templateResult: formatResultLandingPage,
                templateSelection: (opt) => opt.text
            });

            $('#getfuncionario').on('select2:select', function (e) {
            
                var data = e.params.data;
                // alert(1)
                if (data) {
                    // document.getElementById("nombre").value = data.nombre;
                    // document.getElementById("apellido").value = data.apellido;
                    // document.getElementById("ap_materno").value = data.ap_materno;
                    document.getElementById("people").value = data.text;
                    // document.getElementById("alfanum").value = data.alfanum;
                    // document.getElementById("departamento_id").value = data.departamento_id;
                }					
            });

        });

    </script>
@stop
