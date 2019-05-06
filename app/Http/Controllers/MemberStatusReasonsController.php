<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MemberStatusReasonRepository;

class MemberStatusReasonsController extends Controller
{
    private $member_status_reasonRepository;

    public function __construct(MemberStatusReasonRepository $member_status_reasonRepository)
    {
        $this->member_status_reasonRepository = $member_status_reasonRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('member_status_reasons-index');

        $member_status_reasons = $this->member_status_reasonRepository->allMemberStatusReasons();
        #dd($member_status_reasons);
        return view('member_status_reasons.index', compact('member_status_reasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('member_status_reasons-create');

        return view('member_status_reasons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MemberStatusReasonRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $member_status_reason = $this->member_status_reasonRepository->storeMemberStatusReason($input);

        return redirect('member_status_reasons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('member_status_reasons-show');

        $member_status_reason = $this->member_status_reasonRepository->findMemberStatusReasonById($id);
        $logs = $member_status_reason->revisionHistory;

        return view('member_status_reasons.show', compact('member_status_reason', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('member_status_reasons-edit');

        $member_status_reason = $this->member_status_reasonRepository->findMemberStatusReasonById($id);
        
        return view('member_status_reasons.edit', compact('member_status_reason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MemberStatusReasonRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $member_status_reason = $this->member_status_reasonRepository->findMemberStatusReasonById($id);
        $member_status_reason->update($input);

        return redirect('member_status_reasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('member_status_reasons-destroy');

        $this->member_status_reasonRepository->findMemberStatusReasonById($id)->delete();

        return redirect('member_status_reasons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->member_status_reasonRepository->withTrashed()->findMemberStatusReasonById($id)->restore();

        return redirect('member_status_reasons');
    }
}
