<?php

namespace SisCad\Repositories;

use SisCad\Entities\BalanceSheet;
use SisCad\Entities\AccountingAccount;

use Prettus\Repository\Eloquent\BaseRepository;

class BalanceSheetRepositoryEloquent extends BaseRepository implements BalanceSheetRepository
{
	public function model()
	{
		return BalanceSheet::class;
	}
	
	private $balance_sheet;
	private $accounting_account;

	public function __construct(BalanceSheet $balance_sheet, AccountingAccount $accounting_account)
	{
		$this->balance_sheet = $balance_sheet;
		$this->accounting_account = $accounting_account;

	}

	public function allBalanceSheets()
	{
		return $this->balance_sheet
			->orderBy('description', 'asc')
			->get();
	}

	public function findBalanceSheetById($id)
    {
        return $this->balance_sheet->find($id);
    }

    public function findBalanceSheetByManagementUnitIdAccountId($management_unit_id, $accounting_account_id)
    {
        return $this->balance_sheet
			->whereManagementUnitId($management_unit_id)
			->whereAccountingAccountId($accounting_account_id)
			->get();
    }

    public function findBalanceSheetByUserIdManagementUnitIdAccountId($user_id, $management_unit_id, $accounting_account_id)
    {
        return $this->balance_sheet
			->whereUserId($user_id)
			->whereManagementUnitId($management_unit_id)
			->whereAccountingAccountId($accounting_account_id)
			->get();
    }

    public function storeBalanceSheet($input)
    {
        $balance_sheet = $this->balance_sheet->fill($input);
        $balance_sheet->save();
    }

	public function deleteBalanceSheetsByUserId($user_id)
	{
		return $this->balance_sheet
			->whereUserId($user_id)
			->delete();
	}

	public function insertBalanceSheets($user_id, $data_start, $data_end, $management_unit_id, $accounting_account_id)
	{
		return $this->balance_sheet
			->insert([
			    [
			    	'user_id' 				=> $user_id, 
			    	'date_start' 			=> $data_start,
			    	'date_end' 				=> $data_end,
			    	'management_unit_id' 	=> $management_unit_id,
			    	'accounting_account_id' => $accounting_account_id
			    ]
			]);
	}	

	public function updateBalanceSheets($user_id, $management_unit_id, $accounting_account_id, $balance_previous)
	{
		return $this->balance_sheet
			->whereUserId($user_id)
            ->whereManagementUnitId($management_unit_id)
            ->whereAccountingAccountId($accounting_account_id)
            ->update(
                [
                	'balance_previous' => $balance_previous
                ]
          	);
	}

	public function updateDebitCreditBalanceSheets($user_id, $management_unit_id, $accounting_account_id, $debit, $credit)
	{
		return $this->balance_sheet
			->whereUserId($user_id)
            ->whereManagementUnitId($management_unit_id)
            ->whereAccountingAccountId($accounting_account_id)
            ->update(
                [
                	'debit' => $debit,
                	'credit' => $credit
                ]
          	);
	}

	public function updateBalanceCurrent($user_id, $accounting_account_id, $balance_current)
	{
		return $this->balance_sheet
			->whereUserId($user_id)
			->whereAccountingAccountId($accounting_account_id)
            ->update(
                ['balance_current' => $balance_current]
          	);
	}

	public function updateCreditBalanceSheet($user_id, $management_unit_id, $accounting_account_id, $credit)
	{
		return $this->balance_sheet
			->whereUserId($user_id)
			->whereManagementUnitId($management_unit_id)
			->whereAccountingAccountId($accounting_account_id)
            ->update(
                ['credit' => $credit]
          	);
	}

	public function updateDebitBalanceSheet($user_id, $management_unit_id, $accounting_account_id, $debit)
	{
		return $this->balance_sheet
			->whereUserId($user_id)
			->whereManagementUnitId($management_unit_id)
			->whereAccountingAccountId($accounting_account_id)
            ->update(
                ['debit' => $debit]
          	);
	}

	public function findBalancePreviousByAccountingAccountId($user_id, $management_unit_id, $accounting_account_id)
	{
		return $this->balance_sheet
			->whereUserId($user_id)
            ->whereManagementUnitId($management_unit_id)
            ->whereAccountingAccountId($accounting_account_id)
            ->get();
	}

	public function showBalanceSheets($user_id)
	{
		return $this->balance_sheet
			->join('accounting_accounts','balance_sheets.accounting_account_id','=','accounting_accounts.id')
			->whereUserId($user_id)
			->orderBy('accounting_accounts.code')
            ->get();
	}
}