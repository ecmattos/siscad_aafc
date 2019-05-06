<?php

namespace SisCad\Repositories;

use SisCad\Entities\State;

use Prettus\Repository\Eloquent\BaseRepository;

class StateRepositoryEloquent extends BaseRepository implements StateRepository
{
    public function model()
    {
        return State::class;
    }

	private $state;

	public function __construct(State $state)
	{
		$this->state = $state;
	}

	public function allStates()
	{
		return $this->state
			->orderBy('description', 'asc')
			->get();
	}

	public function findStateById($id)
    {
        return $this->state->find($id);
    }

    public function storeState($input)
    {
        $state = $this->state->fill($input);
        $state->save();
    }
}