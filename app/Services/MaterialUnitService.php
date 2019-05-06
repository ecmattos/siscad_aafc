<?php

namespace SisCad\Services;

use SisCad\Repositories\MaterialRepository;

class MaterialUnitService
{
	protected $materialRepository;

	public function __construct(
		MaterialRepository $materialRepository)
	{
		$this->materialRepository = $materialRepository;
	}

	public function destroy($id)
	{
		if($this->materialRepository->allMaterialsByMaterialUnitId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

}