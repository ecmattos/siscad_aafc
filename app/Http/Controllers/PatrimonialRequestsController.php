<?php

namespace SisCad\Http\Controllers;

use Illuminate\Http\Request;

use SisCad\Http\Requests;
use SisCad\Http\Controllers\Controller;

use JasperPHP\JasperPHP as JasperPHP;

use SisCad\Repositories\EmployeeRepository;
use SisCad\Repositories\ManagementUnitRepository;
use SisCad\Repositories\CompanySectorRepository;
use SisCad\Repositories\CompanySubSectorRepository;
use SisCad\Repositories\PatrimonialStatusRepository;
use SisCad\Repositories\PatrimonialRequestRepository;
use SisCad\Repositories\PatrimonialRepository;
use SisCad\Repositories\PatrimonialRequestItemRepository;
use SisCad\Repositories\PatrimonialMovementRepository;

use SisCad\Services\PatrimonialRequestService;

use Session;

class PatrimonialRequestsController extends Controller
{
    private $employeeRepository;
    private $management_unitRepository;
    private $company_sectorRepository;
    private $company_sub_sectorRepository;
    private $patrimonial_statusRepository;
    private $patrimonial_requestRepository;
    private $patrimonialRepository;
    private $patrimonial_request_itemRepository;
    private $patrimonial_movementRepository;
    private $patrimonial_requestService;
    
