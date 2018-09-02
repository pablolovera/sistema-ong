<?php

namespace App\Http\Requests\WEB;

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

        if ( $this->method() == 'POST' )
            $rules = [
                'especie_id'    => 'required|integer|exists:especie,id',
                'nome'          => 'required|string|max:255|unique:raca',
                'status'        => 'required|integer|in:1,0',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'especie_id'    => 'required|integer|exists:especie,id',
                'nome'          => ['required', 'string', 'max:255', Rule::unique('raca')->ignore($this->id)],
                'status'        => 'required|integer|in:1,0',
            ];

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
            'especie_id'    => 'especie',
            'nome'          => 'nome',
            'status'        => 'status',
        ];
    }
}
