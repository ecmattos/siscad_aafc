<?php

namespace SisCad\Repositories;

use SisCad\Entities\City;

use Prettus\Repository\Eloquent\BaseRepository;

class CityRepositoryEloquent extends BaseRepository implements CityRepository
{
    public function model()
    {
        return City::class;
    }

	private $city;

	public function __construct(City $city)
	{
		$this->city = $city;
	}

	public function allCities()
	{
		return $this->city
			->orderBy('description', 'asc')
			->get();
	}

	public function findCityById($id)
    {
        return $this->city->find($id);
    }

    public function storeCity($input)
    {
        $city = $this->city->fill($input);
        $city->save();
    }

    public function allCitiesByStateId($id)
    {
        return $this->city
            ->whereStateId($id)
            ->orderBy('description', 'asc')
            ->get();
    }

    public function allCitiesByRegionId($id)
    {
        return $this->city
            ->whereRegionId($id)
            ->orderBy('description', 'asc')
            ->get();
    }
}