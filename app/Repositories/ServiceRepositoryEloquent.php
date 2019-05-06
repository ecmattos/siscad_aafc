<?php

namespace SisCad\Repositories;

use SisCad\Entities\Service;

use Prettus\Repository\Eloquent\BaseRepository;

class ServiceRepositoryEloquent extends BaseRepository implements ServiceRepository
{
	public function model()
	{
		return Service::class;
	}

	private $service;

	public function __construct(Service $service)
	{
		$this->service = $service;
	}

	public function allServices()
	{
		return $this->service
			->orderBy('description', 'asc')
			->get();
	}

	public function findServiceById($id)
    {
        return $this->service->find($id);
    }

    public function storeService($input)
    {
        $service = $this->service->fill($input);
        $service->save();
    }
}