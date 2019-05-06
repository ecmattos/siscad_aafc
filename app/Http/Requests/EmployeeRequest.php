<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class EmployeeRequest extends Request
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
            'code'                      => 'required|unique:employees,code,'.$this->id.',id,deleted_at,NULL',
            'cpf'                       => 'cpf_mascara|unique:employees,cpf,'.$this->id.',id,deleted_at,NULL',
            'name'                      => 'max:100|required',
            'gender_id'                 => 'required',
            'email'                     => 'required|unique:employees,email,'.$this->id.',id,deleted_at,NULL',
            'address'                   => 'required',
            'neighborhood'              => 'required',
            'city_id'                   => 'required',
            'zip_code'                  => 'required|digits:8',
            'phone'                     => 'telefone',
            'mobile'                    => 'celular',
            'birthday'                  => 'required|date_format:d/m/Y',
            'management_unit_id'        => 'required',
            'company_position_id'       => 'required',
            'company_responsibility_id' => 'required',
            'date_start'                => 'required|date_format:d/m/Y'
        ];
    }

    public function messages()
    {
        return [
            'code.required'                         => '<b>Matrícula</b> >> Preenchimento obrigatório.',
            'code.unique'                           => '<b>Matrícula</b> >> Indisponível.',
            'cpf.cpf_mascara'                       => '<b>CPF</b> >> Inválido.',
            'cpf.unique'                            => '<b>CPF</b> >> Indisponível.',
            'name.required'                         => '<b>Nome</b> >> Preenchimento obrigatório.',
            'gender_id.required'                    => '<b>Sexo</b> >> Preenchimento obrigatório.',
            'email.required'                        => '<b>e-mail</b> >> Preenchimento obrigatório.',
            'email.unique'                          => '<b>e-mail</b> >> Indisponível.',
            'address.required'                      => '<b>Endereço</b> >> Preenchimento obrigatório.',
            'neighborhood.required'                 => '<b>Bairro</b> >> Preenchimento obrigatório.',
            'city_id.required'                      => '<b>Cidade</b> >> Preenchimento obrigatório.',
            'zip_code.required'                     => '<b>CEP</b> >> Preenchimento obrigatório.',
            'zip_code.digits'                       => '<b>CEP</b> >> Inválido (8 dígitos).',
            'phone.telefone'                        => '<b>Telefone</b> >> Inválido.',
            'mobile.celular'                        => '<b>Celular</b> >> Inválido.',
            'birthday.date_format'                  => '<b>Data de Nascimento</b> >> Inválida.',
            'birthday.required'                     => '<b>Data de Nascimento</b> >> Preenchimento obrigatório.',
            'management_unit_id.required'           => '<b>Unid.Gestora</b> >> Preenchimento obrigatório.',
            'company_position_id.required'          => '<b>Cargo</b> >> Preenchimento obrigatório.',
            'company_responsibility_id.required'    => '<b>Função</b> >> Preenchimento obrigatório.',
            'date_start.required'                   => '<b>Data de Entrada</b> >> Preenchimento obrigatório.'
        ];
    }
}
