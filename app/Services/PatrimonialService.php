<?php

namespace SisCad\Services;

use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\PatrimonialSubTypeRepository;
use SisCad\Repositories\PatrimonialBrandRepository;
use SisCad\Repositories\PatrimonialModelRepository;
use SisCad\Repositories\PatrimonialMovementRepository;


class PatrimonialService
{
	protected $patrimonialRepository;
	protected $patrimonial_sub_typeRepository;
	protected $patrimonial_brandRepository;
	protected $patrimonial_modelRepository;
	protected $patrimonial_movementRepository;

	public function __construct(
			PatrimonialRepository $patrimonialRepository, 
			PatrimonialSubTypeRepository $patrimonial_sub_typeRepository, 
			PatrimonialBrandRepository $patrimonial_brandRepository, 
			PatrimonialModelRepository $patrimonial_modelRepository,
			PatrimonialMovementRepository $patrimonial_movementRepository)
	{
		$this->patrimonialRepository = $patrimonialRepository;
		$this->patrimonial_sub_typeRepository = $patrimonial_sub_typeRepository;
		$this->patrimonial_brandRepository = $patrimonial_brandRepository;
		$this->patrimonial_modelRepository = $patrimonial_modelRepository;
		$this->patrimonial_movementRepository = $patrimonial_movementRepository;
	}

	public function destroy($id)
	{
		if($this->patrimonial_movementRepository->allPatrimonialMovementsByPatrimonialId($id)->count()>1)
        {
           	#dd($this->patrimonial_movementRepository->allPatrimonialMovementsByPatrimonialId($id)->count());
        	return true;
            #return redirect()->route('materials')->withInput()->withErrors(
           	#	[
           	#		'errors' => '<b>Exclusão CANCELADA</b> >> Existe(m) movimentação(ões) vinculada(s) ao registro selecionado !'
           	#	]);
        }

        $this->patrimonialRepository->findPatrimonialById($id)->delete();

        return false;

        #return redirect()->route('patrimonials.trashed', ['id' => $id]);

	}

	public function model_update($id)
	{
		$patrimonials = $this->patrimonialRepository->allPatrimonialsByPatrimonialModelId($id);

		foreach ($patrimonials as $patrimonial)
		{
			$patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($patrimonial->patrimonial_sub_type_id);
        	$patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($patrimonial->patrimonial_brand_id);
        	$patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($patrimonial->patrimonial_model_id);

       		$patrimonial_description = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$patrimonial->serial;	

       		#dd($patrimonial_description);
       		$patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial->id);
       		$patrimonial->update(array('description' => $patrimonial_description));
		}
	}

	public function brand_update($id)
	{
		$patrimonials = $this->patrimonialRepository->allPatrimonialsByPatrimonialBrandId($id);

		foreach ($patrimonials as $patrimonial)
		{
			$patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($patrimonial->patrimonial_sub_type_id);
        	$patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($patrimonial->patrimonial_brand_id);
        	$patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($patrimonial->patrimonial_model_id);

       		$patrimonial_description = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$patrimonial->serial;	

       		#dd($patrimonial_description);
       		$patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial->id);
       		$patrimonial->update(array('description' => $patrimonial_description));
		}
	}	

	public function sub_type_update($id)
	{
		$patrimonials = $this->patrimonialRepository->allPatrimonialsByPatrimonialSubTypeId($id);

		foreach ($patrimonials as $patrimonial)
		{
			$patrimonial_sub_type = $this->patrimonial_sub_typeRepository->findPatrimonialSubTypeById($patrimonial->patrimonial_sub_type_id);
        	$patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($patrimonial->patrimonial_brand_id);
        	$patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($patrimonial->patrimonial_model_id);

       		$patrimonial_description = $patrimonial_sub_type->description." ".$patrimonial_model->description." ".$patrimonial_brand->description." ".$patrimonial->serial;	

       		#dd($patrimonial_description);
       		$patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial->id);
       		$patrimonial->update(array('description' => $patrimonial_description));
		}
	}
}