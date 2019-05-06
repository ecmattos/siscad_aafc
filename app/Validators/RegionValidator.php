<?php

namespace SisCad\Validators;

use Prettus\Validator\LaravelValidator;

class RegionValidator extends LaravelValidator
{
    protected $id;

    protected $attributes = [
        'code' => 'Código',
        'description' => 'Descrição'
    ];

    public function setId($id)
    {
        $this->id = $id;
    }

    protected $rules = [
        'code' => 'max:2|required|unique:regions,code',
        'description' => 'max:30|required|unique:regions,description' 
    ];

    protected $messages = [
        'code.max' => '<b>:attribute</b> >> MÁXIMO 2 caracteres.',
        'code.required' => '<b>:attribute</b> >> Preenchimento obrigatório.',
        'code.unique' => '<b>:attribute</b> >> Indisponível.',

        'description.max' => '<b>:attribute</b> >> MÁXIMO 30 caracteres.',
        'description.required' => '<b>:attribute</b> >> Preenchimento obrigatório.',
        'description.unique' => '<b>:attribute</b> >> Indisponível.'
    ];
}
