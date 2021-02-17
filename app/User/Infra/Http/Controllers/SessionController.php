<?php
namespace App\User\Infra\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User\DTO\AuthenticateUserDTO;
use App\User\DTO\CreateUserDTO;
use App\User\Infra\Database\Repositories\UserRepository;
use App\User\Services\AuthenticateUserService;
use App\User\Services\CreateUserService;
use Exception;
use Illuminate\Http\Request;

class SessionController extends Controller {
    public function login(Request $request) {
        try {
            $authenticateUserDto = new AuthenticateUserDTO(
                $request->email,
                $request->password
            );

            $userRepository = new UserRepository();
            $authenticateUserService = new AuthenticateUserService($userRepository);

            $userAuthenticated = $authenticateUserService->execute($authenticateUserDto);
            return response()->json([
                "token" => $userAuthenticated
            ]);

        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ]);
        }
    }

    public function signIn(Request $request) {
        try {
            $createUserDTO = new CreateUserDTO(
                $request->name,
                $request->email,
                $request->password
            );

            $userRepository = new UserRepository();
            $createUserService = new CreateUserService($userRepository);

            $user = $createUserService->execute($createUserDTO);
            return $user;
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ]);
        }
    }
}
