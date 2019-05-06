<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class PatrimonialMovement extends Revisionable
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
        'patrimonial_status_id' => 'Situação',
        'employee_id' => 'Responsável',
        'date_start' => 'Data Situação', 
        'management_unit_id' => 'Unid.Gestora',
        'company_sector_id' => 'Setor',
        'company_sub_sector_id' => 'Sub Setor', 
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
    	'patrimonial_id',
    	'employee_id',
        'patrimonial_movement_type_id',
        'patrimonial_status_id',
    	'date_start',
        'date_end',
    	'management_unit_id',
    	'company_sector_id',
    	'company_sub_sector_id'
    ];

    public function patrimonial()
    {
        return $this->belongsToMany('SisCad\Entities\Patrimonial');   
    }

    public function management_unit()
    {
        return $this->belongsTo('SisCad\Entities\ManagementUnit'); 
    }

    public function patrimonial_movement_type()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialMovementType');   
    }

    public function patrimonial_status()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialStatus');   
    }

    public function company_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySector');   
    }

    public function company_sub_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySubSector');   
    }

    public function employee()
    {
        return $this->belongsTo('SisCad\Entities\Employee');   
    }
}