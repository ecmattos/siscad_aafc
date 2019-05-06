<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;

use SisCad\Repositories\MeetingRepository;
use SisCad\Repositories\MeetingMemberRepository;
use SisCad\Repositories\MeetingTypeRepository;
use SisCad\Repositories\MemberRepository;
use SisCad\Repositories\CityRepository;

use SisCad\Repositories\MeetingEmployeeRepository;
use SisCad\Repositories\EmployeeRepository;

use SisCad\Repositories\MeetingPartnerRepository;
use SisCad\Repositories\PartnerRepository;

/**
 * Class MeetingMembersController.
 *
 * @package namespace SisCad\Http\Controllers;
 */
class MeetingMembersController extends Controller
{
    /**
     * @var MeetingMemberRepository
     */
    protected $meetingRepository;
    protected $meeting_memberRepository;
    protected $meeting_typeRepository;
    protected $cityRepository;
    protected $memberRepository;

    protected $meeting_employeeRepository;
    protected $employeeRepository;

    protected $meeting_partnerRepository;
    protected $partnerRepository;

    public function __construct(
        MeetingMemberRepository $meeting_memberRepository, 
        MeetingRepository $meetingRepository, 
        MeetingTypeRepository $meeting_typeRepository, 
        CityRepository $cityRepository, 
        MemberRepository $memberRepository,
        
        MeetingEmployeeRepository $meeting_employeeRepository,
        EmployeeRepository $employeeRepository,

        MeetingPartnerRepository $meeting_partnerRepository,
        PartnerRepository $partnerRepository)
    {
        $this->meeting_memberRepository = $meeting_memberRepository;
        $this->meetingRepository = $meetingRepository;
        $this->meeting_typeRepository = $meeting_typeRepository;
        $this->cityRepository = $cityRepository;
        $this->memberRepository = $memberRepository;
        
        $this->meeting_employeeRepository = $meeting_employeeRepository;
        $this->employeeRepository = $employeeRepository;

        $this->meeting_partnerRepository = $meeting_partnerRepository;
        $this->partnerRepository = $partnerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meeting_members = $this->meeting_memberRepository->allMeetingMembers();

        #return view('meeting_members.index', compact('meeting_members'));
    }

