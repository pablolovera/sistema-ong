<?php

namespace App\Http\Requests\WEB;

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
        $rules = [
            'razao_social'      => 'required_if:tipo,juridica|max:255',
            'nome'              => 'required_if:tipo,fisica|max:255',
            'cpf'               => 'nullable|integer|max:11|unique:pessoa,cpf',
            'cnpj'              => 'nullable|integer|max:14|unique:pessoa,cnpj',
            'ie'                => 'nullable|integer',
            'im'                => 'nullable|integer',
            'cep'               => 'nullable|integer|max:8',
            'rua'               => 'nullable|string|max:300',
            'numero'            => 'nullable|string|max:400',
            'bairro'            => 'nullable|string|max:255',
            'cidade'            => 'nullable|string|max:255',
            'uf'                => 'nullable|string|max:255',
            'complemento'       => 'nullable|string|max:500',
            'telefone_1'        => 'nullable|string|max:20',
            'telefone_2'        => 'nullable|string|max:20',
            'email'             => 'nullable|email',
            'data_nascimento'   => 'nullable|date_format:d/m/Y',
            'status'            => 'required|integer|in:1,0',
        ];

        if ( $this->method() == 'PUT' ) :
            $rules['razao_social']  = ['required_if:tipo,juridica', 'max:255', Rule::unique('pessoa', 'razao_social')->ignore($this->id)];
            $rules['cpf']           = ['nullable', 'integer', 'max:11', Rule::unique('pessoa', 'cpf')->ignore($this->id)];
            $rules['cnpj']          = ['nullable', 'integer', 'max:14', Rule::unique('pessoa', 'cnpj')->ignore($this->id)];
        endif;

        return $rules;
    }
}
