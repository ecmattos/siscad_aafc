<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialRequest;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialRequestRepositoryEloquent extends BaseRepository implements PatrimonialRequestRepository
{
	public function model()
	{
		return PatrimonialRequest::class;
	}		
	
	private $patrimonial_request;

	public function __construct(PatrimonialRequest $patrimonial_request)
	{
		$this->patrimonial_request = $patrimonial_request;
	}

    public function allPatrimonialRequests()
    {
        return $this->patrimonial_request
            ->orderBy('id', 'desc')
            ->get();
    }

    public function storePatrimonialRequest($data)
    {
        $patrimonial_request = $this->patrimonial_request->create($data);
        #$patrimonial_request->save();
    }

    public function findPatrimonialRequestById($id)
    {
        return $this->patrimonial_request->find($id);
    }

    public function lastPatrimonialRequest()
    {
        return $this->patrimonial_request
            ->latest('id')
            ->first();
    }

    public function lastPatrimonialRequestByDateLimit($limit)
    {
        return $this->patrimonial_request
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }

}