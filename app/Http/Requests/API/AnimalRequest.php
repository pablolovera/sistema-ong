<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
            $rules = [
                'empresa_id' => 'required|integer|exists:empresa,id',
            ];

        if ( in_array($this->method(), ['POST', 'PUT']) )
            $rules = [
                'empresa_id'        => 'required|integer|exists:empresa,id',
                'raca_id'           => 'required|integer|exists:raca,id',
                'pessoa_id'         => 'required|integer|exists:pessoa,id',
                'lar_temporario_id' => 'nullable|integer|exists:lar_temporario,id',
                'nome'              => 'required|string|max:400',
                'data_nascimento'   => 'nullable|date_format:Y-m-d',
                'sexo'              => 'nullable|string|in:macho,femea|max:100',
                'peso'              => 'nullable|numeric',
                'temperamento'      => 'nullable|string',
                'pelagem'           => 'nullable|string|max:400',
                'observacao'        => 'nullable|string',
                'status'            => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
