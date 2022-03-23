<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    //TODO 23.03.2022 Grzegorz Bielski: uzupełnić testy
    /**
     * @return void
     */
    public function testThatUserCanViewLoginForm(): void
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
}
