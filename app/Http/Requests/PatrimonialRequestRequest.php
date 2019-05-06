<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PatrimonialRequestRequest extends Request
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
            'from_employee_id'          => 'required',
            'to_management_unit_id'     => 'required',
            'to_company_sector_id'      => 'required',
            'to_company_sub_sector_id'  => 'required',
            'to_employee_id'            => 'required',
            'to_patrimonial_status_id'  => 'required'            //
        ];
    }

    public function messages()
    {
        return [
            'from_employee_id.required'         => '<b>ORIGEM: Responsável</b> >> Preenchimento obrigatório.',
            'to_management_unit_id.required'    => '<b>DESTINO: Unidade Gestora</b> >> Preenchimento obrigatório.',
            'to_company_sector_id.required'     => '<b>DESTINO: Setor</b> >> Preenchimento obrigatório.',
            'to_company_sub_sector_id.required' => '<b>DESTINO: Sub-setor</b> >> Preenchimento obrigatório.',
            'to_employee_id.required'           => '<b>DESTINO: Responsável</b> >> Preenchimento obrigatório.',
            'to_patrimonial_status_id.required' => '<b>DESTINO: Situação</b> >> Preenchimento obrigatório.'
        ];
    }
}
