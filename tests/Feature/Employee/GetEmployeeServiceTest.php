<?php

namespace Tests\Feature\Employee;

use App\Employee\DTO\CreateEmployeeDTO;
use App\Employee\Repositories\Fakes\FakeEmployeeRepository;
use App\Employee\Services\CreateEmployeeService;
use App\Employee\Services\GetEmployeesService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetEmployeeServiceTest extends TestCase
{
    public function testgetEmployeeService() {
        $fakeEmployeeRepository = new FakeEmployeeRepository();
        $createEmployeeService = new CreateEmployeeService($fakeEmployeeRepository);

        $createEmployeeDTO = new CreateEmployeeDTO('1', 'John Doe');
        $createEmployeeDTO2 = new CreateEmployeeDTO('1', 'John Doe2');
        $createEmployeeDTO3 = new CreateEmployeeDTO('1', 'John Doe3');

        $employee1 = $createEmployeeService->execute($createEmployeeDTO);
        $employee2 = $createEmployeeService->execute($createEmployeeDTO2);
        $employee3 = $createEmployeeService->execute($createEmployeeDTO3);

        $getEmployeeService = new GetEmployeesService($fakeEmployeeRepository);
        $employees = $getEmployeeService->execute($employee1->userId);

        $this->assertEquals(
            [
                $employee1,
                $employee2,
                $employee3
            ], $employees
        );
    }
}
