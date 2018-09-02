<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PessoaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        if ( in_array($this->method(), ['GET', 'DELETE']) )
            $rules['empresa_id'] = 'required|integer|exists:empresa,id';

        if ( $this->method() == 'POST' )
            $rules = [
                'empresa_id'    => 'required|integer|exists:empresa,id',
                'razao_social'  => 'required|string|max:255|unique:pessoa,razao_social',
                'nome'          => 'required|string|max:255',
                'cpf'           => 'nullable|integer|max:11',
                'cnpj'          => 'nullable|integer|max:14',
                'ie'            => 'nullable|integer',
                'im'            => 'nullable|integer',
                'cep'           => 'nullable|integer|max:8',
                'rua'           => 'nullable|string|max:300',
                'numero'        => 'nullable|string|max:400',
                'bairro'        => 'nullable|string|max:255',
                'cidade'        => 'nullable|string|max:255',
                'uf'            => 'nullable|string|max:255',
                'complemento'   => 'nullable|string|max:500',
                'telefone_1'    => 'nullable|string|max:20',
                'telefone_2'    => 'nullable|string|max:20',
                'status'        => 'required|integer|in:1,0',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'empresa_id'    => 'required|integer|exists:empresa,id',
                'razao_social'  => ['required', 'string', 'max:255', Rule::unique('pessoa', 'razao_social')->ignore($this->id)],
                'nome'          => 'required|string|max:255',
                'cpf'           => 'nullable|integer|max:11',
                'cnpj'          => 'nullable|integer|max:14',
                'ie'            => 'nullable|integer',
                'im'            => 'nullable|integer',
                'cep'           => 'nullable|integer|max:8',
                'rua'           => 'nullable|string|max:300',
                'numero'        => 'nullable|string|max:400',
                'bairro'        => 'nullable|string|max:255',
                'cidade'        => 'nullable|string|max:255',
                'uf'            => 'nullable|string|max:255',
                'complemento'   => 'nullable|string|max:500',
                'telefone_1'    => 'nullable|string|max:20',
                'telefone_2'    => 'nullable|string|max:20',
                'status'        => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
