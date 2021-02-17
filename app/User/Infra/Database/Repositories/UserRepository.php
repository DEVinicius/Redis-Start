<?php
namespace App\User\Infra\Database\Repositories;

use App\User\DTO\CreateUserDTO;
use App\User\Infra\Database\Models\User;
use App\User\Repositories\IUserRepository;

class UserRepository implements IUserRepository {
    public function create(CreateUserDTO $createUserDTO): User {
        $user = new User();

        $user->name = $createUserDTO->name;
        $user->email = $createUserDTO->email;
        $user->password = $createUserDTO->password;

        $user->save();
        return $user;
    }

    public function findByEmail(string $email) {
        return User::where('email', $email)->first();
    }
}
