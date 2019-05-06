<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;
use File;

use JasperPHP\JasperPHP as JasperPHP;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;
use SisCad\Repositories\EmployeeStatusRepository;
use SisCad\Repositories\EmployeeStatusReasonRepository;
use SisCad\Repositories\RegionRepository;
use SisCad\Repositories\CityRepository;
use SisCad\Repositories\EmployeeRepository;
use SisCad\Repositories\GenderRepository;
use SisCad\Repositories\ManagementUnitRepository;
use SisCad\Repositories\CompanySectorRepository;
use SisCad\Repositories\CompanySubSectorRepository;
use SisCad\Repositories\CompanyPositionRepository;
use SisCad\Repositories\CompanyResponsibilityRepository;
use SisCad\Repositories\EmployeeMovementRepository;
use SisCad\Repositories\PatrimonialRepository;


use SisCad\Services\EmployeeMovementService;


class EmployeesController extends Controller
{
    private $regionRepository;
    private $cityRepository;
    private $employeeRepository;
    private $employee_statusRepository;
    private $employee_status_reasonRepository;
    private $genderRepository;
    private $management_unitRepository;
    private $company_sectorRepository;
    private $company_sub_sectorRepository;
    private $company_positionRepository;
    private $company_responsibilityRepository;
    private $employee_movementRepository;
    private $patrimonialRepository;

    private $employee_movementService;

