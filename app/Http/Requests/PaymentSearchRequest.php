<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PaymentSearchRequest extends Request
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
            'srch_payment_year' => 'required|numeric|between:2016,2500'
            //
        ];
    }

    public function messages()
    {
        return [
            'srch_payment_year.required' => '<b>Competência</b> >> Preenchimento obrigatório.',
            'srch_payment_year.numeric' => '<b>Competência</b> >> Inválida.',
            'srch_payment_year.between' => '<b>Competência</b> >> Inválida.'

        ];
    }
}
