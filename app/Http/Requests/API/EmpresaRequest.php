<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpresaRequest extends FormRequest
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
            'razao_social'  => 'required|string|max:255|unique:empresa,razao_social',
            'fantasia'      => 'required|string|max:255',
            'cnpj'          => 'required|integer|max:14',
            'ie'            => 'nullable|integer',
            'im'            => 'nullable|integer',
            'cep'           => 'nullable|integer|max:8',
            'rua'           => 'nullable|string|max:300',
            'numero'        => 'nullable|string|max:50',
            'bairro'        => 'nullable|string|max:255',
            'cidade'        => 'nullable|string|max:255',
            'uf'            => 'nullable|string|max:255',
            'complemento'   => 'nullable|string|max:500',
            'telefone_1'    => 'nullable|string|max:20',
            'telefone_2'    => 'nullable|string|max:20'
        ];

        if ( $this->method() == 'GET' )
            return [];

//        if ( $this->method() == 'POST' )
//            return $rules;

        if ( $this->method() == 'PUT' )
            $rules['razao_social'] = ['required', 'string', 'max:255', Rule::unique('empresa', 'razao_social')->ignore($this->id)];

        return $rules;
    }
}