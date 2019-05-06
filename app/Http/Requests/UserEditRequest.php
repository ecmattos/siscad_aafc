<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class UserEditRequest extends Request
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
            'name' => 'required|max:40|unique:users,name,'.$this->id.',id,deleted_at,NULL',
            'fullname' => 'required|max:100|unique:users,fullname,'.$this->id.',id,deleted_at,NULL',
            'email' => 'required|email|max:50|unique:users,email,'.$this->id.',id,deleted_at,NULL'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '<b>Usuário</b> >> Preenchimento obrigatório.',
            'name.max' => '<b>Usuário</b> >> MÀXIMO 50 caracteres.',
            'name.unique' => '<b>Usuário</b> >> Indisponível.',
            
            'fullname.required' => '<b>Nome completo</b> >> Preenchimento obrigatório.',
            'fullname.max' => '<b>Nome completo</b> >> MÀXIMO 100 caracteres.',
            'fullname.unique' => '<b>Nome completo</b> >> Indisponível.',

            'email.required' => '<b>e-mail</b> >> Preenchimento obrigatório.',
            'email.max' => '<b>e-mail</b> >> MÀXIMO 50 caracteres.',
            'email.unique' => '<b>e-mail</b> >> Indisponível.'
        ];
    }
}
