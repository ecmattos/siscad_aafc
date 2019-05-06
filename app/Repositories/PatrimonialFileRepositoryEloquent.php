<?php

namespace SisCad\Repositories;

use SisCad\Entities\PatrimonialFile;

use Prettus\Repository\Eloquent\BaseRepository;

class PatrimonialFileRepositoryEloquent extends BaseRepository implements PatrimonialFileRepository
{
	public function model()
	{
		return PatrimonialFile::class;
	}
		
	private $patrimonial_file;

	public function __construct(PatrimonialFile $patrimonial_file)
	{
		$this->patrimonial_file = $patrimonial_file;
	}

	public function allFilesByPatrimonialId($id)
	{
		return $this->patrimonial_file
			->wherePatrimonialId($id)
			->get();
	}

	public function checkFileByPatrimonialId($id, $file_id)
	{
		return $this->patrimonial_file
			->whereId($file_id)
			->wherePatrimonialId($id)
			->first();
	}

	public function patrimonialFileById($id)
	{
		return $this->patrimonial_file
			->whereId($id)
			->first();
	}

    public function storePatrimonialFile($data)
    {
        #dd($data['patrimonial_id']);
        #dd($data['extension']);
        $patrimonial_file = $this->patrimonial_file->fill($data);
        $patrimonial_file->save();
    }
}