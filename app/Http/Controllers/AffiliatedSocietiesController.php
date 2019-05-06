<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\AffiliatedSocietyRepository;
use SisCad\Repositories\CityRepository;
use SisCad\Repositories\PatrimonialRepository;

class AffiliatedSocietiesController extends Controller
{
    private $affiliated_societyRepository;
    private $cityRepository;
    private $patrimonialRepository;

    public function __construct(AffiliatedSocietyRepository $affiliated_societyRepository, CityRepository $cityRepository, PatrimonialRepository $patrimonialRepository)
    {
        $this->affiliated_societyRepository = $affiliated_societyRepository;
        $this->cityRepository = $cityRepository;
        $this->patrimonialRepository = $patrimonialRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $affiliated_societies = $this->affiliated_societyRepository->allAffiliatedSocieties();
        #dd($affiliated_societies);
        return view('affiliated_societies.index', compact('affiliated_societies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(CityRepository $cityRepository)
    {
        $cities = array(''=>'') + $cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        return view('affiliated_societies.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\AffiliatedSocietyRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $affiliated_society = $this->affiliated_societyRepository->storeAffiliatedSociety($input);

        return redirect('affiliated_societies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $affiliated_society = $this->affiliated_societyRepository->findAffiliatedSocietyById($id);
        
        $logs = $affiliated_society->revisionHistory;

        $patrimonials = $this->affiliated_societyRepository->allPatrimonialsByAffiliatedSocietyId($id);

        return view('affiliated_societies.show', compact('affiliated_society', 'patrimonials', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, CityRepository $cityRepository)
    {
        $cities = $cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $affiliated_society = $this->affiliated_societyRepository->findAffiliatedSocietyById($id);
        
        return view('affiliated_societies.edit', compact('affiliated_society', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\AffiliatedSocietyRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $affiliated_society = $this->affiliated_societyRepository->findAffiliatedSocietyById($id);
        $affiliated_society->update($input);

        return redirect('affiliated_societies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->memberRepository->findMembersByAffiliatedSocietyId($id)->count()>0)
        {
           return redirect('affiliated_societies')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->affiliated_societyRepository->findAffiliatedSocietyById($id)->delete();

        return redirect('affiliated_societies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->affiliated_societyRepository->withTrashed()->findAffiliatedSocietyById($id)->restore();

        return redirect('affiliated_societies');
    }
}
