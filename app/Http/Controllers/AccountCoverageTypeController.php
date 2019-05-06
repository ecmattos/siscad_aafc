<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\AccountCoverageTypeRepository;

class AccountCoverageTypesController extends Controller
{
    private $account_coverage_typeRepository;

    public function __construct(AccountCoverageTypeRepository $account_coverage_typeRepository)
    {
        $this->account_coverage_typeRepository = $account_coverage_typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $account_coverage_types = $this->account_coverage_typeRepository->allAccountCoverageTypes();
        #dd($account_coverage_types);
        return view('account_coverage_types.index', compact('account_coverage_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('account_coverage_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\AccountCoverageTypeRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $account_coverage_type = $this->account_coverage_typeRepository->storeAccountCoverageType($input);

        return redirect('account_coverage_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $account_coverage_type = $this->account_coverage_typeRepository->findAccountCoverageTypeById($id);
        $logs = $account_coverage_type->revisionHistory;

        return view('account_coverage_types.show', compact('account_coverage_type', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $account_coverage_type = $this->account_coverage_typeRepository->findAccountCoverageTypeById($id);
        
        return view('account_coverage_types.edit', compact('account_coverage_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\AccountCoverageTypeRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $account_coverage_type = $this->account_coverage_typeRepository->findAccountCoverageTypeById($id);
        $account_coverage_type->update($input);

        return redirect('account_coverage_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByAccountCoverageTypeId($id)->count()>0)
        {
           return redirect('account_coverage_types')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->account_coverage_typeRepository->findAccountCoverageTypeById($id)->delete();

        return redirect('account_coverage_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->account_coverage_typeRepository->withTrashed()->findAccountCoverageTypeById($id)->restore();

        return redirect('account_coverage_types');
    }
}
