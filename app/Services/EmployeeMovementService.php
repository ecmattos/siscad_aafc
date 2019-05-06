<?php

namespace SisCad\Services;

use SisCad\Repositories\EmployeeRepository;
use SisCad\Repositories\EmployeeMovementRepository;

class EmployeeMovementService
{
	protected $employeeRepository;
	protected $employee_movementRepository;

	protected $counter;

	public function __construct(EmployeeRepository $employeeRepository, EmployeeMovementRepository $employee_movementRepository)
	{
		$this->employeeRepository = $employeeRepository;
		$this->employee_movementRepository = $employee_movementRepository;
	}

	public function store(array $data)
	{
		if($this->checkDateStartBetweenInMovements($id = null, $data['employee_id'], $data['date_start']) > 0)
		{
			return redirect()->route('employees.start_movement', ['id' => $data['employee_id']])->withInput()->withErrors(['error' => '<b>Data de Entrada</b> >> Indisponível por pertencer a outros intervalos de movimentações !']);
		}
		
		$employee_movement = $this->employee_movementRepository->storeEmployeeMovement($data);

		//Atualiza Employee -- Inicio
        $data['date_status'] = $data['date_start'];
        $data['employee_status_id'] = 1;
        $employee = $this->employeeRepository->findEmployeeById($data['employee_id']);
        $employee->update($data);
        //Atualiza Employee -- Fim
	}

	public function start_movement_update($id, array $data)
	{
		if($this->checkDateStartBetweenInMovements($id, $data['employee_id'], $data['date_start']) > 0)
		{
			return redirect()->route('employees.edit_movement', ['id' => $data['employee_id']])->withInput()->withErrors(['error' => '<b>Data de Entrada</b> >> Indisponível por pertencer a outros intervalos de movimentações !']);
		}

		$employee_movement = $this->employee_movementRepository->findEmployeeMovementById($id);
        $employee_movement->update($data);

		//Atualiza Employee -- Inicio
        $data['date_status'] = $data['date_start'];
        $data['employee_status_id'] = 1;
        $employee = $this->employeeRepository->findEmployeeById($employee_movement->employee_id);
        $employee->update($data);
        //Atualiza Employee -- Fim
	}

	public function checkDateStartBetweenInMovements($id, $employee_id, $date_start)
	{
		if($id)
		{
			$employee_movements = $this->employee_movementRepository->allEmployeeMovementsByEmployeeIdExceptedId($id, $employee_id);
		}
		else
		{
			$employee_movements = $this->employee_movementRepository->allEmployeeMovementsByEmployeeId($employee_id);
		}

		$counter = 0;

		foreach ($employee_movements as $employee_movement) 
		{
			if(($date_start >= $employee_movement->date_start->format('Y-m-d')) && ($date_start <= $employee_movement->date_end->format('Y-m-d'))) 
			{
				$counter++;
			}
		}
		
		return $counter;
	}

	public function end_movement_update($id, array $data)
	{
		if($this->checkDateStartBetweenInMovements($id, $data['employee_id'], $data['date_start']) > 0)
		{
			return redirect()->route('employees.end_movement_edit', ['id' => $data['employee_id']])->withInput()->withErrors(['error' => '<b>Data de Entrada</b> >> Indisponível por pertencer a outros intervalos de movimentações !']);
		}

		if($this->checkDateEndBetweenInMovements($id, $data['employee_id'], $data['date_end']) > 0)
		{
			return redirect()->route('employees.end_movement_edit', ['id' => $data['employee_id']])->withInput()->withErrors(['error' => '<b>Data de Saída</b> >> Indisponível por pertencer a outros intervalos de movimentações !']);
		}

		$employee_movement = $this->employee_movementRepository->findEmployeeMovementById($id);
        $employee_movement->update($data);

        //Atualiza Employee a partir da última movimentacao -- Inicio
        $last_employee_movement = $this->employee_movementRepository->allEmployeeMovementsByEmployeeId($employee_movement->employee_id)->last();
        
        if($last_employee_movement->date_end)
        {
            $data['date_status'] = $last_employee_movement->date_end;
            $data['employee_status_id'] = 2;
        }
        else
        {
            $data['date_status'] = $last_employee_movement->date_start;
            $data['employee_status_id'] = 1;
        }

        $data['management_unit_id'] = $last_employee_movement->management_unit_id;
        $data['company_position_id'] = $last_employee_movement->company_position_id;
        $data['company_responsibility_id'] = $last_employee_movement->company_responsibility_id;
        $data['company_sector_id'] = $last_employee_movement->company_sector_id;
        $data['company_sub_sector_id'] = $last_employee_movement->company_sub_sector_id;
        
        $employee = $this->employeeRepository->findEmployeeById($employee_movement->employee_id);
        $employee->update($data);
        //Atualiza Employee a partir da última movimentacao --e -- Fim
	}

	public function checkDateEndBetweenInMovements($id, $employee_id, $date_end)
	{
		$employee_movements = $this->employee_movementRepository->allEmployeeMovementsByEmployeeIdExceptedId($id, $employee_id);
		
		//Evitar date_end vazio quando houver somente uma movimentacao sem data de saida
		if($employee_movements->count()>=1)  
		{
			$counter = 0;

			foreach ($employee_movements as $employee_movement) 
			{
				if(($date_end >= $employee_movement->date_start->format('Y-m-d')) && ($date_end <= $employee_movement->date_end->format('Y-m-d'))) 
				{
					$counter++;;
				}
			}
			return $counter;
		}
	}
}