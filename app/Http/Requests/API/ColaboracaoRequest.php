<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ColaboracaoRequest extends FormRequest
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
                'empresa_id'            => 'required|integer|exists:empresa,id',
                'tipo_colaboracao_id'   => 'required|exists:tipo_colaboracao,id',
                'mensagem'              => 'required|string',
            ];

        return $rules;
    }
}
