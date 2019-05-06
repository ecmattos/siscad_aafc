<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PaymentStatusRepository;

class PaymentStatusesController extends Controller
{
    private $payment_statusRepository;

    public function __construct(PaymentStatusRepository $payment_statusRepository)
    {
        $this->payment_statusRepository = $payment_statusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $payment_statuses = $this->payment_statusRepository->allPaymentStatuses();
        #dd($payment_statuses);
        return view('payment_statuses.index', compact('payment_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('payment_statuses-create');

        return view('payment_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PaymentStatusRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $payment_status = $this->payment_statusRepository->storePaymentStatus($input);

        return redirect('payment_statuses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('payment_statuses-show');

        $payment_status = $this->payment_statusRepository->findPaymentStatusById($id);
        $logs = $payment_status->revisionHistory;

        return view('payment_statuses.show', compact('payment_status', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('payment_statuses-edit');

        $payment_status = $this->payment_statusRepository->findPaymentStatusById($id);
        
        return view('payment_statuses.edit', compact('payment_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PaymentStatusRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $payment_status = $this->payment_statusRepository->findPaymentStatusById($id);
        $payment_status->update($input);

        return redirect('payment_statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('payment_statuses-destroy');

        if($this->memberRepository->findMembersByPaymentStatusId($id)->count()>0)
        {
           return redirect('payment_statuses')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->payment_statusRepository->findPaymentStatusById($id)->delete();

        return redirect('payment_statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->payment_statusRepository->withTrashed()->findPaymentStatusById($id)->restore();

        return redirect('payment_statuses');
    }
}
