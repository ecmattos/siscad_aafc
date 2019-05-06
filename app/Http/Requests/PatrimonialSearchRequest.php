<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PatrimonialSearchRequest extends Request
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
        $srch_patrimonial_invoice_date_start   = Request::get('srch_patrimonial_invoice_date_start');
        $srch_patrimonial_invoice_date_end     = Request::get('srch_patrimonial_invoice_date_end');

        if($srch_patrimonial_invoice_date_start!=$srch_patrimonial_invoice_date_end)
        {
            $validationPatrimonialInvoiceDateStart = 'required_with:srch_patrimonial_invoice_date_end|before:srch_patrimonial_invoice_date_end|date_format:d/m/Y';
            $validationPatrimonialInvoiceDateEnd = 'required_with:srch_patrimonial_invoice_date_start|date_format:d/m/Y';
        }
        else
        {
            $validationPatrimonialInvoiceDateStart = '';
            $validationPatrimonialInvoiceDateEnd = '';
        }

        return [
            'srch_patrimonial_code' => 'required_without_all:srch_patrimonial_description,srch_patrimonial_type_id,srch_patrimonial_sub_type_id,srch_patrimonial_brand_id,srch_patrimonial_model_id,srch_patrimonial_serial,srch_patrimonial_purchase_process,srch_asset_accounting_account_id,srch_patrimonial_provider_id,srch_patrimonial_employee_id,srch_patrimonial_invoice,srch_patrimonial_invoice_date_start,srch_patrimonial_invoice_date_end,srch_patrimonial_status_date_start,srch_patrimonial_status_date_end,srch_patrimonial_management_unit_id,srch_company_sector_id,srch_company_sub_sector_id,srch_patrimonial_status_id',

            'srch_patrimonial_invoice_date_start'  => $validationPatrimonialInvoiceDateStart, 
            'srch_patrimonial_invoice_date_end'    => $validationPatrimonialInvoiceDateEnd,

            'srch_patrimonial_status_date_start'  => 'required_with:srch_patrimonial_status_date_end|before:srch_patrimonial_status_date_end|date_format:d/m/Y', 
            'srch_patrimonial_status_date_end'    => 'required_with:srch_patrimonial_status_date_start|date_format:d/m/Y',

            'srch_depreciation_date'    => 'required|date_format:d/m/Y'          
        ];
    }

    public function messages()
    {
        return [
            'srch_patrimonial_code.required_without_all'            => '<b>Preenchimento MÍNIMO obrigatório</b> >> Favor informar pelo menos DOIS campos.',

            'srch_patrimonial_invoice_date_start.required_with'     =>  '<b>Período compra início</b> >> Preenchimento obrigatório.',
            'srch_patrimonial_invoice_date_start.before'            =>  '<b>Período compra início</b> >> Posterior ao período compra fim.',
            'srch_patrimonial_invoice_date_start.date_format'       =>  '<b>Período compra inicio</b> >> Inválida.',

            'srch_patrimonial_invoice_date_end.required_with'       =>  '<b>Período compra fim</b> >> Preenchimento obrigatório.',
            'srch_patrimonial_invoice_date_end.date_format'         =>  '<b>Período compra fim</b> >> Inválida.',

            'srch_patrimonial_status_date_start.required_with'      =>  '<b>Período situação início</b> >> Preenchimento obrigatório.',
            'srch_patrimonial_status_date_start.before'             =>  '<b>Período situação início</b> >> Posterior ao período compra fim.',
            'srch_patrimonial_status_date_start.date_format'        =>  '<b>Período situação inicio</b> >> Inválida.',

            'srch_patrimonial_status_date_end.required_with'        =>  '<b>Período situação fim</b> >> Preenchimento obrigatório.',
            'srch_patrimonial_status_date_end.date_format'          =>  '<b>Período situação fim</b> >> Inválida.',      

            'srch_depreciation_date.required'                       =>  '<b>Data limite depreciação</b> >> Preenchimento obrigatório.',
            'srch_depreciation_date.date_format'                    =>  '<b>Data limite depreciação</b> >> Inválida.',      

        ];
    }
}
