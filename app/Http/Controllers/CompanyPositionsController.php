<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\CompanyPositionRepository;

use SisCad\Services\CompanyPositionService;

use Session;

class CompanyPositionsController extends Controller
{
    private $company_positionRepository;
    private $company_positionService;

    public function __construct(
            CompanyPositionRepository $company_positionRepository,
            CompanyPositionService $company_positionService
        )
    {
        $this->company_positionRepository = $company_positionRepository;
        $this->company_positionService = $company_positionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('company_positions-index');

        $company_positions = $this->company_positionRepository->allCompanyPositions();
        #dd($company_positions);
        return view('company_positions.index', compact('company_positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('company_positions-create');

        return view('company_positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CompanyPositionRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $company_position = $this->company_positionRepository->storeCompanyPosition($input);

        return redirect('company_positions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('company_positions-show');

        $company_position = $this->company_positionRepository->findCompanyPositionById($id);
        $logs = $company_position->revisionHistory;

        return view('company_positions.show', compact('company_position', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('company_positions-edit');

        $company_position = $this->company_positionRepository->findCompanyPositionById($id);
        
        return view('company_positions.edit', compact('company_position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CompanyPositionRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $company_position = $this->company_positionRepository->findCompanyPositionById($id);
        $company_position->update($input);

        return redirect()->route('company_positions.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('company_positions-destroy');

        if($this->company_positionService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Movimentação(ões) Funcional(is) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('company_positions.show', ['id' => $id]);
        }
        
        $this->company_positionRepository->findCompanyPositionById($id)->delete();

        Session::flash('flash_message_company_position_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('company_positions.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $company_position = $this->company_positionRepository->findCompanyPositionById($id);
        $company_position->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('company_positions.show', ['id' => $id]);
    }
}
