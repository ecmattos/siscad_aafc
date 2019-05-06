<?php

namespace SisCad\Services;

use SisCad\Repositories\PatrimonialMovementRepository;

class ManagementUnitService
{
	protected $patrimonial_movementRepository;

	public function __construct(
		PatrimonialMovementRepository $patrimonial_movementRepository)
	{
		$this->patrimonial_movementRepository = $patrimonial_movementRepository;
	}

	public function destroy($id)
	{
		if($this->patrimonial_movementRepository->allPatrimonialMovementsByManagementUnitId($id)->count()>0)
        {
           	#dd($this->patrimonial_movementRepository->allPatrimonialMovementsByPatrimonialId($id)->count());
        	return true;
            #return redirect()->route('materials')->withInput()->withErrors(
           	#	[
           	#		'errors' => '<b>Exclusão CANCELADA</b> >> Existe(m) movimentação(ões) vinculada(s) ao registro selecionado !'
           	#	]);
        }

        #$this->management_unitRepository->findManagementUnitById($id)->delete();

        return false;

        #return redirect()->route('patrimonials.trashed', ['id' => $id]);

	}

}