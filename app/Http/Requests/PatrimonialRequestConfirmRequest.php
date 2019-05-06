<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PatrimonialRequestConfirmRequest extends Request
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
            'to_patrimonial_status_date'   => 'required|date_format:d/m/Y'
            //
        ];
    }

    public function messages()
    {
        return [
            'to_patrimonial_status_date.required'      => '<b>Data Movimentação</b> >> Preenchimento obrigatório.',
            'to_patrimonial_status_date.date_format'   => '<b>Data Movimentação</b> >> Inválida.'            
        ];
    }
}
