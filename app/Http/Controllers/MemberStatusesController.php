<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MemberStatusRepository;
use SisCad\Repositories\MemberRepository;

class MemberStatusesController extends Controller
{
    private $member_statusRepository;

    public function __construct(MemberStatusRepository $member_statusRepository, MemberRepository $memberRepository)
    {
        $this->member_statusRepository = $member_statusRepository;
        $this->memberRepository = $memberRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('member_statuses-index');

        $member_statuses = $this->member_statusRepository->allMemberStatuses();
        #dd($member_statuses);
        return view('member_statuses.index', compact('member_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('member_statuses-create');

        return view('member_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MemberStatusRequest $request)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $member_status = $this->member_statusRepository->storeMemberStatus($input);

        return redirect('member_statuses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('member_statuses-show');

        $member_status = $this->member_statusRepository->findMemberStatusById($id);
        $logs = $member_status->revisionHistory;

        return view('member_statuses.show', compact('member_status', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $this->authorize('member_statuses-edit');

        $member_status = $this->member_statusRepository->findMemberStatusById($id);
        
        return view('member_statuses.edit', compact('member_status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MemberStatusRequest $request, $id)
    {
        $input = $request->all();

        $input['code'] = strtoupper($input['code']);
        $input['description'] = strtoupper($input['description']);

        $member_status = $this->member_statusRepository->findMemberStatusById($id);
        $member_status->update($input);

        return redirect('member_statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('member_statuses-destroy');

        if($this->memberRepository->allMembersByPlanId($id)->count()>0)
        {
           return redirect('member_statuses')->withInput()->withErrors(['error' => '<b>Exclusão CANCELADA</b> >> Existe(m) Associado(s) vinculado(s) ao registro selecionado !']); 
        }

        $this->member_statusRepository->findMemberStatusById($id)->delete();

        return redirect('member_statuses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function restore($id)
    {
        $this->member_statusRepository->withTrashed()->findMemberStatusById($id)->restore();

        return redirect('member_statuses');
    }
}
