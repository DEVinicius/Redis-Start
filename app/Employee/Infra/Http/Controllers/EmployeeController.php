<?php
namespace App\Employee\Infra\Http\Controllers;

use App\Employee\DTO\CreateEmployeeDTO;
use App\Employee\Infra\Database\Repositories\EmployeeRepository;
use App\Employee\Services\CreateEmployeeService;
use App\Employee\Services\GetEmployeesService;
use Exception;
use Illuminate\Http\Request;

class EmployeeController {
    public function create(Request $request) {
        try {
            $employeeRepository = new EmployeeRepository();
            $createEmployeeService = new CreateEmployeeService($employeeRepository);

            $createEmployeeDTO = new CreateEmployeeDTO(
                $request->userId,
                $request->employeeName
            );

            $employee = $createEmployeeService->execute($createEmployeeDTO);
            return $employee;
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ]);
        }
    }

    public function get($userId) {
        try {
            $employeeRepository = new EmployeeRepository();
            $getEmployeeService = new GetEmployeesService($employeeRepository);

            $employees = $getEmployeeService->execute($userId);
            return $employees;
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ]);
        }
    }
}
