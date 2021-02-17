<?php
namespace App\User\Repositories;

use App\User\DTO\CreateUserDTO;
use App\User\Infra\Database\Models\User;

interface IUserRepository {
    public function create(CreateUserDTO $createUserDTO):User;
    public function findByEmail(string $email);
}
