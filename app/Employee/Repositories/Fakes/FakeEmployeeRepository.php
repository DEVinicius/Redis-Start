<?php
namespace App\Employee\Repositories\Fakes;

use App\Employee\DTO\CreateEmployeeDTO;
use App\Employee\Infra\Database\Models\Employee;
use App\Employee\Repositories\IEmployeeRepository;

class FakeEmployeeRepository implements IEmployeeRepository {
    private array $employees = [];
    public function create(CreateEmployeeDTO $createEmployeeDTO):Employee {
        $employee = new Employee();

        $employee->id = rand();
        $employee->userId = $createEmployeeDTO->userId;
        $employee->employeeName = $createEmployeeDTO->employeeName;

        array_push($this->employees, $employee);

        return $employee;
    }

    public function findByUserId(int $userId) {
        $employees = [];

        foreach ($this->employees as $employee) {
            if($employee->userId == $userId) {
                array_push($employees);
            }
        }

        return $employees;
    }
}
