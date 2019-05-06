<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PartnerTypeRepository;
use SisCad\Repositories\PartnerRepository;

use SisCad\Services\PartnerTypeService;

use Session;

class PartnerTypesController extends Controller
{
    private $partner_typeRepository;
    private $partnerRepository;
    private $partner_typeService;

    public function __construct(
            PartnerTypeRepository $partner_typeRepository, 
            PartnerRepository $partnerRepository,
            PartnerTypeService $partner_typeService)
    {
        $this->partner_typeRepository = $partner_typeRepository;
        $this->partnerRepository = $partnerRepository;
        $this->partner_typeService = $partner_typeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $partner_types = $this->partner_typeRepository->allPartnerTypes();
        #dd($partner_types);
        return view('partner_types.index', compact('partner_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('partner_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PartnerTypeRequest $request)
    {
        $data = $request->all();

        $data['code'] = strtoupper($data['code']);
        $data['description'] = strtoupper($data['description']);

        $partner_type = $this->partner_typeRepository->storePartnerType($data);

        return redirect('partner_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $partner_type = $this->partner_typeRepository->findPartnerTypeById($id);
        $logs = $partner_type->revisionHistory;

        return view('partner_types.show', compact('partner_type', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $partner_type = $this->partner_typeRepository->findPartnerTypeById($id);
        
        return view('partner_types.edit', compact('partner_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PartnerTypeRequest $request, $id)
    {
        $data = $request->all();

        $data['code'] = strtoupper($data['code']);
        $data['description'] = strtoupper($data['description']);

        $partner_type = $this->partner_typeRepository->findPartnerTypeById($id);
        $partner_type->update($data);

        return redirect()->route('partner_types.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('partner_types-destroy');

        if($this->partner_typeService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) patrimônio(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('partner_types.show', ['id' => $id]);
        }
        
        $this->partner_typeRepository->findPartnerTypeById($id)->delete();

        Session::flash('flash_message_partner_type_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('partner_types.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $partner_type = $this->partner_typeRepository->findPartnerTypeById($id);
        $partner_type->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('partner_types.show', ['id' => $id]);
    }
}
