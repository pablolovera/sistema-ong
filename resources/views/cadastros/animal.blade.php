@extends('layouts.partials.base-form')

@section('form-fields')

    <div class="row">

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <label for="raca_id" class="obrigatorio"> Raça</label>
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-2 col-xl-9 padding-right-0">
                        <div class="selectBox form-control no-radius-right {{ $errors->has('raca_id') ? 'is-invalid' : '' }}"
                             id="raca_id"
                             data-selecteds="{{ empty($dados) ? old('raca_id') : $dados->raca_id }}"
                             data-value_id="id"
                             data-value_desc="nome"
                             data-data_source="{{ route('cadastros.raca.list') }}"></div>
                    </div>
                    <div class="col-xs-1 col-xl-1">
                        <div class="row">
                            <button class="btn btn-outline-secondary btn-plus-group" data-toggle="modal" data-target="#raca_modal" type="button"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                @include('layouts.partials.helper-error', ['field' => 'raca_id'])
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-6 col-lg-6 col-xl-6">
            <label for="pessoa_id" class="obrigatorio"> Proprietário</label>
            <div class="form-group">
                <div class="row">
                    <div class="col-xl-10 padding-right-0">
                        <div class="selectBox form-control no-radius-right {{ $errors->has('pessoa_id') ? 'is-invalid' : '' }}"
                             id="pessoa_id"
                             data-selecteds="{{ empty($dados) ? old('pessoa_id') : $dados->pessoa_id }}"
                             data-value_id="id"
                             data-value_desc="nome"
                             data-data_source="{{ json_encode($pessoas) }}"></div>
                    </div>
                    <div class="col-xl-1">
                        <div class="row">
                            <button class="btn btn-outline-secondary btn-plus-group" id="btn_add_pessoa" type="button"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                @include('layouts.partials.helper-error', ['field' => 'pessoa_id'])
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <div class="form-group">
                <label for="lar_temporario_id"> Lar Temporário</label>
                <div class="selectBox form-control {{ $errors->has('lar_temporario_id') ? 'is-invalid' : '' }}"
                     id="lar_temporario_id"
                     data-selecteds="{{ empty($dados) ? old('lar_temporario_id') : $dados->lar_temporario_id }}"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ json_encode($lares_temporarios) }}"></div>
                @include('layouts.partials.helper-error', ['field' => 'lar_temporario_id'])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-10">
            <div class="form-group">
                <label for="nome" class="obrigatorio"> Nome</label>
                <div class="textBox form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                     data-value="{{ empty($dados) ? old('nome') : $dados->nome }}"
                     id="nome"></div>
                @include('layouts.partials.helper-error', ['field' => 'nome'])
            </div>
        </div>

        <div class="col-xs-12 col-sm-9 col-md-3 col-lg-3 col-xl-2">
            <div class="form-group">
                <label for="data_nascimento"> Nascimento</label>
                <div class="dateBox form-control {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}"
                     id="data_nascimento"
                     data-acceptCustomValue="true"
                     data-value="{{ empty($dados) ? old('data_nascimento') : $dados->data_nascimento }}"
                     data-max="{{ \Carbon\Carbon::now()->toDateString() }}"></div>
                @include('layouts.partials.helper-error', ['field' => 'data_nascimento'])
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 col-xl-2">
            <div class="form-group">
                <label for="sexo"> Sexo</label>
                <div class="selectBox form-control {{ $errors->has('sexo') ? 'is-invalid' : '' }}"
                     id="sexo"
                     data-selecteds="{{ empty($dados) ? old('sexo') : $dados->sexo }}"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ json_encode($sexo) }}"></div>
                @include('layouts.partials.helper-error', ['field' => 'sexo'])
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
            <div class="form-group">
                <label for="peso"> Peso</label>
                <div class="textBox form-control {{ $errors->has('peso') ? 'is-invalid' : '' }}"
                     data-value="{{ empty($dados) ? old('peso') : $dados->peso }}"
                     id="peso"></div>
                @include('layouts.partials.helper-error', ['field' => 'peso'])
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
            <div class="form-group">
                <label for="pelagem"> Pelagem</label>
                <div class="textBox form-control {{ $errors->has('pelagem') ? 'is-invalid' : '' }}"
                     data-value="{{ empty($dados) ? old('pelagem') : $dados->pelagem }}"
                     id="pelagem"></div>
                @include('layouts.partials.helper-error', ['field' => 'pelagem'])
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
            <div class="form-group">
                <label for="especie_id" class="obrigatorio"> Status</label>
                <div class="selectBox form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                     id="status"
                     data-selecteds="{{ empty($dados) ? old('status') : $dados->status }}"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ json_encode($status) }}"></div>
                @include('layouts.partials.helper-error', ['field' => 'status'])
            </div>
        </div>

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
            <div class="form-group">
                <label></label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"
                               class="{{ $errors->has('eh_castrado') ? 'is-invalid' : '' }}"
                               id="eh_castrado"
                               name="eh_castrado" {{ empty($dados) ? '' : ($dados->eh_castrado == 1 ? 'checked' : '')  }}> É Castrado?
                    </label>
                </div>
                @include('layouts.partials.helper-error', ['field' => 'eh_castrado'])
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="form-group">
                <label for="temperamento"> Temperamento</label>
                <textarea name="temperamento" id="temperamento" class="form-control {{ $errors->has('temperamento') ? 'is-invalid' : '' }}"
                          rows="1">{{ $dados->temperamento or old('temperamento') }}</textarea>
                @include('layouts.partials.helper-error', ['field' => 'temperamento'])
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <div class="form-group">
                <label for="observacao"> Observação</label>
                <textarea name="observacao" id="observacao" class="form-control {{ $errors->has('observacao') ? 'is-invalid' : '' }}"
                          rows="2">{{ $dados->observacao or old('observacao') }}</textarea>
                @include('layouts.partials.helper-error', ['field' => 'observacao'])
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="form-group">
                <label for="foto"> Foto</label>
                @if ( ! empty($dados) )
                    @if ( ! is_null($dados->foto))
                        ​<picture>
                            <source srcset="{{ asset('uploads/animais/' . $dados->foto) }}" type="image/png">
                            <img src="{{ asset('uploads/animais/' . $dados->foto) }}" class="img-fluid img-thumbnail" alt="...">
                        </picture>
                    @endif
                @endif
                <div class="files_upload" id="foto" data-multiple="false"></div>
                @include('layouts.partials.helper-error', ['field' => 'foto'])
            </div>
        </div>
    </div>

    <hr>
    <legend>Informações para o site</legend>

    <div class="form-group">
        <label></label>
        <div class="checkbox">
            <label>
                <input type="checkbox"
                       title="Este animal estará publicado no site"
                       class="{{ $errors->has('eh_castrado') ? 'is-invalid' : '' }}"
                       id="publicado"
                       name="publicado" {{ empty($dados) ? '' : ($dados->publicado == 1 ? 'checked' : '')  }}> Publicado?
            </label>
        </div>
        @include('layouts.partials.helper-error', ['field' => 'eh_castrado'])
    </div>

    <div class="form-group">
        <label for="dados_adicionais" title="Informações adicionais que serão exibidas no site"> Dados Adicionais</label>
        <textarea name="dados_adicionais" id="dados_adicionais" class="form-control {{ $errors->has('dados_adicionais') ? 'is-invalid' : '' }}"
                  placeholder="Informações adicionais que serão exibidas no site"
                  rows="3">{{ $dados->dados_adicionais or old('dados_adicionais') }}</textarea>
        @include('layouts.partials.helper-error', ['field' => 'dados_adicionais'])
    </div>

@endsection

@section('modals')
    @include('cadastros.raca-modal')
@endsection
