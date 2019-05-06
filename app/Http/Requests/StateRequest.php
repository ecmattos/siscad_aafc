<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class StateRequest extends Request
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
            'code' => 'max:2|required|unique:states,code,'.$this->id.',id,deleted_at,NULL',
            'description' => 'max:20|required|unique:states,description,'.$this->id.',id,deleted_at,NULL'
            //
        ];
    }

    public function messages()
    {
        return [
            'code.max' => '<b>UF</b> >> MÁXIMO 2 caracteres.',
            'code.required' => '<b>UF</b> >> Preenchimento obrigatório.',
            'code.unique' => '<b>UF</b> >> Indisponível.',
           
            'description.max' => '<b>Descrição</b> >> MÁXIMO 20 caracteres.',
            'description.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'description.unique' => '<b>Descrição</b> >> Indisponível.'
        ];
    }
}
