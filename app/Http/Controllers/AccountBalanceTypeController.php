<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\AccountTypeRepository;

class AccountTypesController extends Controller
{
    private $account_typeRepository;

    public function __construct(AccountTypeRepository $account_typeRepository)
    {
        $this->account_typeRepository = $account_typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $account_types = $this->account_typeRepository->allAccountTypes();
        #dd($account_types);
        return view('account_types.index', compact('account_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('account_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\AccountTypeRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $account_type = $this->account_typeRepository->storeAccountType($input);

        return redirect('account_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $account_type = $this->account_typeRepository->findAccountTypeById($id);
        $logs = $account_type->revisionHistory;

        return view('account_types.show', compact('account_type', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $account_type = $this->account_typeRepository->findAccountTypeById($id);
        
        return view('account_types.edit', compact('account_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\AccountTypeRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $account_type = $this->account_typeRepository->findAccountTypeById($id);
        $account_type->update($input);

        return redirect('account_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByAccountTypeId($id)->count()>0)
        {
           return redirect('account_types')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->account_typeRepository->findAccountTypeById($id)->delete();

        return redirect('account_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->account_typeRepository->withTrashed()->findAccountTypeById($id)->restore();

        return redirect('account_types');
    }
}
