<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PaymentReasonRepository;

class PaymentReasonsController extends Controller
{
    private $payment_reasonRepository;

    public function __construct(PaymentReasonRepository $payment_reasonRepository)
    {
        $this->payment_reasonRepository = $payment_reasonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $payment_reasons = $this->payment_reasonRepository->allPaymentReasons();
        #dd($payment_reasons);
        return view('payment_reasons.index', compact('payment_reasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('payment_reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PaymentReasonRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $payment_reason = $this->payment_reasonRepository->storePaymentReason($input);

        return redirect('payment_reasons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $payment_reason = $this->payment_reasonRepository->findPaymentReasonById($id);
        $logs = $payment_reason->revisionHistory;

        return view('payment_reasons.show', compact('payment_reason', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $payment_reason = $this->payment_reasonRepository->findPaymentReasonById($id);
        
        return view('payment_reasons.edit', compact('payment_reason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PaymentReasonRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $payment_reason = $this->payment_reasonRepository->findPaymentReasonById($id);
        $payment_reason->update($input);

        return redirect('payment_reasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByPaymentReasonId($id)->count()>0)
        {
           return redirect('payment_reasons')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->payment_reasonRepository->findPaymentReasonById($id)->delete();

        return redirect('payment_reasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->payment_reasonRepository->withTrashed()->findPaymentReasonById($id)->restore();

        return redirect('payment_reasons');
    }
}
