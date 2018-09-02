@extends('layouts.partials.base-form')

@section('form-fields')
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 col-xl-10">
            <div class="form-group">
                <label for="nome" class="obrigatorio"> Nome</label>
                <div class="textBox form-control" id="nome" data-autofocus="true"></div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
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
