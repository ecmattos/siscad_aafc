<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class AffiliatedSocietyRequest extends Request
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
            'code'                      => 'max:15|required|unique:affiliated_societies,code,'.$this->id.',id,deleted_at,NULL',
            'cnpj'                      => 'cnpj|required|unique:affiliated_societies,cnpj,'.$this->id.',id,deleted_at,NULL',
            'description'               => 'max:100|required',
            'email'                     => 'max:100|required|email|unique:affiliated_societies,email,'.$this->id.',id,deleted_at,NULL',
            'address'                   => 'required',
            'neighborhood'              => 'required',
            'city_id'                   => 'required',
            'zip_code'                  => 'required|digits:8',
            'phone'                     => 'telefone',
            'mobile'                    => 'celular'
            //
        ];
    }

    public function messages()
    {
        return [
            'code.max'                  => '<b>Código</b> >> MÁXIMO 15 caracteres.',
            'code.required'             => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique'               => '<b>Código</b> >> Indisponível.',
            'cnpj.cnpj'                 => '<b>CNPJ</b> >> Inválido.',
            'cnpj.required'             => '<b>CNPJ</b> >> Preenchimento obrigatório.',
            'cnpj.unique'               => '<b>CNPJ</b> >> Indisponível.',
            'description.max'           => '<b>Descrição</b> >> MÁXIMO 100 caracteres.',
            'description.required'      => '<b>Descrição</b> >> Preenchimento obrigatório.',
            'email.required'            => '<b>e-mail</b> >> Preenchimento obrigatório.',
            'address.required'          => '<b>Endereço</b> >> Preenchimento obrigatório.',
            'neighborhood.required'     => '<b>Bairro</b> >> Preenchimento obrigatório.',
            'city_id.required'          => '<b>Cidade</b> >> Preenchimento obrigatório.',
            'zip_code.required'         => '<b>CEP</b> >> Preenchimento obrigatório.',
            'zip_code.digits'           => '<b>CEP</b> >> Inválido (8 dígitos).',
            'phone.telefone'            => '<b>Telefone</b> >> Inválido.',
            'mobile.celular'            => '<b>Celular</b> >> Inválido.'
        ];
    }
}
