<?php

namespace SisCad\Repositories;

use SisCad\Payment;
use DB;

class PaymentRepository
{
	private $payment;

	public function __construct(Payment $payment)
	{
		$this->payment = $payment;
	}

	public function allPayments()
	{
		return DB::table('payments')
			->select(DB::raw('payments.member_id,
					members.code AS member_code,
					members.name AS member_name,
					member_statuses.code AS member_status_code,
					member_statuses.description AS member_status_description,
					cities.description AS city_description,
					states.code AS state_code,
					regions.code AS region_code,
					regions.description AS region_description,
					plans.code AS plan_code,
					plans.description AS plan_description,
					payments.payment_date,
					payments.payment_year,
					payments.payment_month,
					payments.payment_day,
					payments.payment_reason_id,
					payments.payment_method_id,
					payments.payment_status_id,
					payments.payment_value,
					SUM(payments.payment_value_01) AS payment_value_01,
					SUM(payments.payment_value_02) AS payment_value_02,
					SUM(payments.payment_value_03) AS payment_value_03,
					SUM(payments.payment_value_04) AS payment_value_04,
					SUM(payments.payment_value_05) AS payment_value_05,
					SUM(payments.payment_value_06) AS payment_value_06,
					SUM(payments.payment_value_07) AS payment_value_07,
					SUM(payments.payment_value_08) AS payment_value_08,
					SUM(payments.payment_value_09) AS payment_value_09,
					SUM(payments.payment_value_10) AS payment_value_10,
					SUM(payments.payment_value_11) AS payment_value_11,
					SUM(payments.payment_value_12) AS payment_value_12,
					payments.deleted_at'))
			->join('members', 'members.id', '=', 'payments.member_id')
			->join('cities','members.city_id','=','cities.id')
			->join('states','cities.state_id','=','states.id')
			->join('regions','cities.region_id','=','regions.id')
			->join('plans','members.plan_id','=','plans.id')
			->join('member_statuses','members.member_status_id','=','member_statuses.id')
			->where('payments.deleted_at', '=', Null)
			->groupBy('payments.member_id')
			->get();
	}

	public function findPaymentById($id)
    {
        return $this->payment->find($id);
    }

    public function findPaymentsDateReasonMethod($payment_date, $payment_reason_id, $payment_method_id)
	{
		return $this->payment
			->wherePaymentDate($payment_date)
			->wherePaymentReasonId($payment_reason_id)
			->wherePaymentMethodId($payment_method_id)
			->get();
	}

	public function qtyPaymentsDateReasonMethod($payment_date, $payment_reason_id, $payment_method_id)
	{
		return $this->payment
			->wherePaymentDate($payment_date)
			->wherePaymentReasonId($payment_reason_id)
			->wherePaymentMethodId($payment_method_id)
			->count();
	}

	public function storePayment($input)
    {
        $payment = $this->payment->create($input);
        ##dd($payment);
        #$payment->saveMany();
    }

    public function searchPayments()
	{
		
		$srch_payment_reason_id		= session()->has('srch_payment_reason_id') ? session()->get('srch_payment_reason_id') : null;
		$srch_payment_method_id		= session()->has('srch_payment_method_id') ? session()->get('srch_payment_method_id') : null;
		$srch_payment_year		 	= session()->has('srch_payment_year') ? session()->get('srch_payment_year') : null;

		return $this->payment
			->select(DB::raw('payments.member_id AS member_id,
					members.code AS member_code,
					members.name AS member_name,
					member_statuses.code AS member_status_code,
					member_statuses.description AS member_status_description,
					cities.description AS city_description,
					states.code AS state_code,
					regions.code AS region_code,
					regions.description AS region_description,
					plans.code AS plan_code,
					plans.description AS plan_description,
					payments.payment_date,
					payments.payment_year,
					payments.payment_month,
					payments.payment_day,
					payments.payment_reason_id,
					payments.payment_method_id,
					payments.payment_status_id,
					payments.payment_value,
					SUM(payments.payment_value_01) AS payment_value_01,
					SUM(payments.payment_value_02) AS payment_value_02,
					SUM(payments.payment_value_03) AS payment_value_03,
					SUM(payments.payment_value_04) AS payment_value_04,
					SUM(payments.payment_value_05) AS payment_value_05,
					SUM(payments.payment_value_06) AS payment_value_06,
					SUM(payments.payment_value_07) AS payment_value_07,
					SUM(payments.payment_value_08) AS payment_value_08,
					SUM(payments.payment_value_09) AS payment_value_09,
					SUM(payments.payment_value_10) AS payment_value_10,
					SUM(payments.payment_value_11) AS payment_value_11,
					SUM(payments.payment_value_12) AS payment_value_12,
					payments.deleted_at'))
			->join('members', 'members.id', '=', 'payments.member_id')
			->join('cities','members.city_id','=','cities.id')
			->join('states','cities.state_id','=','states.id')
			->join('regions','cities.region_id','=','regions.id')
			->join('plans','members.plan_id','=','plans.id')
			->join('member_statuses','members.member_status_id','=','member_statuses.id')
			->where('payments.deleted_at', '=', Null)
			->where(function($query) use ($srch_payment_reason_id, $srch_payment_method_id, $srch_payment_year) 
			{
				if($srch_payment_reason_id)
				{
					$query->wherePaymentReasonId($srch_payment_reason_id);
				}
				
				if($srch_payment_method_id)
				{
					$query->wherePaymentMethodId($srch_payment_method_id);
				}
				
				if($srch_payment_year)
				{					
					$query->wherePaymentYear($srch_payment_year);
				}
			})

			#->groupBy(function($query) use ($srch_payment_reason_id, $srch_payment_method_id) 
			#{
			#	if($srch_payment_reason_id)
			#	{
			#		$query->'payments.payment_reason_id';
			#	}
				
			#	if($srch_payment_method_id)
			#	{
			#		$query->'payments.payment_method_id';
			#	}
			#})

			->groupBy('payments.member_id')
			->get();

	}
}