<?php

namespace App\Http\Requests\WEB;

use Illuminate\Foundation\Http\FormRequest;

class DenunciaRequest extends FormRequest
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
                'usuario_id'    => 'nullable|integer|exists:usuario,id',
                'mensagem'      => 'required|string',
                'status'        => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
