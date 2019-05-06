<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;

class PatrimonialRequestItem extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'from_patrimonial_status_date',
        'to_patrimonial_status_date',
        'deleted_at'
    ];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [
        'description'
    ];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
    	'patrimonial_request_id' => 'Requisição',
        'patrimonial_id' => 'Patrimônio',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'NULL';
    protected $revisionUnknownString = '(vazio)';

    public function identifiableName() 
    {
        return $this->id;
    }

    protected $fillable = [
    	'patrimonial_request_id',
        'patrimonial_id',
        'from_management_unit_id',
        'from_company_sector_id',
        'from_company_sub_sector_id',
        'from_patrimonial_status_id',
        'from_patrimonial_status_date',
        'to_patrimonial_status_date',
        'from_employee_id',
        'deleted_at'
    ];

    public function patrimonial_request()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialRequest'); 
    }

    public function patrimonial()
    {
        return $this->belongsTo('SisCad\Entities\Patrimonial'); 
    }

    public function from_management_unit()
    {
        return $this->belongsTo('SisCad\Entities\ManagementUnit'); 
    }

    public function from_company_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySector'); 
    }

    public function from_company_sub_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySubSector'); 
    }

    public function from_patrimonial_status()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialStatus'); 
    }

    public function from_employee()
    {
        return $this->belongsTo('SisCad\Entities\Employee'); 
    }
}
