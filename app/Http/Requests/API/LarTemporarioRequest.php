<?php

namespace App\Http\Requests\API;

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
        $rules = [];

        if ( in_array($this->method(), ['GET', 'DELETE']) )
            $rules['empresa_id'] = 'required|integer|exists:empresa,id';

        if ( $this->method() == 'POST' )
            $rules = [
                'empresa_id'    => 'required|integer|exists:empresa,id',
                'pessoa_id'     => 'required|integer|exists:pessoa,id',
                'raca_id'       => 'required|integer|exists:raca,id',
                'nome'          => 'required|string|max:255|unique:lar_temporario,nome',
                'cep'           => 'nullable|integer|max:8',
                'rua'           => 'nullable|string|max:300',
                'numero'        => 'nullable|string|max:50',
                'bairro'        => 'nullable|string|max:255',
                'cidade'        => 'nullable|string|max:255',
                'uf'            => 'nullable|string|max:255',
                'complemento'   => 'nullable|string|max:500',
                'status'        => 'required|integer|in:1,0',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'empresa_id'    => 'required|integer|exists:empresa,id',
                'pessoa_id'     => 'required|integer|exists:pessoa,id',
                'raca_id'       => 'required|integer|exists:raca,id',
                'nome'          => ['required', 'string', 'max:255', Rule::unique('lar_temporario', 'nome')->ignore($this->id)],
                'cep'           => 'nullable|integer|max:8',
                'rua'           => 'nullable|string|max:300',
                'numero'        => 'nullable|string|max:50',
                'bairro'        => 'nullable|string|max:255',
                'cidade'        => 'nullable|string|max:255',
                'uf'            => 'nullable|string|max:255',
                'complemento'   => 'nullable|string|max:500',
                'status'        => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
