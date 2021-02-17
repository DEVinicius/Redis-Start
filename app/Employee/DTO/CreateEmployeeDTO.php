<?php
namespace App\Employee\DTO;

class CreateEmployeeDTO {
    public int $userId;
    public string $employeeName;

    public function __construct(
        int $userId,
        string $employeeName
    ) {
        $this->userId = $userId;
        $this->employeeName = $employeeName;
    }
}
