<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PatrimonialRequest extends Request
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
            'code'                      => 'required|unique:patrimonials,code,'.$this->id.',id,deleted_at,NULL',
            'patrimonial_type_id'       => 'required',
            'patrimonial_sub_type_id'   => 'required',
            'patrimonial_model_id'      => 'required',
            'patrimonial_brand_id'      => 'required',
            'serial'                    => 'required',
            'purchase_process'          => 'required',
            'provider_id'               => 'required',
            'invoice_date'              => 'required|date_format:d/m/Y',
            'purchase_value'            => 'required|min:1',
            'invoice'                   => 'required',
            'management_unit_id'        => 'required',
            'company_sector_id'         => 'required',
            'company_sub_sector_id'     => 'required',
            'employee_id'               => 'required',
            'patrimonial_status_id'     => 'required',
            'patrimonial_status_date'   => 'required|after:invoice_date|date_format:d/m/Y'
            //
        ];
    }

    public function messages()
    {
        return [
            'code.required'                         => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique'                           => '<b>Código</b> >> Indisponível.',

            'patrimonial_type_id.required'          => '<b>Tipo</b> >> Preenchimento obrigatório.',
            'patrimonial_sub_type_id.required'      => '<b>Sub-tipo</b> >> Preenchimento obrigatório.',
            'patrimonial_model_id.required'         => '<b>Modelo</b> >> Preenchimento obrigatório.',
            'patrimonial_brand_id.required'         => '<b>Marca</b> >> Preenchimento obrigatório.',

            'serial.required'                       => '<b>Nr serial</b> >> Preenchimento obrigatório.',
            'purchase_process.required'             => '<b>Processo Compra</b> >> Preenchimento obrigatório.',
            'provider_id.required'                  => '<b>Fornecedor</b> >> Preenchimento obrigatório.',
            'invoice_date.required'                 => '<b>Data Nota Fiscal</b> >> Preenchimento obrigatório.',
            'invoice_date.date_format'              => '<b>Data Nota Fiscal</b> >> Inválida.',
            'purchase_value.required'               => '<b>Valor Compra</b> >> Preenchimento obrigatório.',
            'purchase_value.min'                    => '<b>Valor Compra</b> >> Inválido.',

            'invoice.required'                      => '<b>Nota fiscal</b> >> Preenchimento obrigatório.',
            'management_unit_id.required'           => '<b>Unidade Gestora</b> >> Preenchimento obrigatório.',
            'company_sector_id.required'            => '<b>Setor</b> >> Preenchimento obrigatório.',
            'company_sub_sector_id.required'        => '<b>Sub-setor</b> >> Preenchimento obrigatório.',
            'employee_id.required'                  => '<b>Responsável</b> >> Preenchimento obrigatório.',
            'patrimonial_status_id.required'        => '<b>Situação</b> >> Preenchimento obrigatório.',
            'patrimonial_status_date.required'      => '<b>Data Situação</b> >> Preenchimento obrigatório.',
            'patrimonial_status_date.after'         => '<b>Data Situação</b> >> Posterior a data de compra.',
            'patrimonial_status_date.date_format'   => '<b>Data Situação</b> >> Inválida.'
        ];
    }
}
