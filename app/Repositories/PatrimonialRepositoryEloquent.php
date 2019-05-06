<?php

namespace SisCad\Repositories;

use SisCad\Entities\Patrimonial;
use SisCad\Entities\PatrimonialMovement;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialRepositoryEloquent extends BaseRepository implements PatrimonialRepository
{
    public function model()
    {
        return Patrimonial::class;
    }

	private $patrimonial;
    private $patrimonial_movement;

	public function __construct(Patrimonial $patrimonial, PatrimonialMovement $patrimonial_movement)
	{
		$this->patrimonial = $patrimonial;
        $this->patrimonial_movement = $patrimonial_movement;
	}

	public function allPatrimonials()
	{
		return $this->patrimonial
			->orderBy('description', 'asc')
			->get();
	}

    public function allPatrimonialsById()
    {
        return $this->patrimonial
            ->orderBy('id', 'asc')
            ->get();
    }

    public function allPatrimonialsByProviderId($id)
    {
        return $this->patrimonial
            ->whereProviderId($id)
            ->get();
    }

    public function allPatrimonialsByEmployeeId($id)
    {
        return $this->patrimonial
            ->whereEmployeeId($id)
            ->whereNotIn('patrimonial_status_id', [5])
            ->get();
    }

    public function allPatrimonialsByPatrimonialTypeId($id)
    {
        return $this->patrimonial
            ->wherePatrimonialTypeId($id)
            ->get();
    }

    public function allPatrimonialsByPatrimonialSubTypeId($id)
    {
        return $this->patrimonial
            ->wherePatrimonialSubTypeId($id)
            ->get();
    }

    public function allPatrimonialsByCompanySectorId($id)
    {
        return $this->patrimonial
            ->whereCompanySectorId($id)
            ->get();
    }

    public function allPatrimonialsByCompanySubSectorId($id)
    {
        return $this->patrimonial
            ->whereCompanySubSectorId($id)
            ->get();
    }

    public function allPatrimonialsByPatrimonialBrandId($id)
    {
        return $this->patrimonial
            ->wherePatrimonialBrandId($id)
            ->get();
    }

    public function allPatrimonialsByPatrimonialModelId($id)
    {
        return $this->patrimonial
            ->wherePatrimonialModelId($id)
            ->get();
    }

	public function allPatrimonialsByManagementUnitId($management_unit_id)
    {
        return $this->patrimonial
            ->whereManagementUnitId($management_unit_id)
            ->get();
    }

    public function lastPatrimonialsByInvoiceDate($limit)
    {
        return $this->patrimonial
            ->orderBy('invoice_date', 'desc')
            ->limit($limit)
            ->get();
    }

    public function findPatrimonialById($id)
    {
        return $this->patrimonial->withTrashed()->find($id);
    }

    public function storePatrimonial($input)
    {
        $patrimonial = $this->patrimonial->fill($input);
        $patrimonial->save();
    }

    public function findPatrimonialTrashedById($id)
    {
        return $this->patrimonial->withTrashed()->find($id);
    }

    public function searchPatrimonials()
    {
        $srch_patrimonial_code                  = session()->has('srch_patrimonial_code') ? session()->get('srch_patrimonial_code') : null;
        $srch_patrimonial_description           = session()->has('srch_patrimonial_description') ? session()->get('srch_patrimonial_description') : null;
        $srch_asset_accounting_account_id       = session()->has('srch_asset_accounting_account_id') ? session()->get('srch_asset_accounting_account_id') : null;
        $srch_patrimonial_serial                = session()->has('srch_patrimonial_serial') ? session()->get('srch_patrimonial_serial') : null;
        $srch_patrimonial_type_id               = session()->has('srch_patrimonial_type_id') ? session()->get('srch_patrimonial_type_id') : null;
        $srch_patrimonial_sub_type_id           = session()->has('srch_patrimonial_sub_type_id') ? session()->get('srch_patrimonial_sub_type_id') : null;
        $srch_patrimonial_brand_id              = session()->has('srch_patrimonial_brand_id') ? session()->get('srch_patrimonial_brand_id') : null;
        $srch_patrimonial_model_id              = session()->has('srch_patrimonial_model_id') ? session()->get('srch_patrimonial_model_id') : null;
        $srch_patrimonial_provider_id           = session()->has('srch_patrimonial_provider_id') ? session()->get('srch_patrimonial_provider_id') : null;
        $srch_patrimonial_employee_id           = session()->has('srch_patrimonial_employee_id') ? session()->get('srch_patrimonial_employee_id') : null;
        $srch_patrimonial_management_unit_id    = session()->has('srch_patrimonial_management_unit_id') ? session()->get('srch_patrimonial_management_unit_id') : null;
        $srch_company_sector_id             = session()->has('srch_company_sector_id') ? session()->get('srch_company_sector_id') : null;
        $srch_company_sub_sector_id         = session()->has('srch_company_sub_sector_id') ? session()->get('srch_company_sub_sector_id') : null;
        $srch_patrimonial_status_id             = session()->has('srch_patrimonial_status_id') ? session()->get('srch_patrimonial_status_id') : null;

        $srch_patrimonial_status_date_start     = session()->has('srch_patrimonial_status_date_start') ? session()->get('srch_patrimonial_status_date_start') : null;
        $srch_patrimonial_status_date_end       = session()->has('srch_patrimonial_status_date_end') ? session()->get('srch_patrimonial_status_date_end') : null;
        $srch_patrimonial_invoice               = session()->has('srch_patrimonial_invoice') ? session()->get('srch_patrimonial_invoice') : null;
        $srch_patrimonial_invoice_date_start    = session()->has('srch_patrimonial_invoice_date_start') ? session()->get('srch_patrimonial_invoice_date_start') : null;
        $srch_patrimonial_invoice_date_end      = session()->has('srch_patrimonial_invoice_date_end') ? session()->get('srch_patrimonial_invoice_date_end') : null;

        return $this->patrimonial
            ->select(
                'patrimonials.*',
                'patrimonial_types.code AS patrimonial_type_code',
                'patrimonial_types.description AS patrimonial_type_description',
                'patrimonial_sub_types.code AS patrimonial_sub_type_code',
                'patrimonial_sub_types.description AS patrimonial_sub_type_description',
                'patrimonial_brands.code AS patrimonial_brand_code',
                'patrimonial_brands.description AS patrimonial_brand_description',
                'patrimonial_models.code AS patrimonial_model_code',
                'patrimonial_models.description AS patrimonial_model_description',
                'providers.description AS provider_description',
                'employees.name AS employee_name',
                'management_units.code AS management_unit_code',
                'management_units.description AS management_unit_description',
                'company_sectors.code AS company_sector_code',
                'company_sectors.description AS company_sector_description',
                'company_sub_sectors.code AS company_sub_sector_code',
                'company_sub_sectors.description AS company_sub_sector_description',
                'patrimonial_statuses.code AS patrimonial_status_code')
            ->join('patrimonial_types','patrimonials.patrimonial_type_id','=','patrimonial_types.id')
            ->join('patrimonial_sub_types','patrimonials.patrimonial_sub_type_id','=','patrimonial_sub_types.id')
            ->join('accounting_accounts','patrimonial_types.asset_accounting_account_id','=','accounting_accounts.id')  
            ->join('patrimonial_brands','patrimonials.patrimonial_brand_id','=','patrimonial_brands.id')
            ->join('patrimonial_models','patrimonials.patrimonial_model_id','=','patrimonial_models.id')
            ->join('providers','patrimonials.provider_id','=','providers.id')
            ->join('employees','patrimonials.employee_id','=','employees.id')
            ->join('management_units','patrimonials.management_unit_id','=','management_units.id')
            ->join('company_sectors','patrimonials.company_sector_id','=','company_sectors.id')
            ->join('company_sub_sectors','patrimonials.company_sub_sector_id','=','company_sub_sectors.id')
            ->join('patrimonial_statuses','patrimonials.patrimonial_status_id','=','patrimonial_statuses.id')
            
            ->where(function($query) use ($srch_patrimonial_code, $srch_patrimonial_description, $srch_asset_accounting_account_id, $srch_patrimonial_serial, $srch_patrimonial_type_id, $srch_patrimonial_sub_type_id, $srch_patrimonial_brand_id, $srch_patrimonial_model_id, $srch_patrimonial_provider_id, $srch_patrimonial_employee_id, $srch_patrimonial_management_unit_id, $srch_company_sector_id, $srch_company_sub_sector_id, $srch_patrimonial_status_id, $srch_patrimonial_status_date_start, $srch_patrimonial_status_date_end, $srch_patrimonial_invoice, $srch_patrimonial_invoice_date_start, $srch_patrimonial_invoice_date_end) 
            {
                if($srch_patrimonial_description)
                {
                    $srch_patrimonial_description_terms = explode(" ",$srch_patrimonial_description);

                    $srch_patrimonial_description_terms_total = count($srch_patrimonial_description_terms);

                    for($i=0 ; $i < $srch_patrimonial_description_terms_total ; $i++ )
                    {
                        $query->where('patrimonials.description','LIKE','%'.$srch_patrimonial_description_terms[$i].'%');
                    }
                }

                if($srch_patrimonial_code)
                {
                    $query->where('patrimonials.code', 'LIKE', '%'.$srch_patrimonial_code.'%');
                    #$query->orwhere('patrimonials.code_old', 'LIKE', '%'.$srch_patrimonial_code.'%');
                }

                if($srch_asset_accounting_account_id)
                {
                    $query->where('patrimonial_types.asset_accounting_account_id', '=', $srch_asset_accounting_account_id);
                } 

                if($srch_patrimonial_serial)
                {
                    $query->whereSerial($srch_patrimonial_serial);
                }

                if($srch_patrimonial_type_id)
                {
                    $query->wherePatrimonialTypeId($srch_patrimonial_type_id);
                } 

                if($srch_patrimonial_sub_type_id)
                {
                    $query->wherePatrimonialSubTypeId($srch_patrimonial_sub_type_id);
                }

                if($srch_patrimonial_brand_id)
                {
                    $query->wherePatrimonialBrandId($srch_patrimonial_brand_id);
                }

                if($srch_patrimonial_model_id)
                {
                    $query->wherePatrimonialModelId($srch_patrimonial_model_id);
                }

                if($srch_patrimonial_provider_id)
                {
                    $query->whereProviderId($srch_patrimonial_provider_id);
                }

                if($srch_patrimonial_employee_id)
                {
                    $query->whereEmployeeId($srch_patrimonial_employee_id);
                }

                if($srch_patrimonial_management_unit_id)
                {
                   $query->where('patrimonials.management_unit_id','=',$srch_patrimonial_management_unit_id);
                }

                if($srch_company_sector_id)
                {
                    $query->where('patrimonials.company_sector_id','=',$srch_company_sector_id);
                }

                if($srch_company_sub_sector_id)
                {
                    $query->where('patrimonials.company_sub_sector_id','=',$srch_company_sub_sector_id);
                }

                if($srch_patrimonial_status_id)
                {
                    $query->wherePatrimonialStatusId($srch_patrimonial_status_id);
                }

                if($srch_patrimonial_invoice)
                {
                    $query->whereInvoice($srch_patrimonial_invoice);
                }

                if($srch_patrimonial_invoice_date_start)
                {
                    $srch_patrimonial_invoice_date_start   = \DateTime::createFromFormat('d/m/Y', $srch_patrimonial_invoice_date_start);
                    $srch_patrimonial_invoice_date_start   = $srch_patrimonial_invoice_date_start->format('Y-m-d');

                    $srch_patrimonial_invoice_date_end     = \DateTime::createFromFormat('d/m/Y', $srch_patrimonial_invoice_date_end);
                    $srch_patrimonial_invoice_date_end     = $srch_patrimonial_invoice_date_end->format('Y-m-d');

                    $query->where('invoice_date', '>=', $srch_patrimonial_invoice_date_start);
                    $query->where('invoice_date', '<=', $srch_patrimonial_invoice_date_end);
                }

                if($srch_patrimonial_status_date_start)
                {
                    $srch_patrimonial_status_date_start   = \DateTime::createFromFormat('d/m/Y', $srch_patrimonial_status_date_start);
                    $srch_patrimonial_status_date_start   = $srch_patrimonial_status_date_start->format('Y-m-d');

                    $srch_patrimonial_status_date_end     = \DateTime::createFromFormat('d/m/Y', $srch_patrimonial_status_date_end);
                    $srch_patrimonial_status_date_end     = $srch_patrimonial_status_date_end->format('Y-m-d');

                    $query->where('patrimonial_status_date', '>=', $srch_patrimonial_status_date_start);
                    $query->where('patrimonial_status_date', '<=', $srch_patrimonial_status_date_end);
                }
            })
            ->orderBy('description', 'asc')
            ->get();
    }

    public function UsefulLifeMonthsQty($useful_life_years)
    {
        if($useful_life_years > '0')
        {
            return $useful_life_years * 12;
        }
        else
        {
            return 0;
        }
    }

    public function DepreciationMonthlyPercentage($useful_life_years)
    {
        if($useful_life_years > '0')
        {
            return round((100 / ($useful_life_years * 12)), 2);
        }
        else
        {
            return 0;
        }
    }

    public function DepreciationMonthlyValue($purchase_value, $purchase_cost, $residual_value, $useful_life_years)
    {
        if($useful_life_years > '0')
        {
            #return round((($purchase_value + $purchase_cost - $residual_value) / ($useful_life_years * 12)), 2);
            return (($purchase_value + $purchase_cost - $residual_value) / ($useful_life_years * 12));
        }
        else
        {
            return 0;
        }
    }

    public function DepreciationAccumulatedMonthQty($useful_life_years, $depreciation_date_start, $date_end)
    {
        if($useful_life_years > '0')
        {
            
            #echo "date_end: ".$date_end."<br>";
            $date_end_Y = substr($date_end, 0, 4);
            #echo "date_end_Y: ".$date_end_Y."<br>";
            $date_end_m = substr($date_end, 5, 2) * 1;
            #echo "date_end_m: ".$date_end_m."<br>";

            #echo "depreciation_date_start: ".$depreciation_date_start."<br>";
            $depreciation_date_start_Y = substr($depreciation_date_start, 0, 4);
            #echo "depreciation_date_start_Y: ".$depreciation_date_start_Y."<br>";
            $depreciation_date_start_m = substr($depreciation_date_start, 5, 2) * 1;
            #echo "depreciation_date_start_m: ".$depreciation_date_start_m."<br>";

            $months_qty = (($date_end_Y - $depreciation_date_start_Y - 1) * 12) + (12 - $depreciation_date_start_m + $date_end_m + 1);
            #echo "months_qty: ".$months_qty."<br>";
            #$months_qty += 12 - $date_end_m + $depreciation_date_start_m + 1;
            #echo "months_qty: ".$months_qty."<br>";

            return $months_qty;
        }
        else
        {
            return 0;
        }
    }

    public function DepreciationAccumulatedValue($depreciation_date_start, $date_end, $useful_life_years, $purchase_value, $purchase_cost, $residual_value)
    {
        if($useful_life_years > '0')
        {
            if($this->DepreciationAccumulatedMonthQty($depreciation_date_start, $date_end, $useful_life_years) > $this->UsefulLifeMonthsQty($useful_life_years))
            {
                #return round($this->DepreciationMonthlyValue($purchase_value, $purchase_cost, $residual_value, $useful_life_years) * $this->UsefulLifeMonthsQty($useful_life_years), 2);
                return $this->DepreciationMonthlyValue($purchase_value, $purchase_cost, $residual_value, $useful_life_years) * $this->UsefulLifeMonthsQty($useful_life_years);
            }
            else
            {
                #return round($this->DepreciationMonthlyValue($purchase_value, $purchase_cost, $residual_value, $useful_life_years) * $this->DepreciationAccumulatedMonthQty($depreciation_date_start, $date_end, $useful_life_years), 2);
                return $this->DepreciationMonthlyValue($purchase_value, $purchase_cost, $residual_value, $useful_life_years) * $this->DepreciationAccumulatedMonthQty($depreciation_date_start, $date_end, $useful_life_years); 
            }
        }
        else
        {
            return 0;
        }
    }

    public function DepreciationAccumulatedValueByMonthsQty($purchase_value, $purchase_cost, $residual_value, $useful_life_years, $months_qty)
    {
        if($useful_life_years > '0')
        {
            return round(((($purchase_value + $purchase_cost - $residual_value) / ($useful_life_years * 12)) * $months_qty), 2);
        }
        else
        {
            return 0;
        }
    }

    public function AccountingBalance($purchase_value, $purchase_cost, $depreciation_accumulated_value, $residual_value)
    {
        return round($purchase_value + $purchase_cost - $depreciation_accumulated_value - $residual_value, 2);
        
    }
}