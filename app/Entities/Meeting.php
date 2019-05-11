<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;

use SisCad\Entities\Member;
use SisCad\Entities\Employee;
use SisCad\Entities\Partner;

class Meeting extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'date'
    ];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'date' => 'Data',
        'description' => 'CPF',
        'meeting_type_id' => 'Tipo de Evento',
        'meeting_status_id' => 'Situação de Evento',
        'city_id' => 'Cidade',
        'expenses_members_food' => 'Despesas Alimentação de Sócios',
        'expenses_members_accommodation' => 'Despesas Hospedagem de Sócios',
        'expenses_members_transport' => 'Despesas Transporte de Sócios',
        'expenses_partners_food' => 'Despesas Alimentação de Parceiros',
        'expenses_partners_accommodation' => 'Despesas Hospedagem de Parceiros',
        'expenses_partners_transport' => 'Despesas Transporte de Parceiros',
        'expenses_employees_food' => 'Despesas Alimentação de Funcionários',
        'expenses_employees_accommodation' => 'Despesas Hospedagem de Funcionários',
        'expenses_employees_transport' => 'Despesas Transporte de Funcionários',
        'deleted_at' => 'Excluído'
    ];
    
    protected $revisionFormattedFields = [
        'date' => 'datetime:d/m/Y'
    ];

    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    protected $fillable = [
        'date',
        'description',
        'meeting_type_id',
        'meeting_status_id',
        'city_id',
        'expenses_members_food',
        'expenses_members_accommodation',
        'expenses_members_transport',
        'expenses_partners_food',
        'expenses_partners_accommodation',
        'expenses_partners_transport',
        'expenses_employees_food',
        'expenses_employees_accommodation',
        'expenses_employees_transport'
    ];

    public function meeting_type()
    {
        return $this->belongsTo('SisCad\Entities\MeetingType');   
    }

    public function city()
    {
        return $this->belongsTo('SisCad\Entities\City');   
    }

    #public function members()
    #{
    #    return $this->belongsToMany('SisCad\Entities\Member', 'meeting_members', 'meeting_id', 'member_id'); 
    #}

    #public function employees()
    #{
    #    return $this->belongsToMany('SisCad\Entities\Employee', 'meeting_employees', 'meeting_id', 'employee_id'); 
    #}

    #public function partners()
    #{
    #    return $this->belongsToMany('SisCad\Entities\Partner', 'meeting_partners', 'meeting_id', 'partner_id'); 
    #}

    public function members()
    {
        return $this->belongsToMany(Member::class); 
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class); 
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class); 
    }

    public function meeting_status()
    {
        return $this->belongsTo('SisCad\Entities\MeetingStatus'); 
    }
}
