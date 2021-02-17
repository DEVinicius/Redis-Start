<?php
namespace App\Employee\Repositories;

use App\Employee\DTO\CreateEmployeeDTO;
use App\Employee\Infra\Database\Models\Employee;

interface IEmployeeRepository {
    public function create(CreateEmployeeDTO $createEmployeeDTO):Employee;
    public function findByUserId(int $userId);
}
