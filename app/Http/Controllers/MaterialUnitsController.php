<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MaterialUnitRepository;
use SisCad\Repositories\MaterialRepository;

use SisCad\Services\MaterialUnitService;

use Session;

class MaterialUnitsController extends Controller
{
    private $material_unitRepository;
    private $materialRepository;
    private $material_unitService;


    public function __construct(
            MaterialUnitRepository $material_unitRepository, 
            MaterialRepository $materialRepository,
            MaterialUnitService $material_unitService
        )
    {
        $this->material_unitRepository = $material_unitRepository;
        $this->materialRepository = $materialRepository;
        $this->material_unitService = $material_unitService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('material_units-index');

        $material_units = $this->material_unitRepository->allMaterialUnits();
        #dd($material_units);
        return view('material_units.index', compact('material_units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('material_units-create');

        return view('material_units.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MaterialUnitRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $material_unit = $this->material_unitRepository->storeMaterialUnit($input);

        return redirect('material_units');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('material_units-show');

        $material_unit = $this->material_unitRepository->findMaterialUnitById($id);
        $logs = $material_unit->revisionHistory;

        return view('material_units.show', compact('material_unit', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('material_units-edit');

        $material_unit = $this->material_unitRepository->findMaterialUnitById($id);
        
        return view('material_units.edit', compact('material_unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MaterialUnitRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $material_unit = $this->material_unitRepository->findMaterialUnitById($id);
        $material_unit->update($input);

        return redirect('material_units');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('material_units-destroy');

        if($this->material_unitService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) patrimônio(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('material_units.show', ['id' => $id]);
        }
        
        $this->material_unitRepository->findMaterialUnitById($id)->delete();

        Session::flash('flash_message_material_unit_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('material_units.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $material_unit = $this->material_unitRepository->findMaterialUnitById($id);
        $material_unit->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('material_units.show', ['id' => $id]);
    }

}
