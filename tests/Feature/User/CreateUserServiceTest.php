<?php

namespace Tests\Feature\User;

use App\User\DTO\CreateUserDTO;
use App\User\Infra\Database\Models\User;
use App\User\Repositories\Fakes\FakeUserRepository;
use App\User\Services\CreateUserService as ServicesCreateUserService;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUserServiceTest extends TestCase
{
    public function testCreateUser() {
        $fakeUserRepository = new FakeUserRepository();
        $createUserService = new ServicesCreateUserService($fakeUserRepository);

        $createUserDTO = new CreateUserDTO("Vinicius Pereira","agavi2014@hotmail.com","1234");
        $user = $createUserService->execute($createUserDTO);

        $this->assertInstanceOf(User::class, $user);
    }

    public function testCreateUsersWithSameEmail() {
        $this->expectException(Exception::class);

        $fakeUserRepository = new FakeUserRepository();
        $createUserService = new ServicesCreateUserService($fakeUserRepository);

        $createUserDTO = new CreateUserDTO("Vinicius Pereira","agavi2014@hotmail.com","1234");
        $createUserDTO2 = new CreateUserDTO("Vinicius Pereira2","agavi2014@hotmail.com","1234");
        $createUserService->execute($createUserDTO);
        $createUserService->execute($createUserDTO2);
    }
}
