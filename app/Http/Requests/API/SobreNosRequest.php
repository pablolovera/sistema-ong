<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SobreNosRequest extends FormRequest
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
                'empresa_id'    => 'required|integer|exists:empresa,id|unique:empresa_id,id',
                'historia'      => 'nullable|string',
                'missao'        => 'nullable|string',
                'visao'         => 'nullable|string',
                'valores'       => 'nullable|string',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'empresa_id'    => ['required', 'integer', 'max:255', Rule::unique('empresa', 'id')->ignore($this->id)],
                'historia'      => 'nullable|string',
                'missao'        => 'nullable|string',
                'visao'         => 'nullable|string',
                'valores'       => 'nullable|string',
            ];

        return $rules;
    }
}
