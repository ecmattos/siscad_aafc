<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\ServiceRepository;
use SisCad\Repositories\PatrimonialServiceRepository;

class ServicesController extends Controller
{
    private $serviceRepository;
    private $patrimonial_serviceRepository;

    public function __construct(ServiceRepository $serviceRepository, PatrimonialServiceRepository $patrimonial_serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->patrimonial_serviceRepository = $patrimonial_serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $services = $this->serviceRepository->allServices();
        #dd($services);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ServiceRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);
        $input['unit'] = strtoupper($input['unit']);

        $service = $this->serviceRepository->storeService($input);

        return redirect('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $service = $this->serviceRepository->findServiceById($id);

        $service_patrimonials = $this->patrimonial_serviceRepository->allPatrimonialServicesByServiceId($id);
        
        $logs = $service->revisionHistory;

        return view('services.show', compact('service', 'service_patrimonials', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $service = $this->serviceRepository->findServiceById($id);
        
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\ServiceRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);
        $input['unit'] = strtoupper($input['unit']);

        $service = $this->serviceRepository->findServiceById($id);
        $service->update($input);

        return redirect('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->patrimonial_serviceRepository->allPatrimonialServicesByServiceId($id)->count()>0)
        {
           return redirect('services')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) serviço(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->serviceRepository->findServiceById($id)->delete();

        return redirect('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->serviceRepository->withTrashed()->findServiceById($id)->restore();

        return redirect('services');
    }
}
