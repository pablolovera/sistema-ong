<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PerfilRequest extends FormRequest
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
                'empresa_id'        => 'required|integer|exists:empresa,id',
                'nome'              => 'required|string|max:255|unique:perfil,nome',
                'status'            => 'required|integer|in:1,0',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'empresa_id'        => 'required|integer|exists:empresa,id',
                'nome'              => ['required', 'string', 'max:255', Rule::unique('perfil', 'nome')->ignore($this->id)],
                'status'            => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
