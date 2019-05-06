<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\MeetingRepository;
use SisCad\Repositories\MeetingMemberRepository;
use SisCad\Repositories\MeetingTypeRepository;
use SisCad\Repositories\MeetingStatusRepository;
use SisCad\Repositories\MemberRepository;
use SisCad\Repositories\CityRepository;

use SisCad\Repositories\MeetingEmployeeRepository;
use SisCad\Repositories\EmployeeRepository;

use SisCad\Repositories\MeetingPartnerRepository;
use SisCad\Repositories\PartnerRepository;

/**
 * Class MeetingPartnersController.
 *
 * @package namespace SisCad\Http\Controllers;
 */
class MeetingPartnersController extends Controller
{
    /**
     * @var MeetingPartnerRepository
     */
    private $meetingRepository;
    private $meeting_memberRepository;
    private $meeting_typeRepository;
    private $meeting_statusRepository;
    private $memberRepository;
    private $cityRepository;

    protected $meeting_employeeRepository;
    protected $employeeRepository;

    protected $meeting_partnerRepository;
    protected $partnerRepository;

    public function __construct(
        MeetingRepository $meetingRepository, 
        MeetingMemberRepository $meeting_memberRepository, 
        MeetingTypeRepository $meeting_typeRepository, 
        MeetingStatusRepository $meeting_statusRepository, 
        MemberRepository $memberRepository,  
        CityRepository $cityRepository,
        
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
        $this->authorize('meeting_partners-create');
        
        $meeting = $this->meetingRepository->findMeetingById($id);
        $meeting_types = $this->meeting_typeRepository->allMeetingTypes();
        
        $meeting_partners = $this->meeting_partnerRepository->allPartnersByMeetingId($meeting->id);
        
        $partners =  array(''=>'') + $this->partnerRepository->allPartners()
            ->pluck('name', 'id')
            ->all();
    
        $cities = $this->cityRepository->allCities();

        $meeting_partners_expected_qty = $this->meeting_partnerRepository->countPartnersExpectedQtyByMeetingId($id);
        $meeting_partners_expected_qty_companion = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionByMeetingId($id);
        $meeting_partners_expected_qty_companion_extra = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionExtraByMeetingId($id);

        $meeting_partners_expected_qty_total = $meeting_partners_expected_qty + $meeting_partners_expected_qty_companion + $meeting_partners_expected_qty_companion_extra;

        $meeting_partners_confirmed_qty = $this->meeting_partnerRepository->countPartnersConfirmedQtyByMeetingId($id);
        $meeting_partners_confirmed_qty_companion = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionByMeetingId($id);
        $meeting_partners_confirmed_qty_companion_extra = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionExtraByMeetingId($id);

        $meeting_partners_confirmed_qty_total = $meeting_partners_confirmed_qty + $meeting_partners_confirmed_qty_companion + $meeting_partners_confirmed_qty_companion_extra;

        return view('meetings.partners.create', compact(
            'meeting',
            'meeting_types',
            'cities',
            'meeting_partners', 
            'partners',
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
        $this->meeting_partnerRepository->storeMeetingPartner($data);

        $meeting_partner = $this->meeting_partnerRepository->lastMeetingPartner();

        return redirect()->route('meeting_partners.show', ['id' => $meeting_partner->id]);
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
        # 1. Partners
        #==========================================================================================
        $meeting_partner = $this->meeting_partnerRepository->findMeetingPartnerById($id);
        $meeting = $this->meetingRepository->findMeetingById($meeting_partner->meeting_id);
        $meeting_partners = $this->meeting_partnerRepository->allPartnersByMeetingId($meeting->id);

        $meeting_partners_expected_qty = $this->meeting_partnerRepository->countPartnersExpectedQtyByMeetingId($meeting->id);
        $meeting_partners_expected_qty_companion = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionByMeetingId($meeting->id);
        $meeting_partners_expected_qty_companion_extra = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_partners_expected_qty_total = $meeting_partners_expected_qty + $meeting_partners_expected_qty_companion + $meeting_partners_expected_qty_companion_extra;

        $meeting_partners_confirmed_qty = $this->meeting_partnerRepository->countPartnersConfirmedQtyByMeetingId($meeting->id);
        $meeting_partners_confirmed_qty_companion = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionByMeetingId($meeting->id);
        $meeting_partners_confirmed_qty_companion_extra = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_partners_confirmed_qty_total = $meeting_partners_confirmed_qty + $meeting_partners_confirmed_qty_companion + $meeting_partners_confirmed_qty_companion_extra;


        #==========================================================================================
        # 2. Employees
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
        # 3. Members
        #==========================================================================================
        $meeting_member = $this->meeting_memberRepository->findMeetingMemberById($id);
        $meeting_members = $this->meeting_memberRepository->allMembersByMeetingId($meeting->id);

        $meeting_members_expected_qty = $this->meeting_memberRepository->countMembersExpectedQtyByMeetingId($meeting->id);
        $meeting_members_expected_qty_companion = $this->meeting_memberRepository->countMembersExpectedQtyCompanionByMeetingId($meeting->id);
        $meeting_members_expected_qty_companion_extra = $this->meeting_memberRepository->countMembersExpectedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_members_expected_qty_total = $meeting_members_expected_qty + $meeting_members_expected_qty_companion + $meeting_members_expected_qty_companion_extra;

        $meeting_members_confirmed_qty = $this->meeting_memberRepository->countMembersConfirmedQtyByMeetingId($meeting->id);
        $meeting_members_confirmed_qty_companion = $this->meeting_memberRepository->countMembersConfirmedQtyCompanionByMeetingId($meeting->id);
        $meeting_members_confirmed_qty_companion_extra = $this->meeting_memberRepository->countMembersConfirmedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_members_confirmed_qty_total = $meeting_members_confirmed_qty + $meeting_members_confirmed_qty_companion + $meeting_members_confirmed_qty_companion_extra;


        return view('meetings.partners.show', compact(
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
        $this->authorize('meeting_partners-edit');
        
        $meeting_partner = $this->meeting_partnerRepository->findMeetingPartnerById($id);
        #dd($meeting_partner);
        $meeting_partners = $this->meeting_partnerRepository->allPartnersByMeetingId($meeting_partner->meeting_id);
        $partners =  $this->partnerRepository->findPartnerById($meeting_partner->partner_id)
            ->pluck('name', 'id')
            ->all();
        #dd($partners);

        $meeting = $this->meetingRepository->findMeetingById($meeting_partner->meeting_id);
        $meeting_types = $this->meeting_typeRepository->allMeetingTypes();
        $cities = $this->cityRepository->allCities();

        $meeting_partners_expected_qty = $this->meeting_partnerRepository->countPartnersExpectedQtyByMeetingId($id);
        $meeting_partners_expected_qty_companion = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionByMeetingId($id);
        $meeting_partners_expected_qty_companion_extra = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionExtraByMeetingId($id);

        $meeting_partners_expected_qty_total = $meeting_partners_expected_qty + $meeting_partners_expected_qty_companion + $meeting_partners_expected_qty_companion_extra;

        $meeting_partners_confirmed_qty = $this->meeting_partnerRepository->countPartnersConfirmedQtyByMeetingId($id);
        $meeting_partners_confirmed_qty_companion = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionByMeetingId($id);
        $meeting_partners_confirmed_qty_companion_extra = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionExtraByMeetingId($id);

        $meeting_partners_confirmed_qty_total = $meeting_partners_confirmed_qty + $meeting_partners_confirmed_qty_companion + $meeting_partners_confirmed_qty_companion_extra;

        return view('meetings.partners.edit', compact(
            'meeting_partner', 
            'meeting_partners', 
            'partners', 
            'meeting', 
            'meeting_types', 
            'cities', 
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

        $meeting_partner = $this->meeting_partnerRepository->findMeetingPartnerById($id);

        $meeting_partner->update($data);

        return redirect()->route('meeting_partners.show', ['id' => $id]);       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('meeting_partners-destroy');
        
        $meeting_partner = $this->meeting_partnerRepository->findMeetingPartnerById($id);
        
        $this->meeting_partnerRepository->findMeetingPartnerById($id)->delete();
                
        return redirect()->route('meetings.show', ['id' => $meeting_partner->meeting_id]);
    }
}
