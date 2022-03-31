<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    public function test_like_comment_as_user()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = '123';
        $user->save();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->content = "test comment";
        $comment->save();

        $this->actingAs($user)->post("/c/$comment->id/like");
        $this->assertDatabaseHas('likes', ['user_id' => $user->id, 'comment_id' => $comment->id]);
    }

    public function test_like_comment_as_guest()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = '123';
        $user->save();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->content = "test comment";
        $comment->save();

        $this->post("/c/$comment->id/like");
        $this->assertDatabaseMissing('likes', ['user_id' => $user->id, 'comment_id' => $comment->id]);
    }
}
