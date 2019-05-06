<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\RegionRepository;
use SisCad\Repositories\CityRepository;
use SisCad\Repositories\PartnerRepository;
use SisCad\Repositories\PartnerSectorRepository;
use SisCad\Repositories\PartnerTypeRepository;

use Session;

class PartnersController extends Controller
{
    private $cityRepository;
    private $regionRepository;
    private $partner_sectorRepository;
    private $partner_typeRepository;
    private $partnerRepository;

    public function __construct(
            RegionRepository $regionRepository, 
            CityRepository $cityRepository, 
            PartnerRepository $partnerRepository, 
            PartnerSectorRepository $partner_sectorRepository, 
            PartnerTypeRepository $partner_typeRepository)
    {
        $this->regionRepository = $regionRepository;
        $this->cityRepository = $cityRepository;
        $this->partnerRepository = $partnerRepository;
        $this->partner_sectorRepository = $partner_sectorRepository;
        $this->partner_typeRepository = $partner_typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
       $this->authorize('partners-index');

       $partners = $this->partnerRepository->allPartnersByName();
       ##dd($partners);

       return view('partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search()
    { 
        $this->authorize('partners-search');

        session()->forget('srch_partner_name');
        session()->forget('srch_partner_region_id');
        session()->forget('srch_partner_city_id');
        session()->forget('srch_partner_type_id');

        $regions = array(''=>'') + $this->regionRepository
            ->allRegions()
            ->pluck('description', 'id')
            ->all();

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $partner_types = array(''=>'') + $this->partner_typeRepository
            ->allPartnerTypes()
            ->pluck('description', 'id')
            ->all();

        $partner_sectors = $this->partner_sectorRepository
            ->allPartnerSectors()
            ->pluck('description', 'id')
            ->all();

        return view('partners.search', compact('regions', 'cities', 'partner_sectors', 'partner_types'));
    }

    public function search_results(Requests\PartnerSearchRequest $request)
    { 
        $input = $request->all();

        $request->flash();

        session(['srch_partner_name' => $input['srch_partner_name']]);
        #dd(session()->get('srch_partner_name'));
        session()->put('srch_partner_region_id', $input['srch_partner_region_id']);
        session()->put('srch_partner_city_id', $input['srch_partner_city_id']);
        session()->put('srch_partner_type_id', $input['srch_partner_type_id']);
        
        $partners = $this->partnerRepository->searchPartners();

        return view('partners.search_results', compact('partners'));
    }

    public function search_results_back()
    { 
        $partners = $this->partnerRepository->searchPartners();

        return view('partners.search_results', compact('partners'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        $this->authorize('partners-create');

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $partner_types = array(''=>'') + $this->partner_typeRepository
            ->allPartnerTypes()
            ->pluck('description', 'id')
            ->all();

        $partner_sectors = $this->partner_sectorRepository
            ->allPartnerSectors()
            ->pluck('description', 'id')
            ->all();

        return view('partners.create', compact('regions', 'cities', 'partner_sectors', 'partner_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PartnerRequest $request)
    {
        $input = $request->all();

        $input['name'] = strtoupper($input['name']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        
        $partner = $this->partnerRepository->storePartner($input);
      
        $partner = $this->partnerRepository->allPartnersById()->last();

        return redirect()->route('partners.show', ['id' => $partner->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $partner = $this->partnerRepository->findPartnerById($id);
        $logs = $partner->revisionHistory;
        
        return view('partners.show', compact('partner', 'logs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleted($id)
    {

        $partner = $this->partnerRepository->findPartnerTrashedById($id);
        $logs = $partner->revisionHistory;
        
        return view('partners.deleted', compact('partner', 'logs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $partner = $this->partnerRepository->findPartnerTrashedById($id);
        $partner->restore();

        $logs = $partner->revisionHistory;
        
        return view('partners.show', compact('partner', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    { 
        $cities = $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $partner_types = $this->partner_typeRepository
            ->allPartnerTypes()
            ->pluck('description', 'id')
            ->all();

        $partner_sectors = $this->partner_sectorRepository
            ->allPartnerSectors()
            ->pluck('description', 'id')
            ->all();

        $partner = $this->partnerRepository->findPartnerById($id);

        return view('partners.edit', compact('partner', 'cities', 'partner_sectors', 'partner_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\PartnerRequest $request, $id)
    {
        $input = $request->all();

        $input['name'] = strtoupper($input['name']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);

        $partner = $this->partnerRepository->findPartnerById($id);
        $partner->update($input);

        $logs = $partner->revisionHistory;
        
        return view('partners.show', compact('partner', 'logs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->partnerRepository->findPartnerById($id)->delete();

        Session::flash('flash_message_partner_destroy', 'Registro excluído com sucesso !');

        return redirect()->route('partners.deleted', ['id' => $id]);
    }
}