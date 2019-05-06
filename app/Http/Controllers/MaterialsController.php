<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MaterialRepository;
use SisCad\Repositories\MaterialUnitRepository;
use SisCad\Repositories\PatrimonialMaterialRepository;

use SisCad\Services\MaterialService;

class MaterialsController extends Controller
{
    private $materialRepository;
    private $material_unitRepository;
    private $patrimonial_materialRepository;
    private $materialService;

    public function __construct(
        MaterialRepository $materialRepository, 
        MaterialUnitRepository $material_unitRepository, 
        PatrimonialMaterialRepository $patrimonial_materialRepository,
        MaterialService $materialService
        )
    {
        $this->materialRepository = $materialRepository;
        $this->material_unitRepository = $material_unitRepository;
        $this->patrimonial_materialRepository = $patrimonial_materialRepository;
        $this->materialService = $materialService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('materials-index');

        $materials = $this->materialRepository->allMaterials();
        #dd($materials);
        return view('materials.index', compact('materials'));
    }

    public function search_results_back()
    { 
        return redirect('materials');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('materials-create');

        $material_units = array(''=>'') + $this->material_unitRepository
            ->allMaterialUnits()
            ->pluck('description', 'id')
            ->all();

        return view('materials.create', compact('material_units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MaterialRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $material = $this->materialRepository->storeMaterial($input);

        return redirect('materials');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('materials-show');

        $material = $this->materialRepository->findMaterialById($id);
        $logs = $material->revisionHistory;

        $material_patrimonials = $this->patrimonial_materialRepository->allPatrimonialMaterialsByMaterialId($id);

        return view('materials.show', compact('material', 'material_patrimonials', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('materials-create');

        $material_units = array(''=>'') + $this->material_unitRepository
            ->allMaterialUnits()
            ->pluck('description', 'id')
            ->all();

        $material = $this->materialRepository->findMaterialById($id);
        
        return view('materials.edit', compact('material', 'material_units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MaterialRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $material = $this->materialRepository->findMaterialById($id);
        $material->update($input);

        return redirect('materials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('materials-destroy');
        
        $this->materialService->destroy($id);

        return redirect('materials');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->materialRepository->withTrashed()->findMaterialById($id)->restore();

        return redirect('materials');
    }
}
