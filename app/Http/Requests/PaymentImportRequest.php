<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PaymentImportRequest extends Request
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
            'payment_reason_id'     => 'required',
            'payment_method_id'     => 'required',
            'payment_date'          => 'required|date_format:d/m/Y',
            //'payment_import_file'   => 'required|mimes:csv',
            //
        ];
    }

    public function messages()
    {
        return [
            'payment_reason_id.required' => '<b>Finalidade</b> >> Preenchimento obrigatório.',
            'payment_method_id.required' => '<b>Método</b> >> Preenchimento obrigatório.',
            'payment_date.required' => '<b>Data</b> >> Preenchimento obrigatório.',
            'payment_date.date_format' => '<b>Data</b> >> Inválida.',
            'payment_import_file.required' => '<b>Arquivo</b> >> Preenchimento obrigatório.',
            //'payment_import_file.mimes' => '<b>Arquivo</b> >> Formato inválido.'
        ];
    }
}
