<?php

namespace SisCad\Services;

use SisCad\Repositories\PartnerRepository;

class PartnerSectorService
{
	protected $partnerRepository;

	public function __construct(
		PartnerRepository $partnerRepository)
	{
		$this->partnerRepository = $partnerRepository;
	}

	public function destroy($id)
	{
		if($this->partnerRepository->allPartnersByPartnerSectorId($id)->count()>0)
	    {
	      	return true;
	    }
      
    	return false;
	}

}