<?php
namespace App\Employee\Infra\Database\Repositories;

use App\Employee\DTO\CreateEmployeeDTO;
use App\Employee\Infra\Database\Models\Employee;
use App\Employee\Repositories\IEmployeeRepository;
use Illuminate\Support\Facades\Cache;

class EmployeeRepository implements IEmployeeRepository {
    public function create(CreateEmployeeDTO $createEmployeeDTO):Employee {
        $employee = new Employee();

        $employee->userId = $createEmployeeDTO->userId;
        $employee->employeeName = $createEmployeeDTO->employeeName;

        $employee->save();
        Cache::forget("employee:$createEmployeeDTO->userId");

        return $employee;
    }

    public function findByUserId(int $userId) {
        if(!Cache::has("employee:$userId")) {
            $employees = Employee::where('userId', $userId)->get();
            Cache::put("employee:$userId", $employees);
        }
        return Cache::get("employee:$userId");
    }
}
