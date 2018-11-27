@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 col-xl-10">
                <legend>Relatório De Animais</legend>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 col-xl-2">
                <button class="btn btn-info btn-block pull-right" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                    <i class="fa fa-filter"></i> Filtros
                </button>
            </div>
        </div>


        @php

            $fields = [
                'pessoa_id',
                'lar_temporario_id',
                'raca_id',
                'status',
                'sexo',
                'eh_castrado_sim',
                'eh_castrado_nao',
            ];

            $collapsed = '';
            foreach ($errors as $error)
                if ( in_array($error, $fields) )
                    $collapsed = ' in';

        @endphp

        <div class="collapse {{ $collapsed }}" id="collapseFilters">
            <div class="panel">
                <div class="panel-body">
                    <form id="form-search-relatorio-agendamento" method="post" action="{{ route('relatorios.animal.search') }}">
                        @include('layouts.partials.form-fields-safe')

                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="pessoa_id">Proprietário</label>
                                        <div class="selectBox form-control no-radius-right {{ $errors->has('pessoa_id') ? 'is-invalid' : '' }}"
                                             id="pessoa_id"
                                             data-show_clear_button="true"
                                             data-selecteds="{{ empty($dados) ? old('pessoa_id') : $dados->pessoa_id }}"
                                             data-value_id="id"
                                             data-value_desc="nome"
                                             data-data_source="{{ json_encode($pessoas) }}"></div>
                                        @include('layouts.partials.helper-error', ['field' => 'pessoa_id'])
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="lar_temporario_id"> Lar Temporário</label>
                                        <div class="selectBox form-control {{ $errors->has('lar_temporario_id') ? 'is-invalid' : '' }}"
                                             id="lar_temporario_id"
                                             data-show_clear_button="true"
                                             data-selecteds="{{ empty($dados) ? old('lar_temporario_id') : $dados->lar_temporario_id }}"
                                             data-value_id="id"
                                             data-value_desc="nome"
                                             data-data_source="{{ json_encode($lares_temporarios) }}"></div>
                                        @include('layouts.partials.helper-error', ['field' => 'lar_temporario_id'])
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label" for="tipo_agenda_id">Raça</label>
                                        <div class="selectBox form-control no-radius-right {{ $errors->has('raca_id') ? 'is-invalid' : '' }}"
                                             id="raca_id"
                                             data-show_clear_button="true"
                                             data-selecteds="{{ empty($dados) ? old('raca_id') : $dados->raca_id }}"
                                             data-value_id="id"
                                             data-value_desc="nome"
                                             data-data_source="{{ route('cadastros.raca.list') }}"></div>
                                        @include('layouts.partials.helper-error', ['field' => 'raca_id'])
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    <label for="status"> Status</label>
                                    <div class="form-group">
                                        <div class="selectBox form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                                             id="status"
                                             data-show_clear_button="true"
                                             data-selecteds="{{ empty($dados) ? old('status') : $dados->status }}"
                                             data-value_id="id"
                                             data-value_desc="nome"
                                             data-data_source="{{ json_encode($status) }}"></div>
                                        @include('layouts.partials.helper-error', ['field' => 'status'])
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="sexo"> Sexo</label>
                                        <div class="selectBox form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}"
                                             id="sexo"
                                             data-show_clear_button="true"
                                             data-selecteds="{{ empty($dados) ? old('sexo') : $dados->sexo }}"
                                             data-value_id="id"
                                             data-value_desc="nome"
                                             data-data_source="{{ json_encode($sexo) }}"></div>
                                        @include('layouts.partials.helper-error', ['field' => 'sexo'])
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                    <label for="">Castrados?</label>
                                    <div class="form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="eh_castrado_sim" id="eh_castrado_sim" {{ empty($dados) ? (old('eh_castrado_sim') == 'on' ? 'checked' : '' ) : ($dados->eh_castrado_sim == 'on' ? 'checked' : '' ) }}> Sim
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="eh_castrado_nao" id="eh_castrado_nao" {{ empty($dados) ? (old('eh_castrado_nao') == 'on' ? 'checked' : '' ) : ($dados->eh_castrado_nao == 'on' ? 'checked' : '' ) }}> Não
                                        </label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr class="visible-xs">


        <div class="panel">
            <div class="panel-body">
                <div id="gridRelatorioAnimais" class="autoheight" data-route_list="{{ json_encode($rel_data) }}"></div>
            </div>
        </div>
    </div>

@endsection
