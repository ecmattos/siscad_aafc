<?php

namespace SisCad\Services;

use SisCad\Repositories\CityRepository;

class RegionService
{
	protected $cityRepository;

	public function __construct(
		CityRepository $cityRepository)
	{
		$this->cityRepository = $cityRepository;
	}

	public function destroy($id)
	{
		if($this->cityRepository->allCitiesByRegionId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

}