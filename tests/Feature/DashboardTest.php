<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
class DashboardTest extends TestCase
{
    use RefreshDatabase;
    public function test_view_dashboard()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();


        $response = $this->actingAs($user)
            ->get('dashboard');
        $response->assertSeeText('Hello, Mr Robot!');
        $response->assertStatus(200);
    }

    public function test_view_dashboard_as_not_signed_in()
    {

        $response = $this->assertGuest()
            ->get('dashboard');
        $response->assertStatus(302);
    }
}
