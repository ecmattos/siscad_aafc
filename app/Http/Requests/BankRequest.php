<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class BankRequest extends Request
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
            'code' => 'max:3|required|unique:banks,code,'.$this->id.',id,deleted_at,NULL',
            'description' => 'max:30|required|unique:banks,description,'.$this->id.',id,deleted_at,NULL'
        ];
    }

    public function messages()
    {
        return [
            'code.max' => '<b>Código</b> >> MÁXIMO 3 caracter.',
            'code.required' => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique' => '<b>Código</b> >> Indisponível.',
           
            'description.max' => '<b>Descrição</b> >> MÁXIMO 30 caracteres.',
            'description.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'description.unique' => '<b>Descrição</b> >> Indisponível.'
        ];
    }
}
