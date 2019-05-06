<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class RoleRequest extends Request
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
            'display_name' => 'max:20|required|unique:roles,display_name,'.$this->id.',id,deleted_at,NULL'
            //
        ];
    }

    public function messages()
    {
        return [
            'display_name.max' => '<b>Descrição</b> >> MÁXIMO :max caracteres.',
            'display_name.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'display_name.unique' => '<b>Descrição</b> >> Indisponível.'
        ];
    }
}
