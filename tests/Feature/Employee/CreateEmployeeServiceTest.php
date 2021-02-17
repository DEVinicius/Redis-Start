<?php

namespace Tests\Feature\Employee;

use App\Employee\DTO\CreateEmployeeDTO;
use App\Employee\Infra\Database\Models\Employee;
use App\Employee\Repositories\Fakes\FakeEmployeeRepository;
use App\Employee\Services\CreateEmployeeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestCreateEmployeeService extends TestCase
{
    public function testCreateEmployeeService() {
        $fakeEmployeeRepository = new FakeEmployeeRepository();
        $createEmployeeService = new CreateEmployeeService($fakeEmployeeRepository);

        $createEmployeeDTO = new CreateEmployeeDTO('1', 'John Doe');
        $employee = $createEmployeeService->execute($createEmployeeDTO);

        $this->assertInstanceOf(Employee::class, $employee);
    }
}
