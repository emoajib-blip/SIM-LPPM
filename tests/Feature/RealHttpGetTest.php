<?php

namespace Tests\Feature;

use Tests\TestCase;

class RealHttpGetTest extends TestCase
{
    public function test_get()
    {
        $user = \App\Models\User::role('admin lppm')->first();
        $this->actingAs($user);
        session()->put('active_role', 'admin lppm');

        $response = $this->get('/settings/master-data?group=academic-content&tab=sdgs');

        if ($response->exception) {
            echo 'Exception: '.get_class($response->exception).' -> '.$response->exception->getMessage()."\n";
            echo $response->exception->getTraceAsString();
        } else {
            echo 'Status: '.$response->getStatusCode()."\n";
        }
    }
}
