<?php

namespace SisCad\Repositories;

use SisCad\Entities\Plan;

use Prettus\Repository\Eloquent\BaseRepository;

class PlanRepositoryEloquent extends BaseRepository implements PlanRepository
{
	public function model()
	{
		return Plan::class;
	}
	
	private $plan;

	public function __construct(Plan $plan)
	{
		$this->plan = $plan;
	}

	public function allPlans()
	{
		return $this->plan
			->orderBy('description', 'asc')
			->get();
	}

	public function findPlanById($id)
    {
        return $this->plan->find($id);
    }

    public function storePlan($input)
    {
        $plan = $this->plan->fill($input);
        $plan->save();
    }
}