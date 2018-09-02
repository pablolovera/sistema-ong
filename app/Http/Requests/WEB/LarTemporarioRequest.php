<?php

namespace App\Http\Requests\WEB;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LarTemporarioRequest extends FormRequest
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
            'pessoa_id'                 => 'required|integer|exists:pessoa,id',
            'nome'                      => 'required|string|max:255|unique:lar_temporario,nome',
            'cep'                       => 'nullable|integer',
            'rua'                       => 'nullable|string|max:300',
            'numero'                    => 'nullable|string|max:50',
            'bairro'                    => 'nullable|string|max:255',
            'cidade'                    => 'nullable|string|max:255',
            'uf'                        => 'nullable|string|max:255',
            'complemento'               => 'nullable|string|max:500',
            'status'                    => 'required|integer|in:1,0',
            'capacidades.*.especie_id'  => 'required|integer|exists:especie,id',
            'capacidades.*.capacidade'  => 'required|integer',
        ];

        if ( $this->method() == 'PUT' )
            $rules['nome']  = ['required', 'string', 'max:255', Rule::unique('lar_temporario', 'nome')->ignore($this->id)];

        return $rules;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'pessoa_id'                 => 'responsável',
            'nome'                      => 'nome',
            'cep'                       => 'cep',
            'rua'                       => 'rua',
            'numero'                    => 'número',
            'bairro'                    => 'bairro',
            'cidade'                    => 'cidade',
            'uf'                        => 'uf',
            'complemento'               => 'complemento',
            'status'                    => 'status',
            'capacidades.*.especie_id'  => 'espécie',
            'capacidades.*.capacidade'  => 'capacidade',
        ];
    }
}
