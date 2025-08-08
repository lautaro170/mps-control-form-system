<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function the_application_redirects_not_logged_user(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
