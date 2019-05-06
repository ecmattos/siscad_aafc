<?php

namespace SisCad\Repositories;

use SisCad\Entities\PaymentReason;

use Prettus\Repository\Eloquent\BaseRepository;

class PaymentReasonRepositoryEloquent extends BaseRepository implements PaymentReasonRepository
{
	public function model()
	{
		return PaymentReason::class;
	}
	
	private $payment_reason;

	public function __construct(PaymentReason $payment_reason)
	{
		$this->payment_reason = $payment_reason;
	}

	public function allPaymentReasons()
	{
		return $this->payment_reason
			->orderBy('description', 'asc')
			->get();
	}

	public function findPaymentReasonById($id)
    {
        return $this->payment_reason->find($id);
    }

    public function storePaymentReason($input)
    {
        $payment_reason = $this->payment_reason->fill($input);
        $payment_reason->save();
    }
}