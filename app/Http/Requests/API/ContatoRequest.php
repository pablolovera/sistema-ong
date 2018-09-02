<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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

        if ( in_array($this->method(), ['POST', 'PUT']) )
            $rules = [
                'empresa_id'    => 'required|integer|exists:empresa,id|unique:site_contato,empresa_id',
                'cep'           => 'nullable|integer|max:8',
                'rua'           => 'nullable|string|max:255',
                'numero'        => 'nullable|string|max:20',
                'bairro'        => 'nullable|string|max:255',
                'cidade'        => 'nullable|string|max:255',
                'uf'            => 'nullable|string|max:255',
                'complemento'   => 'nullable|string|max:500',
                'latitude'      => 'nullable|string|max:30',
                'longitude'     => 'nullable|string|max:30',
                'telefone_1'    => 'nullable|string|max:20',
                'telefone_2'    => 'nullable|string|max:20',
                'email'         => 'nullable|string|max:255',
                'facebook'      => 'nullable|string|max:255',
                'instagran'     => 'nullable|string|max:255',
            ];

        return $rules;
    }
}
