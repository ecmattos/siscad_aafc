<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class MemberRequest extends Request
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
        $member_status_id = Request::get('member_status_id');

        if ($member_status_id == "")
        {
            $validationMemberStatusId = 'required';
            $validationMemberStatusReason = '';
            $validationMemberDateAafcIni  = 'required';
            $validationMemberDateAafcFim  = '';
        }
        elseif ($member_status_id == "1")
        {
            $validationMemberStatusId = '';
            $validationMemberStatusReason = 'required|in:2,3,4,5,6,7,8,9';
            $validationMemberDateAafcIni  = 'required|date_format:d/m/Y';
            $validationMemberDateAafcFim  = 'required_if:member_status_id,1|after:date_aafc_ini|date_format:d/m/Y';
        }
        elseif ($member_status_id == "2")
        {
            $validationMemberStatusId = '';
            $validationMemberStatusReason = 'required|in:1';
            $validationMemberDateAafcIni  = 'required|date_format:d/m/Y';
            $validationMemberDateAafcFim  = '';
        }
        elseif ($member_status_id == "3")
        {
            $validationMemberStatusId = '';
            $validationMemberStatusReason = 'required|in:1';
            $validationMemberDateAafcIni  = '';
            $validationMemberDateAafcFim  = '';
        }

        $member_email = Request::get('email');

        if ($member_email == "")
        {
            $validationMemberEmail = '';
        }
        else
        {
            $validationMemberEmail = 'required|email|unique:members,email,'.$this->id.'';
        }

        $member_cpf = Request::get('cpf');

        if ($member_cpf == "")
        {
            $validationMemberCpf = '';
        }
        else
        {
            $validationMemberCpf = 'cpf_mascara|unique:members,cpf,'.$this->id.',id,deleted_at,NULL';
        }

        $member_phone = Request::get('phone');

        if ($member_phone == "")
        {
            $validationMemberPhone = '';
        }
        else
        {
            $validationMemberPhone = 'telefone';
        }

        $member_mobile = Request::get('mobile');

        if ($member_mobile == "")
        {
            $validationMemberMobile = '';
        }
        else
        {
            $validationMemberMobile = 'celular';
        }

        return [
            'code'                      => 'required|unique:members,code,'.$this->id.',id,deleted_at,NULL',
            'cpf'                       => $validationMemberCpf,
            'name'                      => 'max:100|required',
            'plan_id'                   => 'required',
            'member_status_id'          => $validationMemberStatusId,
            'gender_id'                 => 'required',
            'email'                     => $validationMemberEmail,
            'address'                   => 'required',
            'neighborhood'              => 'required',
            'city_id'                   => 'required',
            'zip_code'                  => 'required|digits:8',
            'phone'                     => $validationMemberPhone,
            'mobile'                    => $validationMemberMobile,
            'date_aafc_ini'             => $validationMemberDateAafcIni,
            'date_aafc_fim'             => $validationMemberDateAafcFim,
            'member_status_reason_id'   => $validationMemberStatusReason,
            'birthday'                  => 'required|date_format:d/m/Y'
            //
        ];
    }

    public function messages()
    {
        return [
            'code.required'                     => '<b>Matrícula</b> >> Preenchimento obrigatório.',
            'code.unique'                       => '<b>Matrícula</b> >> Indisponível.',
            'cpf.cpf_mascara'                   => '<b>CPF</b> >> Inválido.',
            'cpf.unique'                        => '<b>CPF</b> >> Indisponível.',
            'name.required'                     => '<b>Nome</b> >> Preenchimento obrigatório.',
            'plan_id.required'                  => '<b>Plano</b> >> Preenchimento obrigatório.',
            'member_status_id.required'         => '<b>Situação</b> >> Preenchimento obrigatório.',
            'gender_id.required'                => '<b>Sexo</b> >> Preenchimento obrigatório.',
            'email.required'                    => '<b>e-mail</b> >> Preenchimento obrigatório.',
            'email.unique'                      => '<b>e-mail</b> >> Indisponível.',
            'address.required'                  => '<b>Endereço</b> >> Preenchimento obrigatório.',
            'neighborhood.required'             => '<b>Bairro</b> >> Preenchimento obrigatório.',
            'city_id.required'                  => '<b>Cidade</b> >> Preenchimento obrigatório.',
            'zip_code.required'                 => '<b>CEP</b> >> Preenchimento obrigatório.',
            'zip_code.digits'                   => '<b>CEP</b> >> Inválido (8 dígitos).',
            'phone.telefone'                    => '<b>Telefone</b> >> Inválido.',
            'mobile.celular'                    => '<b>Celular</b> >> Inválido.',
            'birthday.date_format'              => '<b>Data de Nascimento</b> >> Inválida.',
            'birthday.required'                 => '<b>Data de Nascimento</b> >> Preenchimento obrigatório.',
            'date_aafc_ini.required'            => '<b>Data de Ativo</b> >> Preenchimento obrigatório.',
            'date_aafc_ini.date_format'         => '<b>Data de Ativo</b> >> Inválida.',
            'date_aafc_fim.required_if'         => '<b>Data Desligamento</b> >> Preenchimento obrigatório.',
            'date_aafc_fim.date_format'         => '<b>Data Desligamento</b> >> Inválida.',
            'member_status_reason_id.required'  => '<b>Motivo Desligamento</b> >> Preenchimento obrigatório.',
            'member_status_reason_id.in'        => '<b>Motivo Desligamento</b> >> Inválido.',
            'date_aafc_fim.after'               => '<b>Data de Ativo</b> >> Posterior a data de desligamento.'
        ];
    }
}
