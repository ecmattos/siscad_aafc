<?php

namespace SisCad\Http\Requests;

use SisCad\Http\Requests\Request;

class PartnerSearchRequest extends Request
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
            'srch_partner_name' => 'required_without_all:srch_partner_region_id,srch_partner_city_id,srch_partner_type_id'
            //
        ];
    }

    public function messages()
    {
        return [
            'srch_partner_name.required_without_all' => '<b>Preenchimento MÍNIMO obrigatório</b> >> Favor informar pelo menos UM campo.'
        ];
    }
}
