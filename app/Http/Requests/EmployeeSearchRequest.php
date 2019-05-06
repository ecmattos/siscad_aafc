<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class EmployeeSearchRequest extends Request
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
            'srch_employee_code' => 'required_without_all:srch_employee_cpf,srch_employee_name,srch_employee_plan_id,srch_employee_gender_id,srch_employee_region_id,srch_employee_city_id,srch_employee_status_id,srch_employee_status_reason_id'
            //
        ];
    }

    public function messages()
    {
        return [
            'srch_employee_code.required_without_all' => '<b>Preenchimento MÍNIMO obrigatório</b> >> Favor informar pelo menos UM campo.'
        ];
    }
}
