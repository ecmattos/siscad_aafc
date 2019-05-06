<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\PatrimonialBrandRepository;

use SisCad\Services\PatrimonialService;
use SisCad\Services\PatrimonialBrandService;

use Session;

class PatrimonialBrandsController extends Controller
{
    private $patrimonial_brandRepository;
    private $patrimonialService;

    public function __construct(
            PatrimonialBrandRepository $patrimonial_brandRepository, 
            PatrimonialService $patrimonialService,
            PatrimonialBrandService $patrimonial_brandService
        )
    {
        $this->patrimonial_brandRepository = $patrimonial_brandRepository;
        $this->patrimonialService = $patrimonialService;
        $this->patrimonial_brandService = $patrimonial_brandService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_brands-index');

        $patrimonial_brands = $this->patrimonial_brandRepository->allPatrimonialBrands();
        #dd($patrimonial_brands);
        return view('patrimonial_brands.index', compact('patrimonial_brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_brands-create');

        return view('patrimonial_brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialBrandRequest $request)
    {
        $data = $request->all();

        $data['code'] = strtoupper($data['code']);
        $data['description'] = strtoupper($data['description']);

        $patrimonial_brand = $this->patrimonial_brandRepository->storePatrimonialBrand($data);

        return redirect('patrimonial_brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_brands-show');

        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        $logs = $patrimonial_brand->revisionHistory;

        return view('patrimonial_brands.show', compact('patrimonial_brand', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('patrimonial_brands-edit');

        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        
        return view('patrimonial_brands.edit', compact('patrimonial_brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PatrimonialBrandRequest $request, $id)
    {
        $data = $request->all();

        $data['code'] = strtoupper($data['code']);
        $data['description'] = strtoupper($data['description']);

        $patrimonial_brand = $this->patrimonial_brandRepository->findPatrimonialBrandById($id);
        $patrimonial_brand->update($data);

        $this->patrimonialService->brand_update($id);

        return redirect('patrimonial_brands');
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
        
        $this->partner_typeRepository->findPartnerByPartnerTypeId($id)->delete();

        Session::flash('flash_message_partner_type_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('partner_types.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $partner_type = $this->partner_typeRepository->findPartnerByPartnerTypeId($id);
        $partner_type->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('partner_types.show', ['id' => $id]);
    }
}
