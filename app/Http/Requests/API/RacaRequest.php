<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RacaRequest extends FormRequest
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
                'especie_id'    => 'required|integer|exists:especie,id',
                'nome'          => 'required|string|max:255|unique:raca',
                'status'        => 'required|integer|in:1,0',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'empresa_id'    => 'required|integer|exists:empresa,id',
                'especie_id'    => 'required|integer|exists:especie,id',
                'nome'          => ['required', 'string', 'max:255', Rule::unique('raca')->ignore($this->id)],
                'status'        => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
