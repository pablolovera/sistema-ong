<?php

namespace App\Http\Requests\WEB;

use Illuminate\Foundation\Http\FormRequest;

class LarTemporarioCapacidadeRequest extends FormRequest
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

        if ( in_array($this->method(), ['POST', 'PUT']) )
            $rules = [
                'lar_temporario_id' => 'required|integer|exists:lar_temporario,id',
                'especie_id'        => 'required|integer|exists:especie,id',
                'capacidade'        => 'required|integer',
                'status'            => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
