<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PatrimonialServiceRequest extends Request
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
        $patrimonial_intervention_type_id   = Request::get('patrimonial_intervention_type_id');
        $intervention_date                  = Request::get('intervention_date');
        $invoice_date                       = Request::get('invoice_date');
        $depreciation_date_start            = Request::get('depreciation_date_start');

        if($patrimonial_intervention_type_id=='1')//Aquisicao
        {
            if($depreciation_date_start!=$intervention_date) 
            {
                $validationDepreciationDateStart    = 'required|after:intervention_date|date_format:d/m/Y';
                $validationInterventionDate         = 'required|before:depreciation_date_start|date_format:d/m/Y';
            }
            else
            {
                $validationDepreciationDateStart    = 'required|date_format:d/m/Y';
                $validationInterventionDate         = 'required|date_format:d/m/Y';
            }

            if($invoice_date!=$intervention_date) 
            {
                $validationInterventionDate         = 'required|before:invoice_date|date_format:d/m/Y';
                $validationInvoiceDate              = 'required|after:intervention_date|date_format:d/m/Y';
            }
            else
            {
                $validationInterventionDate         = 'required|date_format:d/m/Y';
                $validationInvoiceDate              = 'required|date_format:d/m/Y';
            }

            return [
            
                'depreciation_date_start'   => $validationDepreciationDateStart,
                'intervention_date'         => $validationInterventionDate,
                'service_id'                => 'required',
                'provider_id'               => 'required',
                'purchase_process'          => 'required',
                'invoice_date'              => $validationInvoiceDate,
                'invoice'                   => 'required',
                'purchase_value'            => 'required|min:1',
                'purchase_qty'              => 'required|min:1'
                //
            ];
        }

        if($patrimonial_intervention_type_id=='2')//Manutencao
        {
            if($depreciation_date_start!=$intervention_date) 
            {
                $validationDepreciationDateStart    = 'required|before:intervention_date|date_format:d/m/Y';
                $validationInterventionDate         = 'required|after:depreciation_date_start|date_format:d/m/Y';
            }
            else
            {
                $validationDepreciationDateStart    = 'required|date_format:d/m/Y';
                $validationInterventionDate         = 'required|date_format:d/m/Y';
            }

            if($invoice_date!=$intervention_date) 
            {
                $validationInterventionDate         = 'required|before:invoice_date|date_format:d/m/Y';
                $validationInvoiceDate              = 'required|after:intervention_date|date_format:d/m/Y';
            }
            else
            {
                $validationInterventionDate         = 'required|date_format:d/m/Y';
                $validationInvoiceDate              = 'required|date_format:d/m/Y';
            }

            return [
            
                'depreciation_date_start'   => $validationDepreciationDateStart,
                'intervention_date'         => $validationInterventionDate,
                'service_id'                => 'required',
                'provider_id'               => 'required',
                'purchase_process'          => 'required',
                'invoice_date'              => $validationInvoiceDate,
                'invoice'                   => 'required',
                'purchase_value'            => 'required|min:1',
                'purchase_qty'              => 'required|min:1'
                //
            ];
        }
    }

    public function messages()
    {
        $patrimonial_intervention_type_id   = Request::get('patrimonial_intervention_type_id');

        if($patrimonial_intervention_type_id=='1')//Aquisicao
        {
            return [
                'depreciation_date_start.after'     => '<b>Data Inicio Depreciação</b> >> Anterior a Data Intervenção.',
                'intervention_date.before'          => '<b>Data Intervenção</b> >> Posterior a Data Nota Fiscal.',
                'intervention_date.required'        => '<b>Data Intervenção</b> >> Preenchimento obrigatório.',
                'intervention_date.date_format'     => '<b>Data Intervenção</b> >> Inválida.',
                'service_id.required'               => '<b>Serviço</b> >> Preenchimento obrigatório.',
                'provider_id.required'              => '<b>Fornecedor</b> >> Preenchimento obrigatório.',
                'purchase_process.required'         => '<b>Processo Compra</b> >> Preenchimento obrigatório.',
                'invoice_date.required'             => '<b>Data Nota Fiscal</b> >> Preenchimento obrigatório.',
                'invoice_date.date_format'          => '<b>Data Nota Fiscal</b> >> Inválida.',
                'invoice_date.after'                => '<b>Data Nota Fiscal</b> >> Anterior a Data Intervenção',
                'invoice.required'                  => '<b>Nota fiscal</b> >> Preenchimento obrigatório.',
                'purchase_value.required'           => '<b>Valor Compra</b> >> Preenchimento obrigatório.',
                'purchase_value.min'                => '<b>Valor Compra</b> >> Inválido.',
                'purchase_qty.required'             => '<b>Qte Compra</b> >> Preenchimento obrigatório.',
                'purchase_qty.min'                  => '<b>Qte Compra</b> >> Inválido.'
            ];
        }

        if($patrimonial_intervention_type_id=='2')//Manutenção
        {
            return [
                'depreciation_date_start.after'     => '<b>Data Inicio Depreciação</b> >> Anterior a Data Intervenção.',
                'intervention_date.before'          => '<b>Data Intervenção</b> >> Posterior a Data Nota Fiscal.',
                'intervention_date.required'        => '<b>Data Intervenção</b> >> Preenchimento obrigatório.',
                'intervention_date.date_format'     => '<b>Data Intervenção</b> >> Inválida.',
                'service_id.required'               => '<b>Serviço</b> >> Preenchimento obrigatório.',
                'provider_id.required'              => '<b>Fornecedor</b> >> Preenchimento obrigatório.',
                'purchase_process.required'         => '<b>Processo Compra</b> >> Preenchimento obrigatório.',
                'invoice_date.required'             => '<b>Data Nota Fiscal</b> >> Preenchimento obrigatório.',
                'invoice_date.date_format'          => '<b>Data Nota Fiscal</b> >> Inválida.',
                'invoice_date.after'                => '<b>Data Nota Fiscal</b> >> Anterior a Data Intervenção',
                'invoice.required'                  => '<b>Nota fiscal</b> >> Preenchimento obrigatório.',
                'purchase_value.required'           => '<b>Valor Compra</b> >> Preenchimento obrigatório.',
                'purchase_value.min'                => '<b>Valor Compra</b> >> Inválido.',
                'purchase_qty.required'             => '<b>Qte Compra</b> >> Preenchimento obrigatório.',
                'purchase_qty.min'                  => '<b>Qte Compra</b> >> Inválido.'
            ];
        }
    }
}
