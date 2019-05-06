<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialStatusRepository;

class PatrimonialStatusesController extends Controller
{
    private $patrimonial_statusRepository;

    public function __construct(PatrimonialStatusRepository $patrimonial_statusRepository)
    {
        $this->patrimonial_statusRepository = $patrimonial_statusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_statuses-index');

        $patrimonial_statuses = $this->patrimonial_statusRepository->allPatrimonialStatuses();
        #dd($patrimonial_statuses);
        return view('patrimonial_statuses.index', compact('patrimonial_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_statuses-create');

        return view('patrimonial_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialStatusRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_status = $this->patrimonial_statusRepository->storePatrimonialStatus($input);

        return redirect('patrimonial_statuses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_statuses-show');

        $patrimonial_status = $this->patrimonial_statusRepository->findPatrimonialStatusById($id);
        $logs = $patrimonial_status->revisionHistory;

        return view('patrimonial_statuses.show', compact('patrimonial_status', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_statuses-edit');

        $patrimonial_status = $this->patrimonial_statusRepository->findPatrimonialStatusById($id);
        
        return view('patrimonial_statuses.edit', compact('patrimonial_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialStatusRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_status = $this->patrimonial_statusRepository->findPatrimonialStatusById($id);
        $patrimonial_status->update($input);

        return redirect('patrimonial_statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_statuses-destroy');

        if($this->memberRepository->findMembersByPatrimonialStatusId($id)->count()>0)
        {
           return redirect('patrimonial_statuses')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->patrimonial_statusRepository->findPatrimonialStatusById($id)->delete();

        return redirect('patrimonial_statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->patrimonial_statusRepository->withTrashed()->findPatrimonialStatusById($id)->restore();

        return redirect('patrimonial_statuses');
    }
}
