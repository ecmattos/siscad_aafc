<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;
use File;

use JasperPHP\JasperPHP as JasperPHP;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MemberStatusRepository;
use SisCad\Repositories\MemberStatusReasonRepository;
use SisCad\Repositories\RegionRepository;
use SisCad\Repositories\CityRepository;
use SisCad\Repositories\MemberRepository;
use SisCad\Repositories\PlanRepository;
use SisCad\Repositories\GenderRepository;
use SisCad\Repositories\BankRepository;

use Image;

class MembersController extends Controller
{
    private $regionRepository;
    private $cityRepository;
    private $memberRepository;
    private $member_statusRepository;
    private $member_status_reasonRepository;
    private $planRepository;
    private $genderRepository;
    private $bankRepository;

    public function __construct(RegionRepository $regionRepository, CityRepository $cityRepository, MemberRepository $memberRepository, MemberStatusRepository $member_statusRepository, MemberStatusReasonRepository $member_status_reasonRepository, PlanRepository $planRepository, GenderRepository $genderRepository, BankRepository $bankRepository)
    {
        $this->regionRepository = $regionRepository;
        $this->cityRepository = $cityRepository;
        $this->memberRepository = $memberRepository;
        $this->member_statusRepository = $member_statusRepository;
        $this->member_status_reasonRepository = $member_status_reasonRepository;
        $this->planRepository = $planRepository;
        $this->genderRepository = $genderRepository;
        $this->bankRepository = $bankRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function search()
    { 
        $this->authorize('members-search');

        session()->forget('srch_member_code');
        session()->forget('srch_member_cpf');
        session()->forget('srch_member_name');
        session()->forget('srch_member_plan_id');
        session()->forget('srch_member_gender_id');
        session()->forget('srch_member_region_id');
        session()->forget('srch_member_city_id');
        session()->forget('srch_member_status_id');
        session()->forget('srch_member_status_reason_id');

        $regions = array(''=>'') + $this->regionRepository
            ->allRegions()
            ->pluck('description', 'id')
            ->all();

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $member_statuses = array(''=>'') + $this->member_statusRepository
            ->allMemberStatuses()
            ->pluck('description', 'id')
            ->all();

        $member_status_reasons = $this->member_status_reasonRepository
            ->allMemberStatusReasons()
            ->pluck('description', 'id')
            ->all();

        $plans = array(''=>'') + $this->planRepository
            ->allPlans()
            ->pluck('description', 'id')
            ->all();

        $genders = array(''=>'') + $this->genderRepository
            ->allGenders()
            ->pluck('description', 'id')
            ->all();

        $banks = array(''=>'') + $this->bankRepository
            ->allBanks()
            ->pluck('description', 'id')
            ->all();

        return view('members.search', compact('regions', 'cities', 'member_statuses', 'member_status_reasons', 'plans', 'genders', 'banks'));
    }

    public function search_results(Requests\MemberSearchRequest $request)
    { 
        $data = $request->all();

        $request->flash();

        session(['srch_member_code' => $data['srch_member_code']]);
        session(['srch_member_cpf' => $data['srch_member_cpf']]);
        session(['srch_member_name' => $data['srch_member_name']]);
        session(['srch_member_plan_id' => $data['srch_member_plan_id']]);
        session(['srch_member_gender_id' => $data['srch_member_gender_id']]);
        session(['srch_member_region_id' => $data['srch_member_region_id']]);
        session(['srch_member_city_id' => $data['srch_member_city_id']]);
        session(['srch_member_status_id' => $data['srch_member_status_id']]);

        isset($data['srch_member_status_reason_id']) ? session(['srch_member_status_reason_id' => $data['srch_member_status_reason_id']]) : null;
        
        $members = $this->memberRepository->searchMembers();

        return view('members.search_results', compact('members'));
    }

    public function search_results_back()
    { 
        $members = $this->memberRepository->searchMembers();

        return view('members.search_results', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        $this->authorize('members-create');

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $member_statuses = array(''=>'') + $this->member_statusRepository
            ->allMemberStatuses()
            ->pluck('description', 'id')
            ->all();

        $member_status_reasons = $this->member_status_reasonRepository
            ->allMemberStatusReasons()
            ->pluck('description', 'id')
            ->all();

        $plans = array(''=>'') + $this->planRepository
            ->allPlans()
            ->pluck('description', 'id')
            ->all();

        $genders = array(''=>'') + $this->genderRepository
            ->allGenders()
            ->pluck('description', 'id')
            ->all();

        $banks = array(''=>'') + $this->bankRepository
            ->allBanks()
            ->pluck('description', 'id')
            ->all();

        return view('members.create', compact('cities', 'member_statuses', 'member_status_reasons', 'plans', 'genders', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\MemberRequest $request)
    {
        $data = $request->all();

        $data['name'] = strtoupper($data['name']);
        $data['address'] = strtoupper($data['address']);
        $data['neighborhood'] = strtoupper($data['neighborhood']);
        $data['comments'] = strtoupper($data['comments']);

        if($data['birthday'])
        {
            $data['birthday'] = \DateTime::createFromFormat('d/m/Y', $data['birthday']);
            $data['birthday'] = $data['birthday']->format('Y-m-d');
        }
        else
        {
            $data['birthday'] = null;
        }

        $data['date_aafc_ini'] = \DateTime::createFromFormat('d/m/Y', $data['date_aafc_ini']);
        $data['date_aafc_ini'] = $data['date_aafc_ini']->format('Y-m-d');

        if($data['date_aafc_fim'])
        {
            $data['date_aafc_fim'] = \DateTime::createFromFormat('d/m/Y', $data['date_aafc_fim']);
            $data['date_aafc_fim'] = $data['date_aafc_fim']->format('Y-m-d');
        }
        else
        {
            $data['date_aafc_fim'] = null;
        }

        if ($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = $id.'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/members/' . $filename));

            $data['avatar'] = $filename;
        }
        
        $member = $this->memberRepository->storeMember($data);
        
        $member = $this->memberRepository->allMembersById()->last();
        #$logs = $member->revisionHistory;
        
        return redirect()->route('members.show', ['id' => $member->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
        $this->authorize('members-show');

        $member = $this->memberRepository->findMemberById($id);

        $logs = $member->revisionHistory;
        
        return view('members.show', compact('member', 'logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    { 
        $this->authorize('members-edit');

        $cities = $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $member_statuses = $this->member_statusRepository
            ->allMemberStatuses()
            ->pluck('description', 'id')
            ->all();

        $member_status_reasons = $this->member_status_reasonRepository
            ->allMemberStatusReasons()
            ->pluck('description', 'id')
            ->all();

        $plans = $this->planRepository
            ->allPlans()
            ->pluck('description', 'id')
            ->all();

        $genders = $this->genderRepository
            ->allGenders()
            ->pluck('description', 'id')
            ->all();

        $banks = $this->bankRepository
            ->allBanks()
            ->pluck('description', 'id')
            ->all();
        
        $member = $this->memberRepository->findMemberById($id);

        return view('members.edit', compact('member', 'cities', 'member_statuses', 'member_status_reasons', 'plans', 'genders', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\MemberRequest $request, $id)
    {
        $data = $request->all();

        $data['name'] = strtoupper($data['name']);
        $data['address'] = strtoupper($data['address']);
        $data['neighborhood'] = strtoupper($data['neighborhood']);
        $data['comments'] = strtoupper($data['comments']);

        #dd($data['comments']);

        if($data['birthday'])
        {
            $data['birthday'] = \DateTime::createFromFormat('d/m/Y', $data['birthday']);
            $data['birthday'] = $data['birthday']->format('Y-m-d');
        }
        else
        {
            $data['birthday'] = null;
        }

        if($data['date_aafc_ini'])
        {
            $data['date_aafc_ini'] = \DateTime::createFromFormat('d/m/Y', $data['date_aafc_ini']);
            $data['date_aafc_ini'] = $data['date_aafc_ini']->format('Y-m-d');
        }
        else
        {
            $data['date_aafc_ini'] = null;
        }

        if($data['date_aafc_fim'])
        {
            $data['date_aafc_fim'] = \DateTime::createFromFormat('d/m/Y', $data['date_aafc_fim']);
            $data['date_aafc_fim'] = $data['date_aafc_fim']->format('Y-m-d');
        }
        else
        {
            $data['date_aafc_fim'] = null;
        }
        
        #dd($data);

        if ($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = $id.'.'.$avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/members/' . $filename));

            $data['avatar'] = $filename;
        }

        $member = $this->memberRepository->findMemberById($id);
        $member->update($data);

        #$logs = $member->revisionHistory;
        
        return redirect()->route('members.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('members-destroy');

        $this->memberRepository->findMemberById($id)->delete();

        return redirect('members');
    }

    public function city($id)
    {
        $members = $this->memberRepository->allMembersByCityId($id);
        
        return response()->json($members);
    }
}