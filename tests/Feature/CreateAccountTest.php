<?php

declare(strict_types=1);

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
        $request = $this
            ->followingRedirects()
            ->post('register', [
                'name' => 'user',
                'email' => 'example@yrgo.se',
                'password' => 'password'
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'user',
            'email' => 'example@yrgo.se',
        ]);
    }
}
