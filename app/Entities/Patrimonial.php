<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use Carbon\Carbon;
use DB;

class Patrimonial extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'patrimonial_status_date',
        'invoice_date',
        'depreciation_date_start',
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
    	'code' => 'Código',
        'description' => 'Descrição',
    	'patrimonial_type_id' => 'Tipo',
    	'patrimonial_sub_type_id' => 'Sub-tipo',
    	'patrimonial_brand_id' => 'Marca',
    	'patrimonial_model_id' => 'Modelo',
    	'patrimonial_status_id' => 'Situação',
    	'patrimonial_status_date' => 'Data Situação',
    	'provider_id' => 'Fornecedor',
    	'management_unit_id' => 'Unid.Gestora',
    	'company_sector_id' => 'Setor',
    	'company_sub_sector_id' => 'Sub-setor',
    	'employee_id' => 'Responsável',
        'serial' => 'Nr serial',
    	'invoice_date' => 'Data da compra',
    	'purchase_process' => 'Processo de compra',
        'purchase_value' => 'Valor da compra',
    	'invoice' => 'Nota Fiscal',
    	'residual_value' => 'Valor residual',
        'depreciation_date_start' => 'Data Inicio Depreciação',
    	'comments' => 'Observações', 
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableCode() 
    {
        return $this->code;
    }

    protected $fillable = [
    	'code',
        'description',
        'patrimonial_type_id',
        'patrimonial_sub_type_id',
        'patrimonial_brand_id',
        'patrimonial_model_id',
        'patrimonial_status_id',
        'patrimonial_status_date',
        'provider_id',
        'management_unit_id',
        'company_sector_id',
        'company_sub_sector_id',
        'employee_id',
        'serial',
        'invoice_date',
        'purchase_process',
        'purchase_value',
        'invoice',
        'residual_value',
        'depreciation_date_start',
        'comments', 
        'deleted_at'
    ];

    
    public function setPurchaseDateAttribute($value)
    {
        return $this->attributes['invoice_date'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function patrimonial_type()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialType'); 
    }

    public function patrimonial_sub_type()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialSubType'); 
    }

    public function patrimonial_brand()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialBrand'); 
    }

    public function patrimonial_model()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialModel'); 
    }

    public function patrimonial_status()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonialStatus'); 
    }

    public function provider()
    {
        return $this->belongsTo('SisCad\Entities\Provider'); 
    }

    public function affiliated_society()
    {
        return $this->belongsTo('SisCad\Entities\AffiliatedSociety'); 
    }

    public function management_unit()
    {
        return $this->belongsTo('SisCad\Entities\ManagementUnit'); 
    }

    public function company_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySector'); 
    }

    public function company_sub_sector()
    {
        return $this->belongsTo('SisCad\Entities\CompanySubSector'); 
    }

    public function patrimonial_files()
    {
        return $this->hasMany('SisCad\Entities\PatrimonialFile'); 
    }

    public function patrimonial_movements()
    {
        return $this->hasMany('SisCad\Entities\PatrimonialMovement'); 
    }

    public function employee()
    {
        return $this->belongsTo('SisCad\Entities\Employee'); 
    }
    
    public function patrimonial_materials()
    {
        return $this->hasMany('SisCad\Entities\PatrimonialMaterial'); 
    }

    public function patrimonial_request_items()
    {
        return $this->hasMany('SisCad\Entities\PatrimonialRequestItem'); 
    }

    public function getTotalMaterials()
    {
        $total_materials = 0;

        foreach($this->patrimonial_materials as $materials)
        {
            $total_materials += $materials['purchase_value'];
        }

        return round($total_materials, 2);
    }

    public function getTotalDepreciationMaterials()
    {
        $total_depreciation_materials = 0;

        foreach($this->patrimonial_materials as $materials)
        {
            if($materials->patrimonial_intervention_type_id == 1)
            {
                $total_depreciation_materials += $materials['purchase_value'];
            }
        }

        return round($total_depreciation_materials, 2);
    }

    public function patrimonial_services()
    {
        return $this->hasMany('SisCad\Entities\PatrimonialService'); 
    }

    public function getTotalServices()
    {
        $total_services = 0;

        foreach($this->patrimonial_services as $services)
        {
            $total_services += $services['purchase_value'];
        }

        return round($total_services, 2);
    }

    public function getTotalDepreciationServices()
    {
        $total_depreciation_services = 0;

        foreach($this->patrimonial_services as $services)
        {
            if($services->patrimonial_intervention_type_id == 1)
            {
                $total_depreciation_services += $services['purchase_value'];
            }
        }

        return round($total_depreciation_services, 2);
    }

    public function getUsefulLifeYears()
    {
        return $this->patrimonial_type->attributes['useful_life_years'];
    }

    public function getUsefulLifeMonthsQty()
    {
        if($this->getUsefulLifeYears()>0)
        {
            if(($this->patrimonial_status_id == 4) || ($this->patrimonial_status_id == 5)) //Desativado ou Baixado
            {
                $date_end = new Carbon($this->patrimonial_status_date);

                $depreciation_date_start = new Carbon($this->attributes['depreciation_date_start']);
                    
                return $depreciation_date_start->diffInMonths($date_end) + 1;
            }
            else
            {
                return ($this->getUsefulLifeYears() * 12);
            }
        }
        else
        {
            return 0;
        }
    }

    public function getDepreciationMonthlyPercentage()
    {
        if($this->getUsefulLifeYears()>0)
        {
            return (100 / ($this->getUsefulLifeYears() * 12));
        }
        else
        {
            return 0;
        }
    }

    public function getDepreciationMonthlyValue()
    {
        if($this->getUsefulLifeYears()>0)
        {
            return round((($this->attributes['purchase_value'] + $this->getTotalDepreciationMaterials() + $this->getTotalDepreciationServices() - $this->attributes['residual_value']) / $this->getUsefulLifeMonthsQty()), '2');
        }
        else
        {
            return 0;
        }
    }

    public function getDepreciationAccumulatedMonthsQty($date_end)
    {
        if($this->getUsefulLifeYears()>0)
        {
            if(is_null($date_end))
            {
                $date_end = Carbon::now();
            }
            else
            {
                $date_end = new Carbon($date_end);
            }

            if($date_end >= $this->attributes['depreciation_date_start'])
            {
                if($this->patrimonial_type->attributes['useful_life_years'] > 0)
                {
                    if(($this->patrimonial_status_id == 4) || $this->patrimonial_status_id == 5) //Desativado ou Baixado
                    {
                        if($this->patrimonial_status_date < $date_end)
                        {
                            $date_end = new Carbon($this->patrimonial_status_date);
                        }
                    }
                    
                    $depreciation_months_qty = $this->getUsefulLifeMonthsQty();

                    $depreciation_date_start = new Carbon($this->attributes['depreciation_date_start']);

                    $date_end_Y = substr($date_end, 0, 4);
                    $date_end_m = substr($date_end, 5, 2);

                    $depreciation_date_start_Y = substr($depreciation_date_start, 0, 4);
                    $depreciation_date_start_m = substr($depreciation_date_start, 5, 2);

                    $depreciation_months_to_date_qty = ($date_end_Y - $depreciation_date_start_Y - 1) * 12;
                    $depreciation_months_to_date_qty += 12 - $depreciation_date_start_m + $date_end_m + 1;

                    if($depreciation_months_qty > $depreciation_months_to_date_qty)
                    {
                        return $depreciation_months_to_date_qty;
                    }
                    else
                    {
                        return $this->getUsefulLifeMonthsQty();
                    }
                }
                else
                {
                    return 0;
                }
            }
            else
            {
                return 0; 
            }
        }
        else
        {
            return 0;
        }
    }

    public function getDepreciationAccumulatedValue($date_end)
    {
        if($this->getUsefulLifeYears()>0)
        {
            if($date_end >= $this->attributes['depreciation_date_start'])
            {
                if(($this->patrimonial_status_id == 4) || $this->patrimonial_status_id == 5) //Desativado ou Baixado
                {
                    return round((($this->attributes['purchase_value'] + $this->getTotalDepreciationMaterials() + $this->getTotalDepreciationServices() - $this->attributes['residual_value']) / ($this->getUsefulLifeYears() * 12) * $this->getDepreciationAccumulatedMonthsQty($date_end)), 2);
                }
                else
                {
                    return round((($this->attributes['purchase_value'] + $this->getTotalDepreciationMaterials() + $this->getTotalDepreciationServices() - $this->attributes['residual_value']) / ($this->getUsefulLifeMonthsQty()) * $this->getDepreciationAccumulatedMonthsQty($date_end)), 2);
                }
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }


    public function getAccountingBalanceValue($date_end)
    {
        if($this->getUsefulLifeYears()>0)
        {
            return round($this->attributes['purchase_value'] + $this->getTotalDepreciationMaterials() + $this->getTotalDepreciationServices() - $this->attributes['residual_value'] - $this->getDepreciationAccumulatedValue($date_end), 2);
        }
        else
        {
            return 0;
        }
    }
}