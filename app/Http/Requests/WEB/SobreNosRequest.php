<?php

namespace App\Http\Requests\WEB;

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

        if ( $this->method() == 'POST' )
            $rules = [
                'historia'      => 'nullable|string',
                'missao'        => 'nullable|string',
                'visao'         => 'nullable|string',
                'valores'       => 'nullable|string',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'historia'      => 'nullable|string',
                'missao'        => 'nullable|string',
                'visao'         => 'nullable|string',
                'valores'       => 'nullable|string',
            ];

        return $rules;
    }
}
