@extends('layouts.partials.base-form')

@section('form-fields')

    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group">
                <label class="control-label obrigatorio" for="nome">Nome</label>
                <div class="textBox form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}"
                     data-value="{{ $dados->nome or old('nome')  }}"
                     id="nome"></div>

                @include('layouts.partials.helper-error', ['field' => 'nome'])
            </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6 col-xl-6">
            <label for="pessoa_id" class="obrigatorio"> Responsável</label>
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
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 col-xl-2">
            <div class="form-group">
                <label class="control-label obrigatorio" for="status">Status</label>
                <div class="selectBox form-control" id="status"
                     data-placeholder=""
                     data-selecteds="{{ empty($dados) ? old('status', 1) : $dados->status }}"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ json_encode($status) }}"></div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <label class="control-label" for="cep">CEP</label>
                <div class="field_cep {{ $errors->has('cep') ? ' is-invalid' : '' }}" data-use_masked_value="false" id="cep" data-value="{{ $dados->cep or old('cep')  }}"></div>

                @include('layouts.partials.helper-error', ['field' => 'cep'])
            </div>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                <label class="control-label" for="rua">Rua</label>
                <div class="textBox form-control {{ $errors->has('rua') ? ' is-invalid' : '' }}"
                     data-value="{{ $dados->rua or old('rua')  }}"
                     id="rua"></div>
                @include('layouts.partials.helper-error', ['field' => 'rua'])
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <label class="control-label" for="numero">Nº</label>
                <div class="textBox form-control {{ $errors->has('numero') ? ' is-invalid' : '' }}"
                     data-value="{{ $dados->numero or old('numero')  }}"
                     id="numero"></div>
                @include('layouts.partials.helper-error', ['field' => 'numero'])
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 ">
                <label class="control-label" for="bairro">Bairro</label>
                <div class="textBox form-control {{ $errors->has('bairro') ? ' is-invalid' : '' }}"
                     data-value="{{ $dados->bairro or old('bairro')  }}"
                     id="bairro"></div>
                @include('layouts.partials.helper-error', ['field' => 'bairro'])
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <label class="control-label" for="cidade">Cidade</label>
                <div class="textBox form-control {{ $errors->has('cidade') ? ' is-invalid' : '' }}"
                     data-value="{{ $dados->cidade or old('cidade')  }}"
                     id="cidade"></div>
                @include('layouts.partials.helper-error', ['field' => 'cidade'])
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <label class="control-label" for="uf">Estado</label>
                <div class="textBox form-control {{ $errors->has('uf') ? ' is-invalid' : '' }}"
                     data-value="{{ $dados->uf or old('uf')  }}"
                     id="uf"></div>
                @include('layouts.partials.helper-error', ['field' => 'uf'])
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label" for="complemento">Complemento</label>
                <div class="textBox form-control {{ $errors->has('complemento') ? ' is-invalid' : '' }}"
                     data-value="{{ $dados->complemento or old('complemento')  }}"
                     id="complemento"></div>
                @include('layouts.partials.helper-error', ['field' => 'complemento'])
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-sm-12 col-sm-12 col-md-12 col-lg-12">
                <label class="control-label" for="observacao">Observação</label>
                <textarea name="observacao" id="observacao" class="form-control {{ $errors->has('observacao') ? ' is-invalid' : '' }}" rows="2">{{ $dados->observacao or old('observacao')  }}</textarea>

                @include('layouts.partials.helper-error', ['field' => 'observacao'])
            </div>
        </div>
    </div>

    <legend>Capacidades</legend>

    <div class="row">
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-xl-7">
            <div class="form-group validate-especie_id">
                <label for="especie_id" class="obrigatorio"> Espécie</label>
                <div class="selectBox form-control especie_id {{ $errors->has('capacidades.*.especie_id') ? ' is-invalid' : '' }}" id="especie_id"
                     data-placeholder="Selecione a espécie"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ $especies }}"></div>
            </div>
            @include('layouts.partials.helper-error', ['field' => 'capacidades.*.especie_id'])
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <div class="form-group validate-capacidade">
                <label for="capacidade" class="obrigatorio"> Capacidade</label>
                <div class="textBox form-control capacidade {{ $errors->has('capacidades.*.capacidade') ? ' is-invalid' : '' }}" id="capacidade"></div>
            </div>
            @include('layouts.partials.helper-error', ['field' => 'capacidades.*.capacidade'])
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-1">
            <label for=""></label>
            <button type="button" class="btn btn-secondary btn-block" id="add_lar_temporario_capacidade"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <center id="mensagem-capacidade" style="display: {{ ! empty($dados) ? ($dados->capacidades->isNotEmpty() ? 'none' : '') : '' }};"><span class="badge badge-info">Capacidades não adicionadas</span></center>
    <table class="table table-striped" id="table-capacidades" style="display: {{ ! empty($dados) ? ($dados->capacidades->isNotEmpty() ? '' : 'none') : 'none' }};">
        <thead>
        <tr>
            <th class="col-sm-8">Espécie</th>
            <th class="col-sm-2">Capacidade</th>
            <th class="col-sm-2"></th>
        </tr>
        </thead>
        <tbody id="receive_capacidades">
        @if ( ! empty($dados) )
            @if ( $dados->capacidades->isNotEmpty() )

                @foreach($dados->capacidades as $capacidade)
                    <tr id="row-{{ $capacidade->id }}">
                        <td>{{ $capacidade->especie->nome }}</td>
                        <td>{{ $capacidade->capacidade }}</td>
                        <td><a href="javascript:;" data-index="{{ $capacidade->id }}" class="text-danger rm_capacidade pull-right"><i class="fa fa-trash"></i> Remover</a></td>
                    </tr>

                @endforeach

            @endif
        @endif
        {{----}}
        {{--@if ( old('capacidades') )--}}

            {{--@foreach(old('capacidades') as $key => $capacidade)--}}
                {{--<tr id="row-{{ $key }}">--}}
                    {{--<td>{{ $capacidade['nome'] }}</td>--}}
                    {{--<td>{{ $capacidade['capacidade'] }}</td>--}}
                    {{--<td><a href="javascript:;" data-index="{{ $key }}" class="text-danger rm_capacidade pull-right"><i class="fa fa-trash"></i> Remover</a></td>--}}
                {{--</tr>--}}

            {{--@endforeach--}}
        {{--@endif--}}
        </tbody>
    </table>

    @if ( ! empty($dados) )
        @if ( $dados->capacidades->isNotEmpty())

            @foreach($dados->capacidades as $capacidade)
                <input type="hidden" class="capacidade_especie" id="capacidade-especie-field-{{ $capacidade->id }}" name="capacidades[{{ $capacidade->id }}][especie_id]" value="{{ $capacidade->especie_id }}"/>
                {{--<input type="hidden" class="capacidade_especie" id="capacidade-especie-nome-{{ $capacidade->id }}" name="capacidades[{{ $capacidade->id }}][nome]" value="{{ $capacidade->especie->nome }}"/>--}}
                <input type="hidden" id="capacidade-quantidade-field-{{ $capacidade->id }}" name="capacidades[{{ $capacidade->id }}][capacidade]" value="{{ $capacidade->capacidade }}"/>
            @endforeach

        @endif
    @endif
@endsection
