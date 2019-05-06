<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\BankRepository;

class BanksController extends Controller
{
    private $bankRepository;

    public function __construct(BankRepository $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
       $banks = $this->bankRepository->allBanks();
       ##dd($banks);

       return view('banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        return view('banks.create', compact('states', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\BankRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $bank = $this->bankRepository->storeBank($input);
      
        return redirect('banks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $bank = $this->bankRepository->findBankById($id);
        $logs = $bank->revisionHistory;
        
        return view('banks.show', compact('bank', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $bank = $this->bankRepository->findBankById($id);
        
        return view('banks.edit', compact('bank', 'states', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\BankRequest $request, $id)
    {
        $input = $request->all();
        
        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $bank = $this->bankRepository->findBankById($id);
        $bank->update($input);

        return redirect('banks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->bankRepository->findBankById($id)->delete();

        return redirect('banks');
    }
}