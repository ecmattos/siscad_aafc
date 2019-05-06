<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class EmployeeMovement extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at',
        'date_start',
        'date_end'
    ];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'employee_id' => 'Funcionário',
        'management_unit_id' => 'Unid.Gestora', 
        'company_position_id' => 'Cargo',
        'company_responsibility_id' => 'Função',
        'company_sector_id' => 'Setor', 
        'company_sub_sector_id' => 'Sub-setor', 
        'date_start' => 'Entrada',
        'date_end' => 'Saída',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
    	'employee_id',
        'management_unit_id',
        'company_position_id',
        'company_responsibility_id',
        'company_sector_id',
        'company_sub_sector_id',
        'date_start',
        'date_end'
    ];

    public function employee()
    {
        return $this->belongsToMany('SisCad\Entities\Employee');   
    }

    public function management_unit()
    {
        return $this->belongsTo('SisCad\Entities\ManagementUnit'); 
    }

    public function company_position()
    {
        return $this->belongsTo('SisCad\Entities\CompanyPosition');   
    }

    public function company_responsibility()
    {
        return $this->belongsTo('SisCad\Entities\CompanyResponsibility');   
    }

    public function company_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySector');   
    }

    public function company_sub_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySubSector');   
    }
}