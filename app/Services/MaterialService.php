<?php

namespace SisCad\Services;

use SisCad\Repositories\PatrimonialMaterialRepository;
use SisCad\Repositories\MaterialRepository;

class MaterialService
{
	private $patrimonial_materialRepository;
	private $materialRepository;
    
    public function __construct(
    		PatrimonialMaterialRepository $patrimonial_materialRepository,
    		MaterialRepository $materialRepository
    	)
    {
        $this->patrimonial_materialRepository = $patrimonial_materialRepository;
        $this->materialRepository = $materialRepository;
    }

	public function destroy($id)
	{
		if($this->patrimonial_materialRepository->allPatrimonialMaterialsByMaterialId($id)->count()>0)
        {
           	return redirect('materials')->withInput()->withErrors(
           		[
           			'error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Patrimônio(s) vinculado(s) ao registro selecionado !'
           		]); 
        }

        $this->materialRepository->findMaterialById($id)->delete();
	}
}