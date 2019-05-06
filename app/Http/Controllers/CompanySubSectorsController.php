<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\CompanySubSectorRepository;

use SisCad\Services\CompanySubSectorService;

use Session;


class CompanySubSectorsController extends Controller
{
    private $company_sub_sectorRepository;
    private $company_sub_sectorService;

    public function __construct(
            CompanySubSectorRepository $company_sub_sectorRepository,
            CompanySubSectorService $company_sub_sectorService)
    {
        $this->company_sub_sectorRepository = $company_sub_sectorRepository;
        $this->company_sub_sectorService = $company_sub_sectorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('company_sub_sectors-index');

        $company_sub_sectors = $this->company_sub_sectorRepository->allCompanySubSectors();
        #dd($company_sub_sectors);
        return view('company_sub_sectors.index', compact('company_sub_sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('company_sub_sectors-create');

        return view('company_sub_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CompanySubSectorRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $company_sub_sector = $this->company_sub_sectorRepository->storeCompanySubSector($input);

        return redirect('company_sub_sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('company_sub_sectors-show'); 

        $company_sub_sector = $this->company_sub_sectorRepository->findCompanySubSectorById($id);
        $logs = $company_sub_sector->revisionHistory;

        return view('company_sub_sectors.show', compact('company_sub_sector', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('company_sub_sectors-edit');

        $company_sub_sector = $this->company_sub_sectorRepository->findCompanySubSectorById($id);
        
        return view('company_sub_sectors.edit', compact('company_sub_sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CompanySubSectorRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $company_sub_sector = $this->company_sub_sectorRepository->findCompanySubSectorById($id);
        $company_sub_sector->update($input);

        return redirect('company_sub_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('company_sub_sectors-destroy');

        if($this->company_sub_sectorService->destroyEmployeeMovement($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Movimentação(ões) Funcional(is) vinculada(s) ao registro selecionado !');
            
            return redirect()->route('company_sub_sectors.show', ['id' => $id]);
        }

        if($this->company_sub_sectorService->destroyPatrimonialMovement($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Movimentação(ões) Patrimonial(is) vinculada(s) ao registro selecionado !');
            
            return redirect()->route('company_sub_sectors.show', ['id' => $id]);
        }
        
        $this->company_sub_sectorRepository->findCompanySectorById($id)->delete();

        Session::flash('flash_message_company_sub_sector_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('company_sub_sectors.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $company_sub_sector = $this->company_sub_sectorRepository->findCompanySectorById($id);
        $company_sub_sector->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('company_sub_sectors.show', ['id' => $id]);
    }
}
