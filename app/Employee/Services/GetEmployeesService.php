<?php
namespace App\Employee\Services;

use App\Employee\Repositories\IEmployeeRepository;

class GetEmployeesService {
    private IEmployeeRepository $employeeRepository;

    public function __construct(
        IEmployeeRepository $employeeRepository
    ) {
        $this->employeeRepository = $employeeRepository;
    }

    public function execute(int $userId) {
        $employees = $this->employeeRepository->findByUserId($userId);
        return $employees;
    }
}
