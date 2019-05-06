<?php

namespace SisCad\Repositories;

use SisCad\Entities\Region;

use Prettus\Repository\Eloquent\BaseRepository;

class RegionRepositoryEloquent extends BaseRepository implements RegionRepository
{
	public function model()
	{
		return Region::class;
	}

	private $region;

	public function __construct(Region $region)
	{
		$this->region = $region;
	}

	public function allRegions()
	{
		return $this->region
			->orderBy('description', 'asc')
			->get();
	}

	public function findRegionById($id)
    {
        return $this->region
        	->withTrashed()
        	->find($id);
    }

    public function store($data)
    {
        $region = $this->region->fill($data);
        $region->save();
    }
}