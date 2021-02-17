<?php
namespace App\User\Repositories\Fakes;

use App\User\DTO\CreateUserDTO;
use App\User\Infra\Database\Models\User;
use App\User\Repositories\IUserRepository;

class FakeUserRepository implements IUserRepository {
    private array $users = [];

    public function create(CreateUserDTO $createUserDTO):User {
        $user = new User();

        $user->id = rand();
        $user->name = $createUserDTO->name;
        $user->email = $createUserDTO->email;
        $user->password = $createUserDTO->password;

        array_push($this->users, $user);

        return $user;
    }

    public function findByEmail(string $email) {
        foreach ($this->users as $user) {
            if($user->email == $email) {
                return $user;
            }
        }
    }
}
