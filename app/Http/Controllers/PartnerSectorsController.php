<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PartnerRepository;
use SisCad\Repositories\PartnerSectorRepository;

use SisCad\Services\PartnerSectorService;

use Session;

class PartnerSectorsController extends Controller
{
    private $partner_sectorRepository;
    private $partnerRepository;
    private $partner_sectorService;

    public function __construct(
            PartnerSectorRepository $partner_sectorRepository,
            PartnerRepository $partnerRepository,
            PartnerSectorService $partner_sectorService
        )
    {
        $this->partner_sectorRepository = $partner_sectorRepository;
        $this->partnerRepository = $partnerRepository;
        $this->partner_sectorService = $partner_sectorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('partner_sectors-index');

        $partner_sectors = $this->partner_sectorRepository->allPartnerSectors2();
        #dd($partner_sectors);
        return view('partner_sectors.index', compact('partner_sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('partner_sectors-create');

        return view('partner_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PartnerSectorRequest $request)
    {
        $data = $request->all();

        $data['code'] = strtoupper($data['code']);
        $data['description'] = strtoupper($data['description']);

        $partner_sector = $this->partner_sectorRepository->storePartnerSector($data);

        return redirect('partner_sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('partner_sectors-show');

        $partner_sector = $this->partner_sectorRepository->findPartnerSectorById($id);
        $logs = $partner_sector->revisionHistory;

        return view('partner_sectors.show', compact('partner_sector', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('partner_sectors-edit');

        $partner_sector = $this->partner_sectorRepository->findPartnerSectorById($id);
        
        return view('partner_sectors.edit', compact('partner_sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PartnerSectorRequest $request, $id)
    {
        $data = $request->all();

        $data['code'] = strtoupper($data['code']);
        $data['description'] = strtoupper($data['description']);

        $partner_sector = $this->partner_sectorRepository->findPartnerSectorById($id);
        $partner_sector->update($data);

        return redirect()->route('partner_sectors.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('partner_sectors-destroy');

        if($this->partner_sectorService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Parceiro(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('partner_sectors.show', ['id' => $id]);
        }
        
        $this->partner_sectorRepository->findPartnerSectorById($id)->delete();

        Session::flash('flash_message_partner_sector_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('partner_sectors.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $partner_sector = $this->partner_sectorRepository->findPartnerSectorById($id);
        $partner_sector->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('partner_sectors.show', ['id' => $id]);
    }
}
