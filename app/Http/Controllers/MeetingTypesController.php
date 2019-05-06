<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MeetingTypeRepository;

class MeetingTypesController extends Controller
{
    private $meeting_typeRepository;

    public function __construct(MeetingTypeRepository $meeting_typeRepository)
    {
        $this->meeting_typeRepository = $meeting_typeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $this->authorize('meeting_types-index');

       $meeting_types = $this->meeting_typeRepository->allMeetingTypes();
       
       return view('meeting_types.index', compact('meeting_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(MeetingTypeRepository $meeting_typeRepository)
    { 
        $this->authorize('meeting_types-create');

        $meeting_types = array(''=>'') + $meeting_typeRepository
            ->allMeetingTypes()
            ->pluck('description', 'id')
            ->all();

        return view('meeting_types.create', compact('meeting_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MeetingTypeRequest $request)
    {
        $input = $request->all();

        $input['description'] = strtoupper($input['description']);

        $meeting_type = $this->meeting_typeRepository->storeMeetingType($input);
      
        return redirect('meeting_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('meeting_types-show');

        $meeting_type = $this->meeting_typeRepository->findMeetingTypeById($id);
        $logs = $meeting_type->revisionHistory;
        
        return view('meeting_types.show', compact('meeting_type', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, MeetingTypeRepository $meeting_typeRepository)
    {
        $this->authorize('meeting_types-edit');

        $meeting_types = array(''=>'') + $meeting_typeRepository
            ->allMeetingTypes()
            ->pluck('description', 'id')
            ->all();

        $meeting_type = $this->meeting_typeRepository->findMeetingTypeById($id);
        
        return view('meeting_types.edit', compact('meeting_type', 'meeting_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MeetingTypeRequest $request, $id)
    {
        $input = $request->all();

        $input['description'] = strtoupper($input['description']);
                
        $meeting_type = $this->meeting_typeRepository->findMeetingTypeById($id);
        $meeting_type->update($input);

        return redirect('meeting_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, PartnerRepository $partnerRepository)
    {
        $this->authorize('meeting_types-destroy');

        $this->meeting_typeRepository->findMeetingTypeById($id)->delete();

        return redirect('meeting_types');
    }
}