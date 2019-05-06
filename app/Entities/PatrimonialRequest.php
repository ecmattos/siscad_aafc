<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use Carbon\Carbon;
use DB;

class PatrimonialRequest extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'to_patrimonial_status_date',
        'deleted_at'
    ];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [
        'to_patrimonial_status_date'
    ];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
    	'from_employee_id' => 'Responsável Origem',
    	'to_management_unit_id' => 'Unid.Gestora Destino',
    	'to_company_sector_id' => 'Setor Destino',
    	'to_company_sub_sector_id' => 'Sub-setor Destino',
    	'to_employee_id' => 'Responsável Destino',
        'to_patrimonial_status_id' => 'Situação Destino',
    	'to_patrimonial_status_date' => 'Data Situação Destino',
    	'patrimonial_request_status_id' => 'Situação',
    	'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->id;
    }

    protected $fillable = [
    	'from_employee_id',
    	'to_management_unit_id',
    	'to_company_sector_id',
    	'to_company_sub_sector_id',
    	'to_employee_id',
    	'to_patrimonial_status_id',
    	'to_patrimonial_status_date',
    	'patrimonial_request_status_id',
        'comments',
        'deleted_at'
    ];

    
    public function from_employee()
    {
        return $this->belongsTo('SisCad\Entities\Employee'); 
    }

    public function to_patrimonial_status()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialStatus'); 
    }

    public function to_management_unit()
    {
        return $this->belongsTo('SisCad\Entities\ManagementUnit'); 
    }

    public function to_company_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySector'); 
    }

    public function to_company_sub_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySubSector'); 
    }

    public function to_employee()
    {
        return $this->belongsTo('SisCad\Entities\Employee'); 
    }
    
    public function patrimonial_request_items()
    {
        return $this->hasMany('SisCad\Entities\PatrimonialRequestItem'); 
    }

    public function patrimonial_request_status()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialRequestStatus');  
    }   
}
