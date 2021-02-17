<?php
namespace App\Employee\Services;

use App\Employee\DTO\CreateEmployeeDTO;
use App\Employee\Repositories\IEmployeeRepository;

class CreateEmployeeService {
    private IEmployeeRepository $employeeRepository;

    public function __construct(
        IEmployeeRepository $employeeRepository
    ) {
        $this->employeeRepository = $employeeRepository;
    }

    public function execute(CreateEmployeeDTO $createEmployeeDTO) {
        $employee = $this->employeeRepository->create($createEmployeeDTO);
        return $employee;
    }
}
