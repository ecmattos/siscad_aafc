<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PermissionRoleRequest extends Request
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
            'permission_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'permission_id.required' => '<b>Permissão</b> >> Preenchimento obrigatório.'
        ];
    }
}
