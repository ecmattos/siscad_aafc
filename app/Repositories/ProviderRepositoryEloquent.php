<?php

namespace SisCad\Repositories;

use SisCad\Entities\Provider;

use Prettus\Repository\Eloquent\BaseRepository;

class ProviderRepositoryEloquent extends BaseRepository implements ProviderRepository
{
	public function model()
	{
		return Provider::class;
	}

	private $provider;

	public function __construct(Provider $provider)
	{
		$this->provider = $provider;
	}

	public function allProviders()
	{
		return $this->provider
			->orderBy('description', 'asc')
			->get();
	}

	public function findProviderById($id)
    {
        return $this->provider
        	->withTrashed()
        	->find($id);
    }

    public function allProvidersByCityId($id)
    {
        return $this->provider
        	->whereCityId($id)
        	->get();
    }


    public function storeProvider($input)
    {
        $provider = $this->provider->fill($input);
        $provider->save();
    }
}