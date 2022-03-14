<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form() {
        $response = $this->get('/');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user() {
        $user = new User();
        $user->name = 'Dr Alban';
        $user->email = 'amarinov@gmail.com';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
        ->followingRedirects()
        ->post('login', [
            'email' => 'amarinov@gmail.com',
            'password' => '123',
        ]);

        $response->assertSeeText('Hello, Dr Alban!');
    }

    public function test_login_user_without_password()
    {
        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
            ]);

        $response->assertSeeText('The provided credentials do not match our records.');
    }
}
