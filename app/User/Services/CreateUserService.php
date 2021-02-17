<?php
namespace App\User\Services;

use App\User\DTO\CreateUserDTO;
use App\User\Infra\Database\Models\User;
use App\User\Repositories\IUserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;

class CreateUserService {
    private IUserRepository $userRepository;

    public function __construct(
        IUserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUserDTO $createUserDTO):User {
        $password = Hash::make($createUserDTO->password);
        $createUserDTO->password = $password;

        //Verify if Email Exists
        $checkEmailExists = $this->userRepository->findByEmail($createUserDTO->email);

        if($checkEmailExists) {
            throw new Exception('Email Already Exists');
        }

        $user = $this->userRepository->create($createUserDTO);

        return $user;
    }
}
