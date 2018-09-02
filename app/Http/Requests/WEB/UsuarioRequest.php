<?php

namespace App\Http\Requests\WEB;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
                'tipo_usuario_id'   => 'required|integer|exists:tipo_usuario,id',
                'nome'              => 'required|string|max:255',
                'email'             => 'required|email|max:255|unique:usuario,email',
                'password'          => 'required|string|min:6|confirmed|max:255',
                'foto'              => 'nullable|string|max:255',
                'cpf'               => 'nullable|integer|max:11',
                'cep'               => 'nullable|integer|max:8',
                'rua'               => 'nullable|string|max:300',
                'numero'            => 'nullable|string|max:400',
                'bairro'            => 'nullable|string|max:255',
                'cidade'            => 'nullable|string|max:255',
                'uf'                => 'nullable|string|max:255',
                'complemento'       => 'nullable|string|max:500',
                'telefone_1'        => 'nullable|string|max:20',
                'telefone_2'        => 'nullable|string|max:20',
                'status'            => 'required|integer|in:1,0',
            ];

        if ( $this->method() == 'PUT' )
            $rules = [
                'tipo_usuario_id'   => 'required|integer|exists:tipo_usuario,id',
                'nome'              => 'required|string|max:255',
                'email'             => ['required', 'email', 'max:255', Rule::unique('usuario')->ignore($this->id)],
                'password'          => 'required|string|min:6|confirmed|max:255',
                'foto'              => 'nullable|string|max:255',
                'cpf'               => 'nullable|integer|max:11',
                'cep'               => 'nullable|integer|max:8',
                'rua'               => 'nullable|string|max:300',
                'numero'            => 'nullable|string|max:400',
                'bairro'            => 'nullable|string|max:255',
                'cidade'            => 'nullable|string|max:255',
                'uf'                => 'nullable|string|max:255',
                'complemento'       => 'nullable|string|max:500',
                'telefone_1'        => 'nullable|string|max:20',
                'telefone_2'        => 'nullable|string|max:20',
                'status'            => 'required|integer|in:1,0',
            ];

        return $rules;
    }
}
