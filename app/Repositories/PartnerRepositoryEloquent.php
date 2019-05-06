<?php

namespace SisCad\Repositories;

use SisCad\Entities\Partner;
use Prettus\Repository\Eloquent\BaseRepository;

class PartnerRepositoryEloquent extends BaseRepository implements PartnerRepository 
{
	
	public function model()
	{
		return Partner::class;
	}
		
	private $partner;

	public function __construct(Partner $partner)
	{
		$this->partner = $partner;
	}

	public function allPartners()
	{
		return $this->partner
			->get();
	}

	public function allPartnersById()
	{
		return $this->partner
			->orderBy('id', 'asc')
			->get();
	}

	public function allPartnersByPartnerTypeId($id)
	{
		return $this->partner
			->wherePartnerTypeId($id)
			->get();
	}

	public function allPartnersByPartnerSectorId($id)
	{
		return $this->partner
			->wherePartnerSectorId($id)
			->get();
	}

	public function allPartnersEmailByType($id)
	{
		return $this->partner
			->wherePartnerTypeId($id)
			->where('email', '<>', ' ')
			->get();
	}

	public function findPartnerById($id)
    {
        return $this->partner
        	->withTrashed()
        	->find($id);
    }

    public function allPartnersByCityId($id)
    {
        return $this->partner
            ->whereCityId($id)
            ->get();
    }

    public function storePartner($input)
    {
        $partner = $this->partner->fill($input);
        $partner->save();
    }

    public function searchPartners()
	{
		$srch_partner_name 		= session()->has('srch_partner_name') ? session()->get('srch_partner_name') : null;
		$srch_partner_region_id = session()->has('srch_partner_region_id') ? session()->get('srch_partner_region_id') : null;
		$srch_partner_city_id 	= session()->has('srch_partner_city_id') ? session()->get('srch_partner_city_id') : null;
		$srch_partner_type_id 	= session()->has('srch_partner_type_id') ? session()->get('srch_partner_type_id') : null;

		#dd($srch_partner_name);		

		return $this->partner
			->select('partners.*')
			->join('cities','partners.city_id','=','cities.id')
			->where(function($query) use ($srch_partner_name, $srch_partner_region_id, $srch_partner_city_id, $srch_partner_type_id) 
			{
				if($srch_partner_name)
				{
					$srch_partner_name_terms = explode(" ",$srch_partner_name);

					$srch_partner_name_terms_total = count($srch_partner_name_terms);

                    for($i=0 ; $i < $srch_partner_name_terms_total ; $i++ )
                    {
    					$query->where('name','LIKE','%'.$srch_partner_name_terms[$i].'%');
					}
				}
				
				if($srch_partner_region_id)
				{		
					$query->where('cities.region_id','=',$srch_partner_region_id);
				}
				
				if($srch_partner_city_id)
				{
					$query->whereCityId($srch_partner_city_id);
				}
				
				if($srch_partner_type_id)
				{
					$query->wherePartnerTypeId($srch_partner_type_id);
				}
			})
			->orderBy('name', 'asc')
			->get();
	}
}