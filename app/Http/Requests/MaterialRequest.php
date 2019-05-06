<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class MaterialRequest extends Request
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
            'code' => 'numeric|required|unique:materials,code,'.$this->id.',id,deleted_at,NULL',
            'description' => 'max:100|required|unique:materials,description,'.$this->id.',id,deleted_at,NULL',
            'material_unit_id' => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'code.max' => '<b>Código</b> >> MÁXIMO 15 caracteres.',
            'code.numeric' => '<b>Código</b> >> Caractere(s) inválido(s).',
            'code.required' => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique' => '<b>Código</b> >> Indisponível.',
           
            'description.max' => '<b>Descrição</b> >> MÁXIMO 20 caracteres.',
            'description.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'description.unique' => '<b>Descrição</b> >> Indisponível.',

            'material_unit_id.required' => '<b>Unidade</b> >> Preenchimento obrigatório.',
        ];
    }
}
