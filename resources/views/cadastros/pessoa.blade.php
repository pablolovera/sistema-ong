@extends('layouts.partials.base-form')

@section('form-fields')


    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 col-xl-10">
            <div class="form-group">
                <label class="control-label obrigatorio" for="tipo">Tipo</label>
                <div class="selectBox form-control" id="tipo"
                     data-placeholder=""
                     data-selecteds="{{ empty($dados) ? old('tipo', 'fisica') : (is_null($dados->nome) ? 'juridica' : 'fisica' ) }}"
                     data-value_id="id"
                     data-value_desc="nome"
                     data-data_source="{{ json_encode([['id' => 'fisica', 'nome' => 'Física'],['id' => 'juridica', 'nome' => 'Jurídica']]) }}"></div>
            </div>
            @include('layouts.partials.helper-error', ['field' => 'tipo'])
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
            @include('layouts.partials.helper-error', ['field' => 'status'])
        </div>
    </div>

    <div id="is_juridica" style="{{ empty($dados) ? (old('tipo') == 'juridica' ? '' : 'display: none;') : (is_null($dados->nome) ? '' : 'display: none;' ) }};">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label obrigatorio" for="razao_social">Razão Social</label>
                    <div class="textBox form-control {{ $errors->has('razao_social') ? ' is-invalid' : '' }}"
                         data-value="{{ $dados->razao_social or old('razao_social')  }}"
                         id="razao_social"></div>
                    @include('layouts.partials.helper-error', ['field' => 'razao_social'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label class="control-label" for="fantasia">Fantasia</label>
                    <div class="textBox form-control {{ $errors->has('fantasia') ? ' is-invalid' : '' }}"
                         data-value="{{ $dados->fantasia or old('fantasia')  }}"
                         id="fantasia"></div>
                    @include('layouts.partials.helper-error', ['field' => 'fantasia'])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label class="control-label" for="cnpj">CNPJ</label>
                    <div class="field_cnpj {{ $errors->has('cnpj') ? ' is-invalid' : '' }}" id="cnpj" data-value="{{ $dados->cnpj or old('cnpj') }}"></div>
                    @include('layouts.partials.helper-error', ['field' => 'cnpj'])
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label class="control-label" for="ie" title="Inscrição Estadual">Insc. Estadual</label>
                    <div class="textBox form-control {{ $errors->has('ie') ? ' is-invalid' : '' }}"
                         data-value="{{ $dados->ie or old('ie')  }}"
                         id="ie"></div>
                    @include('layouts.partials.helper-error', ['field' => 'ie'])
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label class="control-label" for="im" title="Inscrição Municipal">Insc. Municipal</label>
                    <div class="textBox form-control {{ $errors->has('im') ? ' is-invalid' : '' }}"
                         data-value="{{ $dados->im or old('im')  }}"
                         id="im"></div>
                    @include('layouts.partials.helper-error', ['field' => 'im'])
                </div>
            </div>
        </div>

    </div>


    <div id="is_fisica" style=" {{ empty($dados) ? (old('tipo', 'fisica') == 'fisica' ? '' : 'display: none;') : (is_null($dados->nome) ? '' : 'display: none;' ) }};">

        <div class="row">
            <div class="col-md-12">

                <div class="form-group">
                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="control-label obrigatorio" for="nome">Nome</label>
                            <div class="textBox form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                 data-value="{{ $dados->nome or old('nome')  }}"
                                 id="nome"></div>

                            @include('layouts.partials.helper-error', ['field' => 'nome'])
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <label class="control-label" for="cpf">CPF</label>
                            <div class="field_cpf {{ $errors->has('cpf') ? ' is-invalid' : '' }}" id="cpf" data-value="{{ $dados->cpf or old('cpf')  }}"></div>

                            @include('layouts.partials.helper-error', ['field' => 'cpf'])
                        </div>

                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">

                            <label class="control-label" for="sexo">Sexo</label>
                            <div class="selectBox form-control {{ $errors->has('sexo') ? ' is-invalid' : '' }}"
                                 id="sexo"
                                 data-placeholder=""
                                 data-selecteds="{{ empty($dados) ? null : $dados->sexo }}"
                                 data-value_id="id"
                                 data-value_desc="nome"
                                 data-data_source="{{ json_encode([['id' => 'Feminino', 'nome' => 'Feminino'], ['id' => 'Masculino', 'nome' => 'Masculino']]) }}"></div>
                            @include('layouts.partials.helper-error', ['field' => 'sexo'])
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="row">

            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <label class="control-label" for="telefone_1">Telefone Celular</label>
                <div class="field_celular {{ $errors->has('telefone_1') ? ' is-invalid' : '' }}" id="telefone_1" data-value="{{ $dados->telefone_1 or old('telefone_1')  }}"></div>

                @include('layouts.partials.helper-error', ['field' => 'telefone_1'])
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <label class="control-label" for="telefone_2">Telefone Fixo</label>
                <div class="field_fixo {{ $errors->has('telefone_2') ? ' is-invalid' : '' }}" id="telefone_2" data-value="{{ $dados->telefone_2 or old('telefone_2')  }}"></div>

                @include('layouts.partials.helper-error', ['field' => 'telefone_2'])
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label class="control-label" for="email">E-mail</label>
                <div class="textBox form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                     data-value="{{ $dados->email or old('email')  }}"
                     id="email"></div>
                @include('layouts.partials.helper-error', ['field' => 'email'])
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <label class="control-label" for="cep">CEP</label>
                <div class="field_cep {{ $errors->has('cep') ? ' is-invalid' : '' }}" id="cep" data-value="{{ $dados->cep or old('cep')  }}"></div>

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
@endsection
