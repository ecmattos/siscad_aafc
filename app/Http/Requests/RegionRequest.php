<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class RegionRequest extends Request
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
            'code' => 'max:2|required|unique:regions,code,'.$this->id.',id,deleted_at,NULL',
            'description' => 'max:30|required|unique:regions,description,'.$this->id.',id,deleted_at,NULL'            
        ];
    }

    public function messages()
    {
        return [
            
            'code.max' => '<b>Código</b> >> MÁXIMO 2 caracteres.',
            'code.required' => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique' => '<b>Código</b> >> Indisponível.',

            'description.max' => '<b>Descrição</b> >> MÁXIMO 30 caracteres.',
            'description.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'description.unique' => '<b>Descrição</b> >> Indisponível.'
        ];
    }
}
