<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PartnerRequest extends Request
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
            'name'              => 'max:100|required',
            'partner_type_id'   => 'required',
            'address'           => 'required',  
            'neighborhood'      => 'required',
            'city_id'           => 'required',
            'zip_code'          => 'required|digits:8',
            'phone'             => 'telefone',
            'mobile'            => 'celular',
            'email'             => 'max:100|email|unique:members,email,'.$this->id.''     
            //
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => '<b>Nome</b> >> Preenchimento obrigatório.',
            'partner_type_id.required'  => '<b>Tipo</b> >> Preenchimento obrigatório.',
            'address.required'          => '<b>Endereço</b> >> Preenchimento obrigatório.',
            'neighborhood.required'     => '<b>Bairro</b> >> Preenchimento obrigatório.',
            'city_id.required'          => '<b>Cidade</b> >> Preenchimento obrigatório.',
            'phone.telefone'            => '<b>Telefone</b> >> Inválido.',
            'mobile.celular'            => '<b>Celular</b> >> Inválido.',
            'zip_code.required'         => '<b>CEP</b> >> Preenchimento obrigatório.',
            'zip_code.digits'           => '<b>CEP</b> >> Inválido (8 dígitos).'
        ];
    }
}
