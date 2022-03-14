<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_form()
    {
        $response = $this->get('register');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }
}
