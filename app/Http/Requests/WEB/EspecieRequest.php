<?php

namespace App\Http\Requests\WEB;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EspecieRequest extends FormRequest
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
                'nome'          => 'required|string|max:255|unique:especie,nome',
                'status'        => 'required|integer|in:1,0',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'nome'          => ['required', 'string', 'max:255', Rule::unique('especie', 'nome')->ignore($this->id)],
                'status'        => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
