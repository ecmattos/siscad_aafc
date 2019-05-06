<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class EmployeeMovementEndRequest extends Request
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
            'date_start'              => 'required|date_format:d/m/Y',
            'date_end'                => 'required|after:date_start|date_format:d/m/Y'
        ];
    }

    public function messages()
    {
        return [
            'date_start.required'       => '<b>Data de Entrada</b> >> Preenchimento obrigatório.',
            'date_start.date_format'    => '<b>Data de Entrada</b> >> Inválida.',
            'date_end.required'         => '<b>Data de Saída</b> >> Preenchimento obrigatório.',
            'date_end.date_format'      => '<b>Data de Saída</b> >> Inválida.',
            'date_end.after'            => '<b>Data de Saída</b> >> Deve ser posterior à Data de Entrada.'
        ];
    }
}
