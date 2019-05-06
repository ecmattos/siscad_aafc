<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\CompanySectorRepository;

use SisCad\Services\CompanySectorService;

use Session;

class CompanySectorsController extends Controller
{
    private $company_sectorRepository;
    private $company_sectorService;

    public function __construct(
        CompanySectorRepository $company_sectorRepository,
        CompanySectorService $company_sectorService)
    {
        $this->company_sectorRepository = $company_sectorRepository;
        $this->company_sectorService = $company_sectorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('company_sectors-index');

        $company_sectors = $this->company_sectorRepository->allCompanySectors();
        #dd($company_sectors);
        return view('company_sectors.index', compact('company_sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('company_sectors-create');

        return view('company_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CompanySectorRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $company_sector = $this->company_sectorRepository->storeCompanySector($input);

        return redirect('company_sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('company_sectors-show');

        $company_sector = $this->company_sectorRepository->findCompanySectorById($id);
        $logs = $company_sector->revisionHistory;

        return view('company_sectors.show', compact('company_sector', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('company_sectors-edit');

        $company_sector = $this->company_sectorRepository->findCompanySectorById($id);
        
        return view('company_sectors.edit', compact('company_sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CompanySectorRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $company_sector = $this->company_sectorRepository->findCompanySectorById($id);
        $company_sector->update($input);

        return redirect('company_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('company_sectors-destroy');

        if($this->company_sectorService->destroyEmployeeMovement($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Movimentação(ões) Funcional(is) vinculada(s) ao registro selecionado !');
            
            return redirect()->route('company_sectors.show', ['id' => $id]);
        }

        if($this->company_sectorService->destroyPatrimonialMovement($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Movimentação(ões) Patrimonial(is) vinculada(s) ao registro selecionado !');
            
            return redirect()->route('company_sectors.show', ['id' => $id]);
        }
        
        $this->company_sectorRepository->findCompanySectorById($id)->delete();

        Session::flash('flash_message_company_sector_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('company_sectors.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $company_sector = $this->company_sectorRepository->findCompanySectorById($id);
        $company_sector->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('company_sectors.show', ['id' => $id]);
    }
}
