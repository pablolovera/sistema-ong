<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ParceirosRequest extends FormRequest
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
                'empresa_id'    => 'required|integer|exists:empresa,id',
                'nome'          => 'required|string|max:255',
                'endereco'      => 'nullable|string|max:500',
                'logo'          => 'nullable|string|max:255',
                'site'          => 'nullable|url|string|max:255',
            ];

        return $rules;
    }
}
