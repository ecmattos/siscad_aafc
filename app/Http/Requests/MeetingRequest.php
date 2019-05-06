<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class MeetingRequest extends Request
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
            'date'                          => 'required|date_format:d/m/Y',
            'city_id'                       => 'required',
            'meeting_type_id'               => 'required',
            'description'                   => 'max:50|required'
        ];
    }

    public function messages()
    {
        return [
            'date.date_format'                      => '<b>Data</b> >> Inválida.',
            'date.required'                         => '<b>Data</b> >> Preenchimento obrigatório.',
            'city_id.required'                      => '<b>Cidade</b> >> Preenchimento obrigatório.',
            'meeting_type_id.required'              => '<b>Tipo</b> >> Preenchimento obrigatório.',
            'description.required'                  => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'description.max'                       => '<b>Descrição</b> >> MÁXIMO 50 caracteres.'
        ];
    }
}
