<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class UserAvatarRequest extends Request
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
            'avatar' => 'required|mimes:jpeg,jpg,png|max:250'
        ];
    }

    public function messages()
    {
        return [
            'avatar.required' => '<b>Arquivo</b> >> Preenchimento obrigatório.',
            'avatar.mimes' => '<b>Arquivo</b> >> Extensão inválida.',
            'avatar.max' => '<b>Arquivo</b> >> Tamanho excedido (máx: 250 Kb).'
        ];
    }
}
