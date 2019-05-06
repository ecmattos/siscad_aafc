<?php

namespace SisCad\Services;

use SisCad\Repositories\PatrimonialRepository;

class ProviderService
{
	protected $patrimonialRepository;

	public function __construct(
		PatrimonialRepository $patrimonialRepository)
	{
		$this->patrimonialRepository = $patrimonialRepository;
	}

	public function destroy($id)
	{
		if($this->patrimonialRepository->allPatrimonialsByProviderId($id)->count()>0)
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