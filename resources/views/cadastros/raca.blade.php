@extends('layouts.partials.base-form')

@section('form-fields')

    <div class="row">
        <div class="col-xs-12 col-sm-3 col-xl-3">
            <div class="form-group">
                <label for="especie_id" class="obrigatorio"> Espécie</label>
                <div class="selectBox form-control" id="especie_id"
                     data-placeholder="Selecione a espécie"
                     data-selecteds="{{ empty($dados) ? null : $dados->especie_id }}"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ $especies }}"></div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-xl-7">
            <div class="form-group">
                <label for="especie_id" class="obrigatorio"> Nome</label>
                <div class="textBox form-control" id="nome" data-value="{{ $dados->nome }}"></div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-xl-2">
            <div class="form-group">
                <label for="especie_id" class="obrigatorio"> Status</label>
                <div class="selectBox form-control" id="status"
                     data-placeholder="Status"
                     data-selecteds="{{ empty($dados) ? null : $dados->status }}"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ json_encode($status) }}"></div>
            </div>
        </div>
    </div>

@endsection
