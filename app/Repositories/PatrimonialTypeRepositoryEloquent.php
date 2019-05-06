<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialType;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialTypeRepositoryEloquent extends BaseRepository implements PatrimonialTypeRepository
{
	public function model()
	{
		return PatrimonialType::class;
	}
	
	private $patrimonial_type;

	public function __construct(PatrimonialType $patrimonial_type)
	{
		$this->patrimonial_type = $patrimonial_type;
	}

	public function allPatrimonialTypes()
	{
		return $this->patrimonial_type
			->orderBy('description', 'asc')
			->get();
	}

	public function findPatrimonialTypeById($id)
    {
        return $this->patrimonial_type
        	->withTrashed()
        	->find($id);
    }

    public function storePatrimonialType($input)
    {
        $patrimonial_type = $this->patrimonial_type->fill($input);
        $patrimonial_type->save();
    }
}