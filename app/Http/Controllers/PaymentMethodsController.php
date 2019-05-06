<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PaymentMethodRepository;

class PaymentMethodsController extends Controller
{
    private $payment_methodRepository;

    public function __construct(PaymentMethodRepository $payment_methodRepository)
    {
        $this->payment_methodRepository = $payment_methodRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $payment_methods = $this->payment_methodRepository->allPaymentMethods();
        #dd($payment_methods);
        return view('payment_methods.index', compact('payment_methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('payment_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PaymentMethodRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $payment_method = $this->payment_methodRepository->storePaymentMethod($input);

        return redirect('payment_methods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $payment_method = $this->payment_methodRepository->findPaymentMethodById($id);
        $logs = $payment_method->revisionHistory;

        return view('payment_methods.show', compact('payment_method', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $payment_method = $this->payment_methodRepository->findPaymentMethodById($id);
        
        return view('payment_methods.edit', compact('payment_method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PaymentMethodRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $payment_method = $this->payment_methodRepository->findPaymentMethodById($id);
        $payment_method->update($input);

        return redirect('payment_methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByPaymentMethodId($id)->count()>0)
        {
           return redirect('payment_methods')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->payment_methodRepository->findPaymentMethodById($id)->delete();

        return redirect('payment_methods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->payment_methodRepository->withTrashed()->findPaymentMethodById($id)->restore();

        return redirect('payment_methods');
    }
}
