<?php

namespace SisCad\Services;

use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\PatrimonialMovementRepository;
use SisCad\Repositories\PatrimonialRequestItemRepository;

class PatrimonialRequestService
{
	protected $patrimonialRepository;
	protected $patrimonial_movementRepository;
	protected $patrimonial_request_itemRepository;

	public function __construct(
		PatrimonialRepository $patrimonialRepository,
		PatrimonialMovementRepository $patrimonial_movementRepository,
		PatrimonialRequestItemRepository $patrimonial_request_itemRepository)
	{
		$this->patrimonialRepository = $patrimonialRepository;
		$this->patrimonial_movementRepository = $patrimonial_movementRepository;
		$this->patrimonial_request_itemRepository = $patrimonial_request_itemRepository;
	}

	public function confirm_check($id, $date_end)
	{
		$patrimonial_request_items_min_date = $this->patrimonial_request_itemRepository->minPatrimonialStatusDateItemsByPatrimonialRequestId($id);

		//Verifica se a data da confirmacao eh maior que amenor data de situação dentre os patrimonios
		if($patrimonial_request_items_min_date->from_patrimonial_status_date->format('Y-m-d') <= $date_end)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function item_confirm_check($id, $patrimonial_id, $date_end)
	{
		//Identifica o ultimo ID de movimentação do patrimonio
        $patrimonial_movement_last = $this->patrimonial_movementRepository->lastPatrimonialMovementDateByPatrimonialId($patrimonial_id);

        //Verifica se a data da movimentacao eh maior que a data de movimentacao do ultimo lancamento
		if($date_end >= $patrimonial_movement_last->date_start->format('Y-m-d'))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}