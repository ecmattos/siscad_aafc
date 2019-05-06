<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use Carbon\Carbon;
use DB;

class PatrimonialMaterial extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'invoice_date',
        'intervention_date',
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
    	'patrimonial_intervention_type_id' => 'Tipo Intervenção',
        'intervention_date' => 'Data',
        'patrimonial_id' => 'Patrimônio',
    	'material_id' => 'Material',
    	'provider_id' => 'Fornecedor',
    	'invoice_date' => 'Data da compra',
    	'purchase_process' => 'Processo de compra',
        'purchase_value' => 'Valor da compra',
        'purchase_qty' => 'Qte',
        'invoice' => 'Nota Fiscal',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'NULL';
    protected $revisionUnknownString = '(vazio)';

    public function identifiableCode() 
    {
        return $this->code;
    }

    protected $fillable = [
    	'patrimonial_intervention_type_id',
        'intervention_date',
        'patrimonial_id',
    	'material_id',
    	'provider_id',
    	'invoice_date',
    	'purchase_process',
        'purchase_value',
        'purchase_qty',
        'invoice'
    ];

    
    public function setInterventionDateAttribute($value)
    {
        return $this->attributes['intervention_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setInvoiceDateAttribute($value)
    {
        return $this->attributes['invoice_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function patrimonial()
    {
        return $this->belongsTo('SisCad\Entities\Patrimonial'); 
    }

    public function material()
    {
        return $this->belongsTo('SisCad\Entities\Material'); 
    }

    public function provider()
    {
        return $this->belongsTo('SisCad\Entities\Provider'); 
    }

    public function patrimonial_intervention_type()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialInterventionType'); 
    }
}