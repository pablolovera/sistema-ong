@extends('layouts.partials.base-form')

@section('form-fields')

    <div class="row">

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <label class="control-label obrigatorio" for="especie_id">Espécie</label>
            <div class="form-group especie_id">
                <div class="col-xs-10 col-sm-11 col-lg-10 col-xl-10">
                    <div class="row">
                        <div class="selectBox" id="especie_id"
                             data-placeholder="Selecione a espécie"
                             data-selecteds="{{ handleSelected($dados, 'especie_id') }}"
                             data-value_id="id"
                             data-value_desc="nome"
                             data-data_source="{{ route('cadastros.especie.select-data') }}"></div>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-1 col-lg-2 col-xl-2 no-padding">
                    <button class="btn btn-default btn-block" id="add_especie" type="button">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-xl-7">
            <div class="form-group">
                <label for="especie_id" class="obrigatorio"> Nome</label>
                <div class="textBox form-control" id="nome" data-value="{{ $dados->nome or old('nome') }}"></div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-xl-2">
            <div class="form-group">
                <label for="especie_id" class="obrigatorio"> Status</label>
                <div class="selectBox form-control" id="status"
                     data-placeholder="Status"
                     data-selecteds="{{ handleSelected($dados, 'status') }}"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ json_encode($status) }}"></div>
            </div>
        </div>
    </div>

@endsection

@section('modals')
    @include('cadastros.especie-modal')
@endsection