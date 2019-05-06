<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialSubSectorRepository;

class PatrimonialSubSectorsController extends Controller
{
    private $patrimonial_sub_sectorRepository;

    public function __construct(PatrimonialSubSectorRepository $patrimonial_sub_sectorRepository)
    {
        $this->patrimonial_sub_sectorRepository = $patrimonial_sub_sectorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_sub_sectors-index');

        $patrimonial_sub_sectors = $this->patrimonial_sub_sectorRepository->allPatrimonialSubSectors();
        #dd($patrimonial_sub_sectors);
        return view('patrimonial_sub_sectors.index', compact('patrimonial_sub_sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_sub_sectors-create');

        return view('patrimonial_sub_sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialSubSectorRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sub_sector = $this->patrimonial_sub_sectorRepository->storePatrimonialSubSector($input);

        return redirect('patrimonial_sub_sectors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_sub_sectors-show'); 

        $patrimonial_sub_sector = $this->patrimonial_sub_sectorRepository->findPatrimonialSubSectorById($id);
        $logs = $patrimonial_sub_sector->revisionHistory;

        return view('patrimonial_sub_sectors.show', compact('patrimonial_sub_sector', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_sub_sectors-edit');

        $patrimonial_sub_sector = $this->patrimonial_sub_sectorRepository->findPatrimonialSubSectorById($id);
        
        return view('patrimonial_sub_sectors.edit', compact('patrimonial_sub_sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialSubSectorRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_sub_sector = $this->patrimonial_sub_sectorRepository->findPatrimonialSubSectorById($id);
        $patrimonial_sub_sector->update($input);

        return redirect('patrimonial_sub_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_sub_sectors-destroy');

        if($this->memberRepository->findMembersByPatrimonialSubSectorId($id)->count()>0)
        {
           return redirect('patrimonial_sub_sectors')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_sub_sectorRepository->findPatrimonialSubSectorById($id)->delete();

        return redirect('patrimonial_sub_sectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_sub_sectorRepository->withTrashed()->findPatrimonialSubSectorById($id)->restore();

        return redirect('patrimonial_sub_sectors');
    }
}
