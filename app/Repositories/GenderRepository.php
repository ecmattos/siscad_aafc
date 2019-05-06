<?php

namespace SisCad\Repositories;

use SisCad\Entities\Gender;

class GenderRepository
{
	private $gender;

	public function __construct(Gender $gender)
	{
		$this->gender = $gender;
	}

	public function allGenders()
	{
		return $this->gender
			->orderBy('description', 'asc')
			->get();
	}

	public function findGenderById($id)
    {
        return $this->gender->find($id);
    }

    public function storeGender($input)
    {
        $gender = $this->gender->fill($input);
        $gender->save();
    }
}