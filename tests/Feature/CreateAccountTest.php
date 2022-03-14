<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_register_form()
    {
        $response = $this->get('register');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }
    public function test_register_user()
    {
        $user = new User();

        $user->name = 'Alice';
        $user->email = 'alice@alice.se';
        $user->passowrd = '123';

        $register = $this
            ->followingRedirects()
            ->post('register', [
                'name' => "$user->name",
                'email' => "$user->email",
                'password' => "$user->password",
            ]);
        $register->assertSuccessful();
    }
}
