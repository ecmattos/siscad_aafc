<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialMovementTypeRepository;

class PatrimonialMovementTypesController extends Controller
{
    private $patrimonial_movement_typeRepository;

    public function __construct(PatrimonialMovementTypeRepository $patrimonial_movement_typeRepository)
    {
        $this->patrimonial_movement_typeRepository = $patrimonial_movement_typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_movement_types-index');

        $patrimonial_movement_types = $this->patrimonial_movement_typeRepository->allPatrimonialMovementTypes();
        #dd($patrimonial_movement_types);
        return view('patrimonial_movement_types.index', compact('patrimonial_movement_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_movement_types-create');

        return view('patrimonial_movement_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialMovementTypeRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_movement_type = $this->patrimonial_movement_typeRepository->storePatrimonialMovementType($input);

        return redirect('patrimonial_movement_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_movement_types-show');

        $patrimonial_movement_type = $this->patrimonial_movement_typeRepository->findPatrimonialMovementTypeById($id);
        $logs = $patrimonial_movement_type->revisionHistory;

        return view('patrimonial_movement_types.show', compact('patrimonial_movement_type', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_movement_types-edit');

        $patrimonial_movement_type = $this->patrimonial_movement_typeRepository->findPatrimonialMovementTypeById($id);
        
        return view('patrimonial_movement_types.edit', compact('patrimonial_movement_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialMovementTypeRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_movement_type = $this->patrimonial_movement_typeRepository->findPatrimonialMovementTypeById($id);
        $patrimonial_movement_type->update($input);

        return redirect('patrimonial_movement_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_movement_types-destroy');

        if($this->memberRepository->findMembersByPatrimonialMovementTypeId($id)->count()>0)
        {
           return redirect('patrimonial_movement_types')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_movement_typeRepository->findPatrimonialMovementTypeById($id)->delete();

        return redirect('patrimonial_movement_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_movement_typeRepository->withTrashed()->findPatrimonialMovementTypeById($id)->restore();

        return redirect('patrimonial_movement_types');
    }
}