    public function create($id)
    { 
        $this->authorize('meeting_members-create');
        
        $meeting = $this->meetingRepository->findMeetingById($id);
        $meeting_types = $this->meeting_typeRepository->allMeetingTypes();
        
        $meeting_members = $this->meeting_memberRepository->allMembersByMeetingId($meeting->id);
        
        $members =  array(''=>'') + $this->memberRepository->allMembers()
            ->pluck('name', 'id')
            ->all();
    
        $cities = $this->cityRepository->allCities();

        $meeting_members_expected_qty = $this->meeting_memberRepository->countMembersExpectedQtyByMeetingId($id);
        $meeting_members_expected_qty_companion = $this->meeting_memberRepository->countMembersExpectedQtyCompanionByMeetingId($id);
        $meeting_members_expected_qty_companion_extra = $this->meeting_memberRepository->countMembersExpectedQtyCompanionExtraByMeetingId($id);

        $meeting_members_expected_qty_total = $meeting_members_expected_qty + $meeting_members_expected_qty_companion + $meeting_members_expected_qty_companion_extra;

        $meeting_members_confirmed_qty = $this->meeting_memberRepository->countMembersConfirmedQtyByMeetingId($id);
        $meeting_members_confirmed_qty_companion = $this->meeting_memberRepository->countMembersConfirmedQtyCompanionByMeetingId($id);
        $meeting_members_confirmed_qty_companion_extra = $this->meeting_memberRepository->countMembersConfirmedQtyCompanionExtraByMeetingId($id);

        $meeting_members_confirmed_qty_total = $meeting_members_confirmed_qty + $meeting_members_confirmed_qty_companion + $meeting_members_confirmed_qty_companion_extra;

        return view('meetings.members.create', compact('meeting_members', 'members', 'meeting', 'meeting_types', 'cities', 'meeting_members_expected_qty', 'meeting_members_expected_qty_companion', 'meeting_members_expected_qty_companion_extra', 'meeting_members_expected_qty_total', 'meeting_members_confirmed_qty', 'meeting_members_confirmed_qty_companion', 'meeting_members_confirmed_qty_companion_extra', 'meeting_members_confirmed_qty_total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MeetingMemberCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        if ($data['expected_qty'] == null)
        {
            $data['expected_qty'] = 0;
        }

        if ($data['expected_qty_companion'] == null)
        {
            $data['expected_qty_companion'] = 0;
        }

        if ($data['expected_qty_companion_extra'] == null)
        {
            $data['expected_qty_companion_extra'] = 0;
        }
        
        if ($data['confirmed_qty'] == null)
        {
            $data['confirmed_qty'] = 0;
        }

        if ($data['confirmed_qty_companion'] == null)
        {
            $data['confirmed_qty_companion'] = 0;
        }

        if ($data['confirmed_qty_companion_extra'] == null)
        {
            $data['confirmed_qty_companion_extra'] = 0;
        }

        if (($data['expected_qty'] == 1) || ($data['confirmed_qty'] == 1))
        {
            $data['checked'] = 1;
        }
        
        #dd($data);
        $this->meeting_memberRepository->storeMeetingMember($data);

        $meeting_member = $this->meeting_memberRepository->lastMeetingMember();

        return redirect()->route('meeting_members.show', ['id' => $meeting_member->meeting_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #==========================================================================================
        # 1. Members
        #==========================================================================================
        $meeting_member = $this->meeting_memberRepository->findMeetingMemberById($id);
        $meeting = $this->meetingRepository->findMeetingById($meeting_member->meeting_id);
        $meeting_members = $this->meeting_memberRepository->allMembersByMeetingId($meeting->id);

        $meeting_members_expected_qty = $this->meeting_memberRepository->countMembersExpectedQtyByMeetingId($meeting->id);
        $meeting_members_expected_qty_companion = $this->meeting_memberRepository->countMembersExpectedQtyCompanionByMeetingId($meeting->id);
        $meeting_members_expected_qty_companion_extra = $this->meeting_memberRepository->countMembersExpectedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_members_expected_qty_total = $meeting_members_expected_qty + $meeting_members_expected_qty_companion + $meeting_members_expected_qty_companion_extra;

        $meeting_members_confirmed_qty = $this->meeting_memberRepository->countMembersConfirmedQtyByMeetingId($meeting->id);
        $meeting_members_confirmed_qty_companion = $this->meeting_memberRepository->countMembersConfirmedQtyCompanionByMeetingId($meeting->id);
        $meeting_members_confirmed_qty_companion_extra = $this->meeting_memberRepository->countMembersConfirmedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_members_confirmed_qty_total = $meeting_members_confirmed_qty + $meeting_members_confirmed_qty_companion + $meeting_members_confirmed_qty_companion_extra;

        
        #==========================================================================================
        # 2. Employeess
        #==========================================================================================
        $meeting_employee = $this->meeting_employeeRepository->findMeetingEmployeeById($meeting->id);
        $meeting_employees = $this->meeting_employeeRepository->allEmployeesByMeetingId($meeting->id);

        $meeting_employees_expected_qty = $this->meeting_employeeRepository->countEmployeesExpectedQtyByMeetingId($meeting->id);
        $meeting_employees_expected_qty_companion = $this->meeting_employeeRepository->countEmployeesExpectedQtyCompanionByMeetingId($meeting->id);
        $meeting_employees_expected_qty_companion_extra = $this->meeting_employeeRepository->countEmployeesExpectedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_employees_expected_qty_total = $meeting_employees_expected_qty + $meeting_employees_expected_qty_companion + $meeting_employees_expected_qty_companion_extra;

        $meeting_employees_confirmed_qty = $this->meeting_employeeRepository->countEmployeesConfirmedQtyByMeetingId($meeting->id);
        $meeting_employees_confirmed_qty_companion = $this->meeting_employeeRepository->countEmployeesConfirmedQtyCompanionByMeetingId($meeting->id);
        $meeting_employees_confirmed_qty_companion_extra = $this->meeting_employeeRepository->countEmployeesConfirmedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_employees_confirmed_qty_total = $meeting_employees_confirmed_qty + $meeting_employees_confirmed_qty_companion + $meeting_employees_confirmed_qty_companion_extra;


        #==========================================================================================
        # 3. Partners
        #==========================================================================================
        $meeting_partner = $this->meeting_partnerRepository->findMeetingPartnerById($meeting->id);
        $meeting_partners = $this->meeting_partnerRepository->allPartnersByMeetingId($meeting->id);

        $meeting_partners_expected_qty = $this->meeting_partnerRepository->countPartnersExpectedQtyByMeetingId($meeting->id);
        $meeting_partners_expected_qty_companion = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionByMeetingId($meeting->id);
        $meeting_partners_expected_qty_companion_extra = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_partners_expected_qty_total = $meeting_partners_expected_qty + $meeting_partners_expected_qty_companion + $meeting_partners_expected_qty_companion_extra;

        $meeting_partners_confirmed_qty = $this->meeting_partnerRepository->countPartnersConfirmedQtyByMeetingId($meeting->id);
        $meeting_partners_confirmed_qty_companion = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionByMeetingId($meeting->id);
        $meeting_partners_confirmed_qty_companion_extra = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_partners_confirmed_qty_total = $meeting_partners_confirmed_qty + $meeting_partners_confirmed_qty_companion + $meeting_partners_confirmed_qty_companion_extra;


        return view('meetings.members.show', compact(
            'meeting', 
            'meeting_member', 
            'meeting_members', 
            'meeting_members_expected_qty', 
            'meeting_members_expected_qty_companion', 
            'meeting_members_expected_qty_companion_extra', 
            'meeting_members_expected_qty_total', 
            'meeting_members_confirmed_qty', 
            'meeting_members_confirmed_qty_companion', 
            'meeting_members_confirmed_qty_companion_extra', 
            'meeting_members_confirmed_qty_total',
        
            'meeting_employee', 
            'meeting_employees', 
            'meeting_employees_expected_qty', 
            'meeting_employees_expected_qty_companion', 
            'meeting_employees_expected_qty_companion_extra', 
            'meeting_employees_expected_qty_total', 
            'meeting_employees_confirmed_qty', 
            'meeting_employees_confirmed_qty_companion', 
            'meeting_employees_confirmed_qty_companion_extra', 
            'meeting_employees_confirmed_qty_total',
        
            'meeting_partner', 
            'meeting_partners', 
            'meeting_partners_expected_qty', 
            'meeting_partners_expected_qty_companion', 
            'meeting_partners_expected_qty_companion_extra', 
            'meeting_partners_expected_qty_total', 
            'meeting_partners_confirmed_qty', 
            'meeting_partners_confirmed_qty_companion', 
            'meeting_partners_confirmed_qty_companion_extra', 
            'meeting_partners_confirmed_qty_total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('meeting_members-edit');
        
        $meeting_member = $this->meeting_memberRepository->findMeetingMemberById($id);
        #dd($meeting_member);
        $meeting_members = $this->meeting_memberRepository->allMembersByMeetingId($meeting_member->meeting_id);
        $members =  $this->memberRepository->findMemberById($meeting_member->member_id)
            ->pluck('name', 'id')
            ->all();
        #dd($members);

        $meeting = $this->meetingRepository->findMeetingById($meeting_member->meeting_id);
        $meeting_types = $this->meeting_typeRepository->allMeetingTypes();
        $cities = $this->cityRepository->allCities();

        $meeting_members_expected_qty = $this->meeting_memberRepository->countMembersExpectedQtyByMeetingId($id);
        $meeting_members_expected_qty_companion = $this->meeting_memberRepository->countMembersExpectedQtyCompanionByMeetingId($id);
        $meeting_members_expected_qty_companion_extra = $this->meeting_memberRepository->countMembersExpectedQtyCompanionExtraByMeetingId($id);

        $meeting_members_expected_qty_total = $meeting_members_expected_qty + $meeting_members_expected_qty_companion + $meeting_members_expected_qty_companion_extra;

        $meeting_members_confirmed_qty = $this->meeting_memberRepository->countMembersConfirmedQtyByMeetingId($id);
        $meeting_members_confirmed_qty_companion = $this->meeting_memberRepository->countMembersConfirmedQtyCompanionByMeetingId($id);
        $meeting_members_confirmed_qty_companion_extra = $this->meeting_memberRepository->countMembersConfirmedQtyCompanionExtraByMeetingId($id);

        $meeting_members_confirmed_qty_total = $meeting_members_confirmed_qty + $meeting_members_confirmed_qty_companion + $meeting_members_confirmed_qty_companion_extra;

        return view('meetings.members.edit', compact('meeting_member', 'meeting_members', 'members', 'meeting', 'meeting_types', 'cities', 'meeting_members_expected_qty', 'meeting_members_expected_qty_companion', 'meeting_members_expected_qty_companion_extra', 'meeting_members_expected_qty_total', 'meeting_members_confirmed_qty', 'meeting_members_confirmed_qty_companion', 'meeting_members_confirmed_qty_companion_extra', 'meeting_members_confirmed_qty_total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MeetingMemberUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if($data['expected_qty'] == 0)
        {
            $data['expected_qty_companion'] = 0;
            $data['expected_qty_companion_extra'] = 0;
        }

        if($data['confirmed_qty'] == 0)
        {
            $data['confirmed_qty_companion'] = 0;
            $data['confirmed_qty_companion_extra'] = 0;
        }

        if ($data['expected_qty'] == 1)
        {
            $data['checked'] = 1;
        }

        $meeting_member = $this->meeting_memberRepository->findMeetingMemberById($id);

        $meeting_member->update($data);

        return redirect()->route('meeting_members.show', ['id' => $id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('meeting_members-destroy');
        
        $meeting_member = $this->meeting_memberRepository->findMeetingMemberById($id);
        
        $this->meeting_memberRepository->findMeetingMemberById($id)->delete();
                
        return redirect()->route('meetings.show', ['id' => $meeting_member->meeting_id]);
    }
}
