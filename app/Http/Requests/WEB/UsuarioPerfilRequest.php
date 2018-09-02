<?php

namespace App\Http\Requests\WEB;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioPerfilRequest extends FormRequest
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
                'usuario_id'    => 'required|integer|exists:usuario,id',
                'perfil_id'     => 'required|integer|exists:perfil,id',
            ];

        return $rules;
    }
}
