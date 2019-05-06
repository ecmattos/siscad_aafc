<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\ProviderRepository;
use SisCad\Repositories\CityRepository;

use SisCad\Services\ProviderService;

use Session;

class ProvidersController extends Controller
{
    private $providerRepository;
    private $cityRepository;

    private $providerService;

    public function __construct(
        ProviderRepository $providerRepository, 
        CityRepository $cityRepository,
        ProviderService $providerService)
    {
        $this->providerRepository = $providerRepository;
        $this->cityRepository = $cityRepository;
        $this->providerService = $providerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('providers-index');

        $providers = $this->providerRepository->allProviders();
        #dd($providers);
        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('providers-create');

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();
        
        return view('providers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ProviderRequest $request)
    {
        $input = $request->all();

        $input['description'] = strtoupper($input['description']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $provider = $this->providerRepository->storeProvider($input);

        return redirect('providers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('providers-show');

        $provider = $this->providerRepository->findProviderById($id);
        $logs = $provider->revisionHistory;

        return view('providers.show', compact('provider', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('providers-edit');

        $cities = $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $provider = $this->providerRepository->findProviderById($id);
        
        return view('providers.edit', compact('provider', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ProviderRequest $request, $id)
    {
        $input = $request->all();

        $input['description'] = strtoupper($input['description']);
        $input['address'] = strtoupper($input['address']);
        $input['neighborhood'] = strtoupper($input['neighborhood']);
        $input['comments'] = strtoupper($input['comments']);

        $provider = $this->providerRepository->findProviderById($id);
        $provider->update($input);

        return redirect('providers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('providers-destroy');
        
        if($this->providerService->destroy($id))
        {
            Session::flash('flash_message_danger', 'Exclusão CANCELADA >> Existe(m) patrimônio(s) vinculado(s) ao registro selecionado !');
            
            return redirect()->route('providers.show', ['id' => $id]);
        }
        
        Session::flash('flash_message_provider_destroy', 'Registro EXCLUÍDO com sucesso !');
            
        return redirect()->route('providers.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $provider = $this->providerRepository->findManagementUnitTrashedById($id);
        $provider->restore();

        Session::flash('flash_message_success', 'Registro RESTAURADO !');

        return redirect()->route('providers.show', ['id' => $id]);
    }
}