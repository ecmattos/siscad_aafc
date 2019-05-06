<?php

namespace SisCad\Repositories;

use SisCad\Entities\PartnerType;

use Prettus\Repository\Eloquent\BaseRepository;

class PartnerTypeRepositoryEloquent extends BaseRepository implements PartnerTypeRepository
{
	public function model()
	{
		return PartnerType::class;
	}
	
	private $partner_type;

	public function __construct(PartnerType $partner_type)
	{
		$this->partner_type = $partner_type;
	}

	public function allPartnerTypes()
	{
		return $this->partner_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findPartnerTypeById($id)
    {
        return $this->partner_type
        	->withTrashed()
        	->find($id);
    }

    public function storePartnerType($input)
    {
        $partner_type = $this->partner_type->fill($input);
        $partner_type->save();
    }
}