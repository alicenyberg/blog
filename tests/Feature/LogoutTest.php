<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_logout()
    {
        $user = new User();
        $user->name = 'Alice';
        $user->email = 'alice@alice.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->from('/dashboard')->followingRedirects()->get('/logout');
        $response->assertSeeText('Login');
    }
}
