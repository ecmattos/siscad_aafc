<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialSectorRepository;

class PatrimonialSectorsController extends Controller
{
    private $patrimonial_sectorRepository;

    public function __construct(PatrimonialSectorRepository $patrimonial_sectorRepository)
    {
        $this->patrimonial_sectorRepository = $patrimonial_sectorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_sectors-index');

        $patrimonial_sectors = $this->patrimonial_sectorRepository->allPatrimonialSectors();
        #dd($patrimonial_sectors);
        return view('patrimonial_sectors.index', compact('patrimonial_sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_sectors-create');

        return view('patrimonial_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialSectorRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sector = $this->patrimonial_sectorRepository->storePatrimonialSector($input);

        return redirect('patrimonial_sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_sectors-show');

        $patrimonial_sector = $this->patrimonial_sectorRepository->findPatrimonialSectorById($id);
        $logs = $patrimonial_sector->revisionHistory;

        return view('patrimonial_sectors.show', compact('patrimonial_sector', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_sectors-edit');

        $patrimonial_sector = $this->patrimonial_sectorRepository->findPatrimonialSectorById($id);
        
        return view('patrimonial_sectors.edit', compact('patrimonial_sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialSectorRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sector = $this->patrimonial_sectorRepository->findPatrimonialSectorById($id);
        $patrimonial_sector->update($input);

        return redirect('patrimonial_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_sectors-create');

        if($this->memberRepository->findMembersByPatrimonialSectorId($id)->count()>0)
        {
           return redirect('patrimonial_sectors')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_sectorRepository->findPatrimonialSectorById($id)->delete();

        return redirect('patrimonial_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_sectorRepository->withTrashed()->findPatrimonialSectorById($id)->restore();

        return redirect('patrimonial_sectors');
    }
}
