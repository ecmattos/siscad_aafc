<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialRequestItem;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialRequestItemRepositoryEloquent extends BaseRepository implements PatrimonialRequestItemRepository
{
	public function model()
	{
		return PatrimonialRequestItem::class;
	}		
	
	private $patrimonial_request_item;

	public function __construct(PatrimonialRequestItem $patrimonial_request_item)
	{
		$this->patrimonial_request_item = $patrimonial_request_item;
	}

    public function storePatrimonialRequestItem($data)
    {
        #dd($data);
        $patrimonial_request_item = $this->patrimonial_request_item->fill($data);
        $patrimonial_request_item->save();
    }

    public function allItemsByPatrimonialRequestId($id)
    {
    	return $this->patrimonial_request_item
			->wherePatrimonialRequestId($id)
			->get();
    }

    public function findItemByPatrimonialRequestId($id, $patrimonial_id)
    {
    	return $this->patrimonial_request_item
			->wherePatrimonialRequestId($id)
			->wherePatrimonialId($patrimonial_id)
			->first();
    }

    public function findPatrimonialRequestItemById($id)
    {
    	return $this->patrimonial_request_item
			->withTrashed()
            ->find($id);;
    }

    public function minPatrimonialStatusDateItemsByPatrimonialRequestId($id)
    {
    	return $this->patrimonial_request_item
			->wherePatrimonialRequestId($id)
			->orderBy('from_patrimonial_status_date', 'asc')
			->first();
    }
}