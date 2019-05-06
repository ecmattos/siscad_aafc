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
 * Class MeetingEmployeesController.
 *
 * @package namespace SisCad\Http\Controllers;
 */
class MeetingEmployeesController extends Controller
{
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
        PartnerRepository $partnerRepository
        )
    {
        $this->meetingRepository = $meetingRepository;
        $this->meeting_memberRepository = $meeting_memberRepository;
        $this->meeting_typeRepository = $meeting_typeRepository;
        $this->meeting_statusRepository = $meeting_statusRepository;
        $this->memberRepository = $memberRepository;
        $this->cityRepository = $cityRepository;

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
        $meeting_employees = $this->meeting_employeeRepository->allEmployeesByMeetingId(1);
        #dd($meeting_employees);

        #return view('meeting_employees.index', compact('meeting_employees'));
    }

    public function create($id)
    { 
        $this->authorize('meeting_employees-create');
        
        $meeting = $this->meetingRepository->findMeetingById($id);
        $meeting_types = $this->meeting_typeRepository->allMeetingTypes();
        
        $meeting_employees = $this->meeting_employeeRepository->allEmployeesByMeetingId($meeting->id);
        
        $employees =  array(''=>'') + $this->employeeRepository->allEmployees()
            ->pluck('name', 'id')
            ->all();
    
        $cities = $this->cityRepository->allCities();

        $meeting_employees_expected_qty = $this->meeting_employeeRepository->countEmployeesExpectedQtyByMeetingId($id);
        $meeting_employees_expected_qty_companion = $this->meeting_employeeRepository->countEmployeesExpectedQtyCompanionByMeetingId($id);
        $meeting_employees_expected_qty_companion_extra = $this->meeting_employeeRepository->countEmployeesExpectedQtyCompanionExtraByMeetingId($id);

        $meeting_employees_expected_qty_total = $meeting_employees_expected_qty + $meeting_employees_expected_qty_companion + $meeting_employees_expected_qty_companion_extra;

        $meeting_employees_confirmed_qty = $this->meeting_employeeRepository->countEmployeesConfirmedQtyByMeetingId($id);
        $meeting_employees_confirmed_qty_companion = $this->meeting_employeeRepository->countEmployeesConfirmedQtyCompanionByMeetingId($id);
        $meeting_employees_confirmed_qty_companion_extra = $this->meeting_employeeRepository->countEmployeesConfirmedQtyCompanionExtraByMeetingId($id);

        $meeting_employees_confirmed_qty_total = $meeting_employees_confirmed_qty + $meeting_employees_confirmed_qty_companion + $meeting_employees_confirmed_qty_companion_extra;

        return view('meetings.employees.create', compact('meeting_employees', 'employees', 'meeting', 'meeting_types', 'cities', 'meeting_employees_expected_qty', 'meeting_employees_expected_qty_companion', 'meeting_employees_expected_qty_companion_extra', 'meeting_employees_expected_qty_total', 'meeting_employees_confirmed_qty', 'meeting_employees_confirmed_qty_companion', 'meeting_employees_confirmed_qty_companion_extra', 'meeting_employees_confirmed_qty_total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MeetingEmployeeCreateRequest $request
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
        $this->meeting_employeeRepository->storeMeetingEmployee($data);

        $meeting_employee = $this->meeting_employeeRepository->lastMeetingEmployee();

        return redirect()->route('meeting_employees.show', ['id' => $meeting_employee->id]);
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
        # 1. Employees
        #==========================================================================================
        $meeting_employee = $this->meeting_employeeRepository->findMeetingEmployeeById($id);
        $meeting = $this->meetingRepository->findMeetingById($meeting_employee->meeting_id);
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
        # 2. Members
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


        #==========================================================================================
        # 3. Partners
        #==========================================================================================
        $meeting_partner = $this->meeting_partnerRepository->findMeetingPartnerById($id);
        $meeting_partners = $this->meeting_partnerRepository->allPartnersByMeetingId($meeting->id);

        $meeting_partners_expected_qty = $this->meeting_partnerRepository->countPartnersExpectedQtyByMeetingId($meeting->id);
        $meeting_partners_expected_qty_companion = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionByMeetingId($meeting->id);
        $meeting_partners_expected_qty_companion_extra = $this->meeting_partnerRepository->countPartnersExpectedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_partners_expected_qty_total = $meeting_partners_expected_qty + $meeting_partners_expected_qty_companion + $meeting_partners_expected_qty_companion_extra;

        $meeting_partners_confirmed_qty = $this->meeting_partnerRepository->countPartnersConfirmedQtyByMeetingId($meeting->id);
        $meeting_partners_confirmed_qty_companion = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionByMeetingId($meeting->id);
        $meeting_partners_confirmed_qty_companion_extra = $this->meeting_partnerRepository->countPartnersConfirmedQtyCompanionExtraByMeetingId($meeting->id);

        $meeting_partners_confirmed_qty_total = $meeting_partners_confirmed_qty + $meeting_partners_confirmed_qty_companion + $meeting_partners_confirmed_qty_companion_extra;


        return view('meetings.employees.show', compact(
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
        $this->authorize('meeting_employees-edit');
        
        $meeting_employee = $this->meeting_employeeRepository->findMeetingEmployeeById($id);
        #dd($meeting_employee);
        $meeting_employees = $this->meeting_employeeRepository->allEmployeesByMeetingId($meeting_employee->meeting_id);
        $employees =  $this->employeeRepository->findEmployeeById($meeting_employee->employee_id)
            ->pluck('name', 'id')
            ->all();
        #dd($employees);

        $meeting = $this->meetingRepository->findMeetingById($meeting_employee->meeting_id);
        $meeting_types = $this->meeting_typeRepository->allMeetingTypes();
        $cities = $this->cityRepository->allCities();

        $meeting_employees_expected_qty = $this->meeting_employeeRepository->countEmployeesExpectedQtyByMeetingId($id);
        $meeting_employees_expected_qty_companion = $this->meeting_employeeRepository->countEmployeesExpectedQtyCompanionByMeetingId($id);
        $meeting_employees_expected_qty_companion_extra = $this->meeting_employeeRepository->countEmployeesExpectedQtyCompanionExtraByMeetingId($id);

        $meeting_employees_expected_qty_total = $meeting_employees_expected_qty + $meeting_employees_expected_qty_companion + $meeting_employees_expected_qty_companion_extra;

        $meeting_employees_confirmed_qty = $this->meeting_employeeRepository->countEmployeesConfirmedQtyByMeetingId($id);
        $meeting_employees_confirmed_qty_companion = $this->meeting_employeeRepository->countEmployeesConfirmedQtyCompanionByMeetingId($id);
        $meeting_employees_confirmed_qty_companion_extra = $this->meeting_employeeRepository->countEmployeesConfirmedQtyCompanionExtraByMeetingId($id);

        $meeting_employees_confirmed_qty_total = $meeting_employees_confirmed_qty + $meeting_employees_confirmed_qty_companion + $meeting_employees_confirmed_qty_companion_extra;

        return view('meetings.employees.edit', compact('meeting_employee', 'meeting_employees', 'employees', 'meeting', 'meeting_types', 'cities', 'meeting_employees_expected_qty', 'meeting_employees_expected_qty_companion', 'meeting_employees_expected_qty_companion_extra', 'meeting_employees_expected_qty_total', 'meeting_employees_confirmed_qty', 'meeting_employees_confirmed_qty_companion', 'meeting_employees_confirmed_qty_companion_extra', 'meeting_employees_confirmed_qty_total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MeetingEmployeeUpdateRequest $request
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

        $meeting_employee = $this->meeting_employeeRepository->findMeetingEmployeeById($id);

        $meeting_employee->update($data);

        return redirect()->route('meeting_employees.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize('meeting_employees-destroy');
        
        $meeting_employee = $this->meeting_employeeRepository->findMeetingEmployeeById($id);
        
        $this->meeting_employeeRepository->findMeetingEmployeeById($id)->delete();
                
        return redirect()->route('meetings.show', ['id' => $meeting_employee->meeting_id]);
    }
}
