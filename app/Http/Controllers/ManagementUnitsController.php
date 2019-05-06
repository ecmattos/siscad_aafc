<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\ManagementUnitRepository;
use SisCad\Repositories\RegionRepository;
use SisCad\Repositories\CityRepository;
use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\PatrimonialMovementRepository;

use SisCad\Services\ManagementUnitService;

use Session;

class ManagementUnitsController extends Controller
{
    private $management_unitRepository;
    private $regionRepository;
    private $cityRepository;
    private $patrimonialRepository;
    private $patrimonial_movementRepository;

    private $management_unitService;


    public function __construct(
        ManagementUnitRepository $management_unitRepository, 
        RegionRepository $regionRepository, 
        CityRepository $cityRepository, 
        PatrimonialRepository $patrimonialRepository, 
        PatrimonialMovementRepository $patrimonial_movementRepository, 
        ManagementUnitService $management_unitService)
    {
        $this->management_unitRepository = $management_unitRepository;
        $this->regionRepository = $regionRepository;
        $this->cityRepository = $cityRepository;
        $this->patrimonialRepository = $patrimonialRepository;
        $this->patrimonial_movementRepository = $patrimonial_movementRepository;

        $this->management_unitService = $management_unitService;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('management_units-index');

        $management_units = $this->management_unitRepository->allManagementUnits();
        #dd($management_units);
        return view('management_units.index', compact('management_units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('management_units-create');

        $regions = array(''=>'') + $this->regionRepository
            ->allRegions()
            ->pluck('description', 'id')
            ->all();

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        return view('management_units.create', compact('regions', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ManagementUnitRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $management_unit = $this->management_unitRepository->storeManagementUnit($input);

        return redirect('management_units');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('management_units-show');

        $management_unit = $this->management_unitRepository->findManagementUnitById($id);

        
        $logs = $management_unit->revisionHistory;

        #$patrimonials = $this->management_unitRepository->allPatrimonialsByManagementUnitId($id);

        return view('management_units.show', compact('management_unit', 'patrimonials', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('management_units-edit');

        $regions = array(''=>'') + $this->regionRepository
            ->allRegions()
            ->pluck('description', 'id')
            ->all();

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $management_unit = $this->management_unitRepository->findManagementUnitById($id);
        
        return view('management_units.edit', compact('management_unit', 'regions', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ManagementUnitRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $management_unit = $this->management_unitRepository->findManagementUnitById($id);
        $management_unit->update($input);

        return redirect('management_units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('management_units-destroy');
        
        if($this->management_unitService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) movimentação(ões) patrimonial(is) vinculada(s) ao registro selecionado !');
            
            return redirect()->route('management_units.show', ['id' => $id]);
        }
        
        Session::flash('flash_message_management_unit_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('management_units.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $management_unit = $this->management_unitRepository->findManagementUnitTrashedById($id);
        $management_unit->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('management_units.show', ['id' => $id]);
    }


    public function search_results_back()
    { 
        return redirect('management_units');
    }
}
