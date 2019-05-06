<?php

namespace SisCad\Repositories;

use SisCad\Entities\PartnerSector;

use Prettus\Repository\Eloquent\BaseRepository;

class PartnerSectorRepositoryEloquent extends BaseRepository implements PartnerSectorRepository
{
	public function model()
	{
		return PartnerSector::class;
	}
		
	private $partner_sector;

	public function __construct(PartnerSector $partner_sector)
	{
		$this->partner_sector = $partner_sector;
	}

	public function allPartnerSectors()
	{
		return $this->partner_sector
			->orderBy('description', 'asc')
			->get();
	}

	public function allPartnerSectors2()
	{
		return $this->partner_sector
			->where('id', '>', 1)
			->orderBy('description', 'asc')
			->get();
	}

	public function findPartnerSectorById($id)
    {
        return $this->partner_sector
        	->withTrashed()
        	->find($id);
    }

    public function storePartnerSector($input)
    {
        $partner_sector = $this->partner_sector->fill($input);
        $partner_sector->save();
    }
}