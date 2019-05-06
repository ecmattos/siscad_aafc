<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class AccountingAccountRequest extends Request
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
            'code'                      => 'max:20|required|unique:accounting_accounts,code,'.$this->id.',id,deleted_at,NULL',
            'code_short'                => 'max:10|unique:accounting_accounts,code_short,'.$this->id.',id,deleted_at,NULL',
            'description'               => 'max:50|required',
            'account_type_id'           => 'required',
            'account_balance_type_id'   => 'required',
            'account_coverage_type_id'  => 'required'

            //
        ];
    }

    public function messages()
    {
        return [
            'code.max' => '<b>Código</b> >> MÁXIMO 20 caracteres.',
            'code.required' => '<b>Código</b> >> Preenchimento obrigatório.',
            'code.unique' => '<b>Código</b> >> Indisponível.',

            'code_short.max' => '<b>Código Reduzido</b> >> MÁXIMO 10 caracteres.',
            'code_short.unique' => '<b>Código Reduzido</b> >> Indisponível.',
           
            'description.max' => '<b>Descrição</b> >> MÁXIMO 50 caracteres.',
            'description.required' => '<b>Descrição</b> >> Preenchimento obrigatório.',
            
            'account_type_id.required' => '<b>Tipo</b> >> Preenchimento obrigatório.',
            'account_balance_type_id.required' => '<b>Tipo de Saldo</b> >> Preenchimento obrigatório.',
            'account_coverage_type_id.required' => '<b>Abrangência</b> >> Preenchimento obrigatório.'
        ];
    }
}