    public function __construct(
        EmployeeRepository $employeeRepository,
        ManagementUnitRepository $management_unitRepository, 
        CompanySectorRepository $company_sectorRepository, 
        CompanySubSectorRepository $company_sub_sectorRepository, 
        PatrimonialStatusRepository $patrimonial_statusRepository, 
        PatrimonialRequestRepository $patrimonial_requestRepository, 
        PatrimonialRepository $patrimonialRepository,
        PatrimonialRequestItemRepository $patrimonial_request_itemRepository,
        PatrimonialMovementRepository $patrimonial_movementRepository,
        PatrimonialRequestService $patrimonial_requestService)
    {
        $this->employeeRepository = $employeeRepository;
        $this->management_unitRepository = $management_unitRepository;
        $this->company_sectorRepository = $company_sectorRepository;
        $this->company_sub_sectorRepository = $company_sub_sectorRepository;
        $this->patrimonial_statusRepository = $patrimonial_statusRepository;
        $this->patrimonial_requestRepository = $patrimonial_requestRepository;
        $this->patrimonialRepository = $patrimonialRepository;
        $this->patrimonial_request_itemRepository = $patrimonial_request_itemRepository;
        $this->patrimonial_movementRepository = $patrimonial_movementRepository;
        $this->patrimonial_requestService = $patrimonial_requestService;
    
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('patrimonial_requests-index');

        $patrimonial_requests = $this->patrimonial_requestRepository->allPatrimonialRequests();

        return view('patrimonial_requests.index', compact('patrimonial_requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('patrimonial_requests-create');

        $employees = array(''=>'') + $this->employeeRepository
            ->allEmployees()
            ->pluck('name', 'id')
            ->all();

        $management_units = array(''=>'') + $this->management_unitRepository
            ->allManagementUnits()
            ->pluck('code_description', 'id')
            ->all();

        $company_sectors = array(''=>'') + $this->company_sectorRepository
            ->allCompanySectors()
            ->pluck('description', 'id')
            ->all();

        $company_sub_sectors = array(''=>'') + $this->company_sub_sectorRepository
            ->allCompanySubSectors()
            ->pluck('description', 'id')
            ->all();

        $employees = array(''=>'') + $this->employeeRepository
            ->allEmployees()
            ->pluck('name', 'id')
            ->all();

        $patrimonial_statuses = array(''=>'') + $this->patrimonial_statusRepository
            ->allPatrimonialStatuses()
            ->pluck('description', 'id')
            ->all();
        
        return view('patrimonial_requests.create', compact('employees', 'management_units', 'company_sectors', 'company_sub_sectors', 'patrimonial_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\PatrimonialRequestRequest $request)
    {
        $data = $request->all();

        $data['comments'] =  strtoupper($data['comments']);

        $patrimonial_request = $this->patrimonial_requestRepository->storePatrimonialRequest($data);

        $patrimonial_request_last = $this->patrimonial_requestRepository->lastPatrimonialRequest();

        return redirect()->route('patrimonial_requests.show', ['id' => $patrimonial_request_last->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize('patrimonial_requests-show');

        $patrimonial_request = $this->patrimonial_requestRepository->findPatrimonialRequestById($id);

        if($patrimonial_request->patrimonial_request_status_id == 1)
        {
            $employee_patrimonials =  $this->patrimonialRepository->allPatrimonialsByEmployeeId($patrimonial_request->from_employee_id);

            $patrimonial_request_items = $this->patrimonial_request_itemRepository->allItemsByPatrimonialRequestId($id);
        
            $patrimonial_request_items_lookup = collect($patrimonial_request_items->map(function($patrimonial_request_item)
            {
                return ['patrimonial_id' => $patrimonial_request_item->patrimonial_id];
            }));

            $logs = $patrimonial_request->revisionHistory;
        
            return view('patrimonial_requests.show', compact('patrimonial_request', 'employee_patrimonials', 'patrimonial_request_items', 'patrimonial_request_items_lookup', 'logs'));
        }

        if($patrimonial_request->patrimonial_request_status_id == 2)
        {
            $patrimonial_request_items = $this->patrimonial_request_itemRepository->allItemsByPatrimonialRequestId($id);
        
            $patrimonial_request_items_lookup = collect($patrimonial_request_items->map(function($patrimonial_request_item)
            {
                return ['patrimonial_id' => $patrimonial_request_item->patrimonial_id];
            }));

            $logs = $patrimonial_request->revisionHistory;
        
            return view('patrimonial_requests.show', compact('patrimonial_request', 'patrimonial_request_items', 'patrimonial_request_items_lookup', 'logs'));
        }

        if(($patrimonial_request->patrimonial_request_status_id == 3) || ($patrimonial_request->patrimonial_request_status_id == 4))
        {
            $patrimonial_request_items = $this->patrimonial_request_itemRepository->allItemsByPatrimonialRequestId($id);
        
            $patrimonial_request_items_lookup = collect($patrimonial_request_items->map(function($patrimonial_request_item)
            {
                return ['patrimonial_id' => $patrimonial_request_item->patrimonial_id];
            }));

            $logs = $patrimonial_request->revisionHistory;
        
            return view('patrimonial_requests.show', compact('patrimonial_request', 'patrimonial_request_items', 'patrimonial_request_items_lookup', 'logs'));
        }
    }

    public function addItem($id, $patrimonial_id)
    {
        $patrimonial_request_item_unique = $this->patrimonial_request_itemRepository->findItemByPatrimonialRequestId($id, $patrimonial_id);

        if(!$patrimonial_request_item_unique)
        {
            $patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial_id);
            #dd($patrimonial);
            
            $data['patrimonial_request_id']         = $id; 
            $data['patrimonial_id']                 = $patrimonial_id;
            $data['from_management_unit_id']        = $patrimonial->management_unit_id;
            $data['from_company_sector_id']         = $patrimonial->company_sector_id;
            $data['from_company_sub_sector_id']     = $patrimonial->company_sub_sector_id;
            $data['from_patrimonial_status_id']     = $patrimonial->patrimonial_status_id;
            $data['from_patrimonial_status_date']   = $patrimonial->patrimonial_status_date;
            $data['from_employee_id']               = $patrimonial->employee_id;

            $patrimonial_request = $this->patrimonial_requestRepository->findPatrimonialRequestById($id);
            $this->patrimonial_request_itemRepository->storePatrimonialRequestItem($data);
        }
        
        return redirect()->route('patrimonial_requests.show', ['id' => $id]);
    }

    public function removeItem($id, $patrimonial_id)
    {
        $patrimonial_request_item = $this->patrimonial_request_itemRepository->findItemByPatrimonialRequestId($id, $patrimonial_id);

        #dd($patrimonial_request_item->id);

        $this->patrimonial_request_itemRepository->findPatrimonialRequestItemById($patrimonial_request_item->id)->delete();


        return redirect()->route('patrimonial_requests.show', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function close($id)
    {
        $this->authorize('patrimonial_requests-create');

        $patrimonial_request = $this->patrimonial_requestRepository->findPatrimonialRequestById($id);
        $patrimonial_request->update(['patrimonial_request_status_id' => 2]);
        
        return redirect()->route('patrimonial_requests.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        $this->authorize('patrimonial_requests-destroy');

        $patrimonial_request = $this->patrimonial_requestRepository->findPatrimonialRequestById($id);
        $patrimonial_request->update(['patrimonial_request_status_id' => 4]);
        
        return redirect()->route('patrimonial_requests.show', ['id' => $id]);
    }

    public function confirm($id, Requests\PatrimonialRequestConfirmRequest $request)
    {
        $this->authorize('patrimonial_requests-confirm');

        $data = $request->all();

        $data['patrimonial_request_status_id'] = 3;

        $data['to_patrimonial_status_date'] = \DateTime::createFromFormat('d/m/Y', $data['to_patrimonial_status_date']);
        $data['to_patrimonial_status_date'] = $data['to_patrimonial_status_date']->format('Y-m-d');
        $date_end = $data['to_patrimonial_status_date'];

        $patrimonial_request_confirm = $this->patrimonial_requestService->confirm_check($id, $date_end);

        if($patrimonial_request_confirm == true)
        {
            $patrimonial_request = $this->patrimonial_requestRepository->findPatrimonialRequestById($id);
            $patrimonial_request->update($data);

            $patrimonial_request_items = $this->patrimonial_request_itemRepository->allItemsByPatrimonialRequestId($id);
            foreach ($patrimonial_request_items as $patrimonial_request_item) 
            {
                $patrimonial_id = $patrimonial_request_item->patrimonial_id;

                $patrimonial_request_item_confirm = $this->patrimonial_requestService->item_confirm_check($id, $patrimonial_id, $date_end);

                if($patrimonial_request_item_confirm == true)
                {
                    //Atualiza item requisicao
                    $patrimonial_request_item_id = $this->patrimonial_request_itemRepository->findPatrimonialRequestItemById($patrimonial_request_item->id);
                    $patrimonial_request_item_id->update(['to_patrimonial_status_date' => $date_end]);

                    //Identifica o ultimo ID de movimentação do patrimonio
                    $patrimonial_movement_last = $this->patrimonial_movementRepository->lastPatrimonialMovementDateByPatrimonialId($patrimonial_id);

                    //Atualiza a data fim do ultimo movimento
                    $patrimonial_movement = $this->patrimonial_movementRepository->findPatrimonialMovementById($patrimonial_movement_last->id);
                    $patrimonial_movement->update(['date_end' => $date_end]);

                    $data['patrimonial_id']         = $patrimonial_id;
                    $data['employee_id']            = $patrimonial_request->to_employee_id;
                    $data['management_unit_id']     = $patrimonial_request->to_management_unit_id;
                    $data['company_sector_id']      = $patrimonial_request->to_company_sector_id;
                    $data['company_sub_sector_id']  = $patrimonial_request->to_company_sub_sector_id;
                    $data['patrimonial_status_id']  = $patrimonial_request->to_patrimonial_status_id;
                    $data['patrimonial_status_date']= $date_end;
                    $data['date_start']             = $date_end;

                    //Atualiza movimentacao no patrimonio
                    $patrimonial = $this->patrimonialRepository->findPatrimonialById($patrimonial_id);
                    $patrimonial->update($data);

                    //Inclui nova movimentação
                    $this->patrimonial_movementRepository->storePatrimonialMovement($data);
                }
                else
                {
                    Session::flash('flash_message_danger', 'Opss... Existe(m) Patrimônio(s) com data de Situação POSTERIOR à Data de Movimentação informada.');
                }
            }
        }
        else
        {
            Session::flash('flash_message_danger', 'Opss... Existe(m) Patrimônio(s) com data de Situação POSTERIOR à Data de Movimentação informada.');
        }
    
        return redirect()->route('patrimonial_requests.show', ['id' => $id]);       
    }

    public function report($id)
    {
        #dd($id);

        $rpt_model                       = 'patrimonialRequestsById';
        
        $srch_patrimonial_request_id     = $id;

        $database = \Config::get('database.connections.mysql');

        if($rpt_model=='patrimonialRequestsById')
        {
            $output = storage_path() . '/reports/patrimonials/patrimonialRequestsById_'.date("Ymd_His");  
            $input = public_path() . '/reports/patrimonials/patrimonialRequestsById.jrxml'; 

            $conditions = array("jsp_patrimonial_request_id" => $srch_patrimonial_request_id);
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
        header('Content-Disposition: attachment; filename=patrimonialRequestsById_'.date("Ymd_His").'.'.$ext);
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
