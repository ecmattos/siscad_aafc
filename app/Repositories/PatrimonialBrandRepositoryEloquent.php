<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialBrand;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialBrandRepositoryEloquent extends BaseRepository implements PatrimonialBrandRepository
{
	public function model()
	{
		return PatrimonialBrand::class;
	}		
	
	private $patrimonial_brand;

	public function __construct(PatrimonialBrand $patrimonial_brand)
	{
		$this->patrimonial_brand = $patrimonial_brand;
	}

	public function allPatrimonialBrands()
	{
		return $this->patrimonial_brand
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialBrandById($id)
    {
        return $this->patrimonial_brand
        	->withTrashed()
        	->find($id);
    }

    public function storePatrimonialBrand($input)
    {
        $patrimonial_brand = $this->patrimonial_brand->fill($input);
        $patrimonial_brand->save();
    }
}