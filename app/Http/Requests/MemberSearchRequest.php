<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class MemberSearchRequest extends Request
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
            'srch_member_code' => 'required_without_all:srch_member_cpf,srch_member_name,srch_member_plan_id,srch_member_gender_id,srch_member_region_id,srch_member_city_id,srch_member_status_id,srch_member_status_reason_id'
            //
        ];
    }

    public function messages()
    {
        return [
            'srch_member_code.required_without_all' => '<b>Preenchimento MÍNIMO obrigatório</b> >> Favor informar pelo menos UM campo.'
        ];
    }
}
