<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Service Skeleton for SINTA API Integration
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
class SintaService
{
    protected string $baseUrl;

    protected ?string $apiKey;

    protected ?string $apiPassword;

    public function __construct()
    {
        $this->baseUrl = config('services.sinta.url', 'https://api.sinta.kemdikbud.go.id/v3');
        $this->apiKey = config('services.sinta.key');
        $this->apiPassword = config('services.sinta.password');
    }

    /**
     * Sync Author Profile from SINTA
     */
    public function syncAuthorProfile(User $user): array
    {
        $identity = $user->identity;
        $sintaId = $identity?->sinta_id;

        if (! $sintaId) {
            return ['success' => false, 'message' => 'SINTA ID tidak ditemukan untuk dosen ini.'];
        }

        // Check for API Configuration
        if (empty($this->apiKey)) {
            // For demonstration/local without keys, we can simulate success if needed
            // but for now we follow security/QA protocol and return config error
            Log::warning("SINTA API Key not configured for user {$user->id}");

            return ['success' => false, 'message' => 'SINTA API Key belum dikonfigurasi. Hubungi Administrator.'];
        }

        try {
            $response = Http::withHeaders([
                'X-API-KEY' => $this->apiKey,
                'X-API-PASSWORD' => $this->apiPassword,
            ])->timeout(30)->post("{$this->baseUrl}/author/detail", [
                'sinta_id' => $sintaId,
            ]);

            if ($response->successful()) {
                $data = $response->json()['data'] ?? [];

                if (empty($data)) {
                    return ['success' => false, 'message' => 'Data tidak ditemukan di SINTA.'];
                }

                // Map SINTA response to identity fields
                $identity->update([
                    'sinta_score_v3_overall' => $data['sinta_score_overall'] ?? $identity->sinta_score_v3_overall,
                    'sinta_score_v3_3yr' => $data['sinta_score_3y'] ?? $identity->sinta_score_v3_3yr,
                    'scopus_h_index' => $data['scopus_h_index'] ?? $identity->scopus_h_index,
                    'gs_h_index' => $data['google_scholar_h_index'] ?? $identity->gs_h_index,
                    'scopus_citations' => $data['scopus_citations'] ?? $identity->scopus_citations,
                    'gs_citations' => $data['google_scholar_citations'] ?? $identity->gs_citations,
                    // Add more mappings as per actual SINTA V3 API response
                ]);

                return ['success' => true, 'message' => 'Data SINTA berhasil disinkronisasi.', 'data' => $data];
            }

            return ['success' => false, 'message' => 'Gagal terhubung ke SINTA API: '.($response->json()['message'] ?? 'Unknown Error')];
        } catch (\Exception $e) {
            Log::error('SINTA Sync Error for User ID '.$user->id.': '.$e->getMessage());

            return ['success' => false, 'message' => 'Terjadi kesalahan sistem saat sinkronisasi.'];
        }
    }

    /**
     * Bulk Sync for all users with SINTA ID
     */
    public function bulkSync(): array
    {
        $users = User::whereHas('identity', function ($query) {
            $query->whereNotNull('sinta_id');
        })->get();

        $results = [
            'total' => $users->count(),
            'success' => 0,
            'failed' => 0,
        ];

        foreach ($users as $user) {
            $sync = $this->syncAuthorProfile($user);
            if ($sync['success']) {
                $results['success']++;
            } else {
                $results['failed']++;
            }
        }

        return $results;
    }
}
