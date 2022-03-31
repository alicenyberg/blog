<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CreateCommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_comment_as_user()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = '123';
        $user->save();

        $this
            ->actingAs($user)
            ->post('comments', [
                'content' => 'Finish writing this test'
            ]);

        $this->assertDatabaseHas('comments', ['content' => 'Finish writing this test']);
    }

    public function test_create_comment_as_guest()
    {
        $this->post('comments', [
                'content' => 'Finish writing this test'
            ]);

        $this->assertDatabaseMissing('comments', ['content' => 'Finish writing this test']);
    }
}
