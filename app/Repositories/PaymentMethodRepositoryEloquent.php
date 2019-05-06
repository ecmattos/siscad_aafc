<?php

namespace SisCad\Repositories;

use SisCad\Entities\PaymentMethod;

use Prettus\Repository\Eloquent\BaseRepository;

class PaymentMethodRepositoryEloquent extends BaseRepository implements PaymentMethodRepository
{
	public function model()
	{
		return PaymentMethod::class;
	}

	private $payment_method;

	public function __construct(PaymentMethod $payment_method)
	{
		$this->payment_method = $payment_method;
	}

	public function allPaymentMethods()
	{
		return $this->payment_method
			->orderBy('description', 'asc')
			->get();
	}

	public function findPaymentMethodById($id)
    {
        return $this->payment_method->find($id);
    }

    public function storePaymentMethod($input)
    {
        $payment_method = $this->payment_method->fill($input);
        $payment_method->save();
    }
}