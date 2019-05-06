<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class AuthRequest extends Request
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
        return [
            'name' => 'required',
            'password' => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '<b>Usuário</b> >> Preenchimento obrigatório.',
            'password.required' => '<b>Senha</b> >> Preenchimento obrigatório.'
        ];
    }
}
