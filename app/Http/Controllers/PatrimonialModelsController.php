<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialModelRepository;

use SisCad\Services\PatrimonialService;
use SisCad\Services\PatrimonialModelService;

use Session;

class PatrimonialModelsController extends Controller
{
    private $patrimonial_modelRepository;
    private $patrimonialService;
    private $patrimonial_modelService;

    public function __construct(
            PatrimonialModelRepository $patrimonial_modelRepository, 
            PatrimonialService $patrimonialService,
            PatrimonialModelService $patrimonial_modelService)
    {
        $this->patrimonial_modelRepository = $patrimonial_modelRepository;
        $this->patrimonialService = $patrimonialService;
        $this->patrimonial_modelService = $patrimonial_modelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_models-index');

        $patrimonial_models = $this->patrimonial_modelRepository->allPatrimonialModels();
        #dd($patrimonial_models);
        return view('patrimonial_models.index', compact('patrimonial_models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_models-create');

        return view('patrimonial_models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialModelRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_model = $this->patrimonial_modelRepository->storePatrimonialModel($input);

        return redirect('patrimonial_models');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_models-show');

        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        $logs = $patrimonial_model->revisionHistory;

        return view('patrimonial_models.show', compact('patrimonial_model', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_models-edit');

        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        
        return view('patrimonial_models.edit', compact('patrimonial_model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialModelRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        $patrimonial_model->update($input);

        $this->patrimonialService->model_update($id);

        return redirect('patrimonial_models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('patrimonial_models-destroy');

        if($this->patrimonial_modelService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) patrimônio(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('patrimonial_models.show', ['id' => $id]);
        }
        
        $this->patrimonial_modelRepository->findPatrimonialModelById($id)->delete();

        Session::flash('flash_message_patrimonial_model_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('patrimonial_models.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $patrimonial_model = $this->patrimonial_modelRepository->findPatrimonialModelById($id);
        $patrimonial_model->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('patrimonial_models.show', ['id' => $id]);
    }
}
