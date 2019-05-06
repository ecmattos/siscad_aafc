<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialMovementRepository;

class PatrimonialMovementsController extends Controller
{
    private $patrimonial_movementRepository;

    public function __construct(PatrimonialMovementRepository $patrimonial_movementRepository)
    {
        $this->patrimonial_movementRepository = $patrimonial_movementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $patrimonial_movements = $this->patrimonial_movementRepository->allPatrimonialMovements();
        #dd($patrimonial_movements);
        return view('patrimonial_movements.index', compact('patrimonial_movements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('patrimonial_movements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialMovementRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_movement = $this->patrimonial_movementRepository->storePatrimonialMovement($input);

        return redirect('patrimonial_movements');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $patrimonial_movement = $this->patrimonial_movementRepository->findPatrimonialMovementById($id);
        $logs = $patrimonial_movement->revisionHistory;

        return view('patrimonial_movements.show', compact('patrimonial_movement', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $patrimonial_movement = $this->patrimonial_movementRepository->findPatrimonialMovementById($id);
        
        return view('patrimonial_movements.edit', compact('patrimonial_movement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialMovementRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_movement = $this->patrimonial_movementRepository->findPatrimonialMovementById($id);
        $patrimonial_movement->update($input);

        return redirect('patrimonial_movements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByPatrimonialMovementId($id)->count()>0)
        {
           return redirect('patrimonial_movements')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_movementRepository->findPatrimonialMovementById($id)->delete();

        return redirect('patrimonial_movements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_movementRepository->withTrashed()->findPatrimonialMovementById($id)->restore();

        return redirect('patrimonial_movements');
    }
}
