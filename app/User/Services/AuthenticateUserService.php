<?php
namespace App\User\Services;

use App\User\DTO\AuthenticateUserDTO;
use App\User\Repositories\IUserRepository;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthenticateUserService {
    private IUserRepository $userRepository;

    public function __construct(
        IUserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function execute(AuthenticateUserDTO $authenticateUserDTO) {
        $checkEmailExists = $this->userRepository->findByEmail($authenticateUserDTO->email);

        if(!$checkEmailExists) {
            throw new Exception('Email / Password is Incorrect!');
        }

        $checkPasswordIsCorrect = Hash::check($authenticateUserDTO->password, $checkEmailExists->password);

        if(!$checkPasswordIsCorrect) {
            throw new Exception('Email / Password is Incorrect!');
        }

        return Hash::make(getenv('TOKEN'));
    }
}
