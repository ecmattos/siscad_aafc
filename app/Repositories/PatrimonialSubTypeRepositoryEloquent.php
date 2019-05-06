<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialSubType;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialSubTypeRepositoryEloquent extends BaseRepository implements PatrimonialSubTypeRepository
{
	public function model()
	{
		return PatrimonialSubType::class;
	}
	
	private $patrimonial_sub_type;

	public function __construct(PatrimonialSubType $patrimonial_sub_type)
	{
		$this->patrimonial_sub_type = $patrimonial_sub_type;
	}

	public function allPatrimonialSubTypes()
	{
		return $this->patrimonial_sub_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialSubTypeById($id)
    {
        return $this->patrimonial_sub_type
        	->withTrashed()
        	->find($id);
    }

    public function storePatrimonialSubType($input)
    {
        $patrimonial_sub_type = $this->patrimonial_sub_type->fill($input);
        $patrimonial_sub_type->save();
    }
}