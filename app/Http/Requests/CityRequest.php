<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class CityRequest extends Request
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
            'state_id' => 'required',
            'description' => 'max:40|required|unique:cities,description,'.$this->id.',id,deleted_at,NULL',
            'region_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'state_id.required' => '<b>UF</b> >> Preenchimento obrigatório.',
            
            'description.max' => '<b>Descrição</b> >> MÁXIMO 40 caracteres.',
            'description.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'description.unique' => '<b>Descrição</b> >> Indisponível.',

            'region_id.required' => '<b>Região</b> >> Preenchimento obrigatório.'
        ];
    }
}
