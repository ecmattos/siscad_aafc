<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PatrimonialReportCompanySectorSearchRequest extends Request
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
            'srch_management_unit_id'        => 'required',
            'srch_company_sector_id'         => 'required',
            'srch_company_sub_sector_id'     => 'required',
            'srch_patrimonial_status_id'     => 'required'
            //
        ];
    }

    public function messages()
    {
        return [
            'srch_management_unit_id.required'           => '<b>Unidade Gestora</b> >> Preenchimento obrigatório.',
            'srch_company_sector_id.required'            => '<b>Setor</b> >> Preenchimento obrigatório.',
            'srch_company_sub_sector_id.required'        => '<b>Sub-setor</b> >> Preenchimento obrigatório.',
            'srch_patrimonial_status_id.required'        => '<b>Situação</b> >> Preenchimento obrigatório.'
        ];
    }
}
