<?php

namespace SisCad\Repositories;

use SisCad\Entities\BalanceSheetPrevious;

use Prettus\Repository\Eloquent\BaseRepository;

class BalanceSheetPreviousRepositoryEloquent extends BaseRepository implements BalanceSheetPreviousRepository
{
	public function model()
	{
		return BalanceSheetPrevious::class;
	}
	
	private $balance_sheet_previous;

	public function __construct(BalanceSheetPrevious $balance_sheet_previous)
	{
		$this->balance_sheet_previous = $balance_sheet_previous;
	}

	public function allBalanceSheetPreviousesByManagementUnitId()
	{
		return $this->balance_sheet_previous
			->whereManagementUnitId($id)
			->orderBy('description', 'asc')
			->get();
	}

	public function findBalanceSheetPreviousById($id)
    {
        return $this->balance_sheet_previous->find($id);
    }

    public function findBalanceSheetPreviousByManagementUnitIdAccountId($management_unit_id, $accounting_account_id)
    {
        return $this->balance_sheet_previous
			->whereManagementUnitId($management_unit_id)
			->whereAccountingAccountId($accounting_account_id)
			->get();
    }

	public function findBalanceSheetPreviousByManagementUnitIdAccountIdBalancePrevious($management_unit_id, $accounting_account_id, $balance_previous)
	{
		return $this->balance_sheet_previous
			->whereManagementUnitId($management_unit_id)
			->whereAccountingAccountId($accounting_account_id)
			->whereBalancePrevious($balance_previous)
			->get();
	}

    public function storeBalanceSheetPrevious($input)
    {
        $balance_sheet_previous = $this->balance_sheet_previous->fill($input);
        $balance_sheet_previous->save();
    }

    public function searchBalanceSheetPrevious()
	{
		$srch_management_unit_id	= session()->has('srch_management_unit_id') ? session()->get('srch_management_unit_id') : null;

		return $this->balance_sheet_previous
			->whereManagementUnitId($srch_management_unit_id)
			->get();
	}
}