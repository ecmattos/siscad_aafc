<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\CompanyResponsibilityRepository;

use SisCad\Services\CompanyResponsibilityService;

use Session;

class CompanyResponsibilitiesController extends Controller
{
    private $company_responsibilityRepository;
    private $company_responsibilityService;

    public function __construct(
            CompanyResponsibilityRepository $company_responsibilityRepository,
            CompanyResponsibilityService $company_responsibilityService)
    {
        $this->company_responsibilityRepository = $company_responsibilityRepository;
        $this->company_responsibilityService = $company_responsibilityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('company_responsibilities-index');

        $company_responsibilities = $this->company_responsibilityRepository->allCompanyResponsibilities();
        #dd($company_responsibilities);
        return view('company_responsibilities.index', compact('company_responsibilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('company_responsibilities-create');

        return view('company_responsibilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CompanyResponsibilityRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $company_responsibility = $this->company_responsibilityRepository->storeCompanyResponsibility($input);

        return redirect('company_responsibilities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('company_responsibilities-show');

        $company_responsibility = $this->company_responsibilityRepository->findCompanyResponsibilityById($id);
        $logs = $company_responsibility->revisionHistory;

        return view('company_responsibilities.show', compact('company_responsibility', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('company_responsibilities-edit');

        $company_responsibility = $this->company_responsibilityRepository->findCompanyResponsibilityById($id);
        
        return view('company_responsibilities.edit', compact('company_responsibility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CompanyResponsibilityRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $company_responsibility = $this->company_responsibilityRepository->findCompanyResponsibilityById($id);
        $company_responsibility->update($input);

        return redirect()->route('company_responsibilities.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('company_responsibilities-destroy');

        if($this->company_responsibilityService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Movimentação(ões) Funcional(is) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('company_responsibilities.show', ['id' => $id]);
        }
        
        $this->company_responsibilityRepository->findCompanyResponsibilityById($id)->delete();

        Session::flash('flash_message_company_responsibility_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('company_responsibilities.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $company_responsibility = $this->company_responsibilityRepository->findCompanyResponsibilityById($id);
        $company_responsibility->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('company_responsibilities.show', ['id' => $id]);
    }
}
