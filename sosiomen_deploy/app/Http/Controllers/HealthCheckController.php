<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HealthCheckController extends Controller
{
    /**
     * Check system health (DB, Storage, etc.)
     */
    public function __invoke(): JsonResponse
    {
        $health = [
            'status' => 'ok',
            'timestamp' => now()->toIso8601String(),
            'environment' => app()->environment(),
            'checks' => [
                'database' => $this->checkDatabase(),
                'storage' => $this->checkStorage(),
            ],
        ];

        $statusCode = 200;
        foreach ($health['checks'] as $check) {
            if ($check['status'] !== 'ok') {
                $health['status'] = 'error';
                $statusCode = 503;
                break;
            }
        }

        return response()->json($health, $statusCode);
    }

    protected function checkDatabase(): array
    {
        try {
            DB::connection()->getPdo();

            return [
                'status' => 'ok',
                'message' => 'Connection established',
            ];
        } catch (\Throwable $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    protected function checkStorage(): array
    {
        try {
            Storage::disk('local')->put('health-check.tmp', 'ok');
            Storage::disk('local')->delete('health-check.tmp');

            return [
                'status' => 'ok',
                'message' => 'Disk readable and writable',
            ];
        } catch (\Throwable $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
}
