<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialService;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialServiceRepositoryEloquent extends BaseRepository implements PatrimonialServiceRepository
{
	public function model()
	{
		return PatrimonialService::class;
	}
	
	private $patrimonial_service;

	public function __construct(PatrimonialService $patrimonial_service)
	{
		$this->patrimonial_service = $patrimonial_service;
	}

	public function allPatrimonialServices()
	{
		return $this->patrimonial_service
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialServiceById($id)
    {
        return $this->patrimonial_service->find($id);
    }

    public function allPatrimonialServicesByProviderId($id)
	{
		return $this->patrimonial_service
			->whereProviderId($id)
			->get();
	}

    public function totalServicesByPatrimonialIdInterventionTypeIdBefore($id, $patrimonial_intervention_type_id, $depreciation_date_start)
    {
        return $this->patrimonial_service
			->wherePatrimonialId($id)
			->wherePatrimonialInterventionTypeId($patrimonial_intervention_type_id)
			->where('intervention_date','<=', $depreciation_date_start)
			->sum('purchase_value');
    }

    public function totalServicesByPatrimonialIdInterventionTypeIdAfter($id, $patrimonial_intervention_type_id, $depreciation_date_start)
    {
        return $this->patrimonial_service
			->wherePatrimonialId($id)
			->wherePatrimonialInterventionTypeId($patrimonial_intervention_type_id)
			->where('intervention_date','>', $depreciation_date_start)
			->sum('purchase_value');
    }

    public function allPatrimonialServicesByPatrimonialId($id)
    {
        return $this->patrimonial_service
			->wherePatrimonialId($id)
			->orderBy('invoice_date', 'DESC')
			->get();
    }

    public function allPatrimonialServicesByServiceId($id)
    {
        return $this->patrimonial_service
			->whereServiceId($id)
			->get();
    }

    public function totalServicesByPatrimonialId($id)
    {
        return $this->patrimonial_service
			->wherePatrimonialId($id)
			->sum('purchase_value');
    }

    public function storePatrimonialService($input)
    {
        $patrimonial_service = $this->patrimonial_service->fill($input);
        $patrimonial_service->save();
    }
}