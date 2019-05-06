<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PatrimonialFileRequest extends Request
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
            'filename' => 'required|mimes:jpeg,jpg,png,pdf|max:1500',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'filename.required' => '<b>Arquivo</b> >> Preenchimento obrigatório.',
            'filename.mimes' => '<b>Arquivo</b> >> Extensão inválida.',
            'filename.max' => '<b>Arquivo</b> >> Tamanho excedido (máx: 1500 Kb).',

            'description.required' => '<b>Descrição</b> >> Preenchimento obrigatório.'
        ];
    }
}