    public function __construct(
        RegionRepository $regionRepository, 
        CityRepository $cityRepository, 
        EmployeeRepository $employeeRepository, 
        EmployeeStatusRepository $employee_statusRepository, 
        EmployeeStatusReasonRepository $employee_status_reasonRepository, 
        GenderRepository $genderRepository, 
        ManagementUnitRepository $management_unitRepository, 
        CompanySectorRepository $company_sectorRepository, 
        CompanySubSectorRepository $company_sub_sectorRepository, 
        CompanyPositionRepository $company_positionRepository, 
        CompanyResponsibilityRepository $company_responsibilityRepository, 
        EmployeeMovementRepository $employee_movementRepository,
        PatrimonialRepository $patrimonialRepository, 
        EmployeeMovementService $employee_movementService)
    {
        $this->regionRepository = $regionRepository;
        $this->cityRepository = $cityRepository;
        $this->employeeRepository = $employeeRepository;
        $this->employee_statusRepository = $employee_statusRepository;
        $this->employee_status_reasonRepository = $employee_status_reasonRepository;
        $this->genderRepository = $genderRepository;
        $this->management_unitRepository = $management_unitRepository;
        $this->company_sectorRepository = $company_sectorRepository;
        $this->company_sub_sectorRepository = $company_sub_sectorRepository;
        $this->company_positionRepository = $company_positionRepository;
        $this->company_responsibilityRepository = $company_responsibilityRepository;
        $this->employee_movementRepository = $employee_movementRepository;
        $this->patrimonialRepository = $patrimonialRepository;

        $this->employee_movementService = $employee_movementService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function search()
    { 
        ##$this->authorize('employees-search');

        session()->forget('srch_employee_code');
        session()->forget('srch_employee_cpf');
        session()->forget('srch_employee_name');
        session()->forget('srch_employee_gender_id');
        session()->forget('srch_employee_region_id');
        session()->forget('srch_employee_city_id');
        session()->forget('srch_employee_status_id');
        session()->forget('srch_employee_status_reason_id');

        $regions = array(''=>'') + $this->regionRepository
            ->allRegions()
            ->pluck('description', 'id')
            ->all();

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $employee_statuses = array(''=>'') + $this->employee_statusRepository
            ->allEmployeeStatuses()
            ->pluck('description', 'id')
            ->all();

        $employee_status_reasons = array(''=>'') + $this->employee_status_reasonRepository
            ->allEmployeeStatusReasons()
            ->pluck('description', 'id')
            ->all();

        $genders = array(''=>'') + $this->genderRepository
            ->allGenders()
            ->pluck('description', 'id')
            ->all();

        return view('employees.search', compact('regions', 'cities', 'employee_statuses', 'employee_status_reasons', 'genders'));
    }

    public function search_results(Requests\EmployeeSearchRequest $request)
    { 
        $data = $request->all();

        $request->flash();

        session(['srch_employee_code' => $data['srch_employee_code']]);
        session(['srch_employee_cpf' => $data['srch_employee_cpf']]);
        session(['srch_employee_name' => $data['srch_employee_name']]);
        session(['srch_employee_gender_id' => $data['srch_employee_gender_id']]);
        session(['srch_employee_region_id' => $data['srch_employee_region_id']]);
        session(['srch_employee_city_id' => $data['srch_employee_city_id']]);
        session(['srch_employee_status_id' => $data['srch_employee_status_id']]);
        session(['srch_employee_status_reason_id' => $data['srch_employee_status_reason_id']]);

        $employees = $this->employeeRepository->searchEmployees();

        return view('employees.search_results', compact('employees'));
    }

    public function search_results_back()
    { 
        $employees = $this->employeeRepository->searchEmployees();

        return view('employees.search_results', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    { 
        ##$this->authorize('employees-create');

        $cities = array(''=>'') + $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $employee_statuses = array(''=>'') + $this->employee_statusRepository
            ->allEmployeeStatuses()
            ->pluck('description', 'id')
            ->all();

        $employee_status_reasons = $this->employee_status_reasonRepository
            ->allEmployeeStatusReasons()
            ->pluck('description', 'id')
            ->all();

        $genders = array(''=>'') + $this->genderRepository
            ->allGenders()
            ->pluck('description', 'id')
            ->all();

        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_positions = array(''=>'') + $this->company_positionRepository
            ->allCompanyPositions()
            ->pluck('description', 'id')
            ->all();

        $company_responsibilities = array(''=>'') + $this->company_responsibilityRepository
            ->allCompanyResponsibilities()
            ->pluck('description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        return view('employees.create', compact('cities', 'employee_statuses', 'employee_status_reasons', 'genders', 'management_units', 'company_positions', 'company_responsibilities', 'company_sectors', 'company_sub_sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\EmployeeRequest $request)
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

        $data['date_status'] = \DateTime::createFromFormat('d/m/Y', $data['date_start']);
        $data['date_status'] = $data['date_status']->format('Y-m-d');

        $employee = $this->employeeRepository->storeEmployee($data);

        $last_employee = $this->employeeRepository->allEmployeesById()->last();
        $data['employee_id'] = $last_employee->id;
        $data['date_start'] = $data['date_status'];

        $employee_movement = $this->employee_movementRepository->storeEmployeeMovement($data);
        
        return redirect()->route('employees.show', ['id' => $last_employee->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('employees-show');

        $employee = $this->employeeRepository->findEmployeeById($id);

         # Lista todas as movimentacoes
        $employee_movements = $this->employee_movementRepository->allEmployeeMovementsByEmployeeId($id);

        $employee_patrimonials  = $this->patrimonialRepository->allPatrimonialsByEmployeeId($id);
        
        
        #$logs = $employee->revisionHistory;
        
        return view('employees.show', compact('employee', 'employee_movements', 'employee_patrimonials'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    { 
        $this->authorize('employees-edit');

        $cities = $this->cityRepository
            ->allCities()
            ->pluck('description', 'id')
            ->all();

        $employee_statuses = $this->employee_statusRepository
            ->allEmployeeStatuses()
            ->pluck('description', 'id')
            ->all();

        $employee_status_reasons = $this->employee_status_reasonRepository
            ->allEmployeeStatusReasons()
            ->pluck('description', 'id')
            ->all();

        $genders = $this->genderRepository
            ->allGenders()
            ->pluck('description', 'id')
            ->all();

        $management_units = $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();
        
        $employee = $this->employeeRepository->findEmployeeById($id);

        return view('employees.edit', compact('employee', 'cities', 'employee_statuses', 'employee_status_reasons', 'genders', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\EmployeeUpdateRequest $request, $id)
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

        #dd($data);

        $employee = $this->employeeRepository->findEmployeeById($id);
        $employee->update($data);

        #$logs = $employee->revisionHistory;
        
        return redirect()->route('employees.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        #$this->employeeRepository->findEmployeeById($id)->delete();

        return redirect('employees');
    }

    public function start_movement($id)
    {
        $this->authorize('employees-start_movement');

        $employee_movement = $this->employee_movementRepository->findEmployeeMovementById($id);

        $employee_movements = $this->employee_movementRepository->allEmployeeMovementsByEmployeeId($employee_movement->employee_id);

        $employee = $this->employeeRepository->findEmployeeById($employee_movement->employee_id);

        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_positions = array(''=>'') + $this->company_positionRepository
            ->allCompanyPositions()
            ->pluck('description', 'id')
            ->all();

        $company_responsibilities = array(''=>'') + $this->company_responsibilityRepository
            ->allCompanyResponsibilities()
            ->pluck('description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        return view('employees.movements.start', compact('employee_movement', 'employee_movements', 'employee','management_units', 'company_positions', 'company_responsibilities', 'company_sectors', 'company_sub_sectors'));
    }
    
    public function store_movement($id, Requests\EmployeeMovementStartRequest $request)
    {
        $data = $request->all();

        $data['employee_id'] = $id;

        $data['date_start'] = \DateTime::createFromFormat('d/m/Y', $data['date_start']);
        $data['date_start'] = $data['date_start']->format('Y-m-d');

        $this->employee_movementService->store($data);
        
        return redirect()->route('employees.show', ['id' => $id]);
    }


    public function edit_movement($id)
    {
        $this->authorize('employees-edit_movement');

        $employee_movement = $this->employee_movementRepository->findEmployeeMovementById($id);

        $employee_movements = $this->employee_movementRepository->allEmployeeMovementsByEmployeeId($employee_movement->employee_id);

        $employee = $this->employeeRepository->findEmployeeById($employee_movement->employee_id);

        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_positions = array(''=>'') + $this->company_positionRepository
            ->allCompanyPositions()
            ->pluck('description', 'id')
            ->all();

        $company_responsibilities = array(''=>'') + $this->company_responsibilityRepository
            ->allCompanyResponsibilities()
            ->pluck('description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        if($employee_movement->date_end)
        {
            return view('employees.movements.end_edit', compact('employee_movement', 'employee_movements', 'employee','management_units', 'company_positions', 'company_responsibilities', 'company_sectors', 'company_sub_sectors'));
        }
        else
        {
            return view('employees.movements.start_edit', compact('employee_movement', 'employee_movements', 'employee','management_units', 'company_positions', 'company_responsibilities', 'company_sectors', 'company_sub_sectors'));
        }
    }

    public function start_movement_update($id, Requests\EmployeeMovementStartRequest $request)
    {
        $data = $request->all();

        $data['date_start'] = \DateTime::createFromFormat('d/m/Y', $data['date_start']);
        $data['date_start'] = $data['date_start']->format('Y-m-d');

        $employee_movement = $this->employee_movementRepository->findEmployeeMovementById($id);
        $data['employee_id'] = $employee_movement->employee_id;

        #$employee_movement->update($data);

        $this->employee_movementService->start_movement_update($id, $data);
        
        return redirect()->route('employees.show', ['id' => $employee_movement->employee_id]);
    }

    public function end_movement_edit($id)
    {
        #$this->authorize('employees-edit_movement');

        $employee_movement = $this->employee_movementRepository->findEmployeeMovementById($id);

        $employee_movements = $this->employee_movementRepository->allEmployeeMovementsByEmployeeId($employee_movement->employee_id);

        $employee = $this->employeeRepository->findEmployeeById($employee_movement->employee_id);

        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_positions = array(''=>'') + $this->company_positionRepository
            ->allCompanyPositions()
            ->pluck('description', 'id')
            ->all();

        $company_responsibilities = array(''=>'') + $this->company_responsibilityRepository
            ->allCompanyResponsibilities()
            ->pluck('description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        return view('employees.movements.end_edit', compact('employee_movement', 'employee_movements', 'employee','management_units', 'company_positions', 'company_responsibilities', 'company_sectors', 'company_sub_sectors'));
    }

    public function end_movement_update($id, Requests\EmployeeMovementEndRequest $request)
    {
        $data = $request->all();

        $data['date_start'] = \DateTime::createFromFormat('d/m/Y', $data['date_start']);
        $data['date_start'] = $data['date_start']->format('Y-m-d');

        $data['date_end'] = \DateTime::createFromFormat('d/m/Y', $data['date_end']);
        $data['date_end'] = $data['date_end']->format('Y-m-d');

        $employee_movement = $this->employee_movementRepository->findEmployeeMovementById($id);
        $data['employee_id'] = $employee_movement->employee_id;

        $this->employee_movementService->end_movement_update($id, $data);

        return redirect()->route('employees.show', ['id' => $employee_movement->employee_id]);
    }

    public function rpt_patrimonials($id)
    {
        #dd($id);

        $rpt_model                       = 'allPatrimonialsByEmployeeId';
        
        $database = \Config::get('database.connections.mysql');

        if($rpt_model=='allPatrimonialsByEmployeeId')
        {
            $output = public_path() . '/reports/patrimonials/allPatrimonialsByEmployeeId_'.date("Ymd_His");  
            $input = public_path() . '/reports/patrimonials/allPatrimonialsByEmployeeId.jrxml'; 

            $conditions = array("jsp_employee_id" => $id);
        }

        $ext = "pdf";
       
        $report = new JasperPHP;
        $report->process
        (
            $input, 
            $output, 
            array('pdf'),
            $conditions,
            $database  
        )->execute();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=allPatrimonialsByEmployeeId_'.date("Ymd_His").'.'.$ext);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($output.'.'.$ext));
        flush();
        readfile($output.'.'.$ext);
        unlink($output.'.'.$ext);
    }
}