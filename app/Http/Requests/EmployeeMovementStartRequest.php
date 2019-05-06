<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class EmployeeMovementStartRequest extends Request
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
            'company_position_id'       => 'required',
            'company_responsibility_id' => 'required',
            'management_unit_id'        => 'required',
            'company_sector_id'         => 'required',
            'company_sub_sector_id'     => 'required',
            'date_start'                => 'required|date_format:d/m/Y'
        ];
    }

    public function messages()
    {
        return [
            'company_position_id.required'          => '<b>Cargo</b> >> Preenchimento obrigatório.',
            'company_responsibility_id.required'    => '<b>Função</b> >> Preenchimento obrigatório.',
            'management_unit_id.required'           => '<b>Unid.Gestora</b> >> Preenchimento obrigatório.',
            'company_sector_id.required'            => '<b>Setor</b> >> Preenchimento obrigatório.',
            'company_sub_sector_id.required'        => '<b>Sub-setor</b> >> Preenchimento obrigatório.',
            'company_position_id.required'          => '<b>Cargo</b> >> Preenchimento obrigatório.',
            'date_start.required'                   => '<b>Data de Entrada</b> >> Preenchimento obrigatório.',
            'date_start.date_format'                => '<b>Data de Entrada</b> >> Inválida.'
        ];
    }
}
