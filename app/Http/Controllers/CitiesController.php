<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\RegionRepository;
use SisCad\Repositories\StateRepository;
use SisCad\Repositories\CityRepository;

use SisCad\Repositories\PartnerRepository;
use SisCad\Repositories\MemberRepository;

use SisCad\Services\CityService;

use Session;

class CitiesController extends Controller
{
    private $cityRepository;
    private $stateRepository;
    private $regionRepository;
    private $partnerRepository;
    private $memberRepository;

    private $cityService;

    public function __construct(
            CityRepository $cityRepository, 
            StateRepository $stateRepository, 
            RegionRepository $regionRepository, 
            PartnerRepository $partnerRepository, 
            MemberRepository $memberRepository,
            CityService $cityService)
    {
        $this->cityRepository = $cityRepository;
        $this->stateRepository = $stateRepository;
        $this->regionRepository = $regionRepository;
        $this->partnerRepository = $partnerRepository;
        $this->memberRepository = $memberRepository;

        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
       $this->authorize('cities-index');

       $cities = $this->cityRepository->allCities();
       ##dd($cities);

       return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        $this->authorize('cities-create');

        $states = array(''=>'') + $this->stateRepository
            ->allStates()
            ->pluck('description', 'id')
            ->all();

        $regions = array(''=>'') + $this->regionRepository
            ->allRegions()
            ->pluck('description', 'id')
            ->all();

        return view('cities.create', compact('states', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CityRequest $request)
    {
        $data = $request->all();

        $data['description'] = strtoupper($data['description']);

        $city = $this->cityRepository->storeCity($data);
      
        return redirect('cities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('cities-show');

        $city = $this->cityRepository->findCityById($id);
        $logs = $city->revisionHistory;
        
        return view('cities.show', compact('city', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($city)
    {
        $this->authorize('cities-edit');

        $states = $this->stateRepository
            ->allStates()
            ->pluck('description', 'id')
            ->all();

        $regions = $this->regionRepository
            ->allRegions()
            ->pluck('description', 'id')
            ->all();

        $city = $this->cityRepository->findCityById($city);
        
        return view('cities.edit', compact('city', 'states', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CityRequest $request, $id)
    {
        $data = $request->all();

        $data['description'] = strtoupper($data['description']);
                
        $city = $this->cityRepository->findCityById($id);
        $city->update($data);

        return redirect()->route('cities.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('cities-destroy');

        if($this->cityService->destroyCityMemberCheck($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Sócio(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('cities.show', ['id' => $id]);
        }

        if($this->cityService->destroyCityPartnerCheck($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Parceiro(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('cities.show', ['id' => $id]);
        }

        if($this->cityService->destroyCityProviderCheck($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Fornecedor(es) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('cities.show', ['id' => $id]);
        }

        if($this->cityService->destroyCityManagementUnitCheck($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Unid.Gestora(s) vinculada(s) ao registro selecionado !');
            
            return redirect()->route('cities.show', ['id' => $id]);
        }

        if($this->cityService->destroyCityEmployeesCheck($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Funcionário(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('cities.show', ['id' => $id]);
        }

        if($this->cityService->destroyCityMeetingCheck($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) Evento(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('cities.show', ['id' => $id]);
        }
        
        $this->cityRepository->findCityById($id)->delete();

        Session::flash('flash_message_company_sector_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('cities.show', ['id' => $id]);
    }

    public function restore($id)
    {
        $company_sector = $this->cityRepository->findCityById($id);
        $company_sector->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('cities.show', ['id' => $id]);
    }
}