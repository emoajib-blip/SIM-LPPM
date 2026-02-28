<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /** @test */
    public function test_health_check_returns_ok()
    {
        $response = $this->get('/health-check');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'timestamp',
                'checks' => [
                    'database',
                    'storage',
                ],
            ]);
    }
}
