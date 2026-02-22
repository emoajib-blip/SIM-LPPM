<?php

use App\Http\Controllers\Api\PublicCommunityServiceController;
use App\Http\Controllers\Api\PublicResearchController;
use App\Http\Controllers\Api\PublicStatsController;
use Illuminate\Support\Facades\Route;

/**
 * Public API Routes for LPPM Synchronization
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */
Route::prefix('v1/public')->name('api.v1.public.')->group(function () {

    // Research API
    Route::get('research', [PublicResearchController::class, 'index'])
        ->name('research.index');
    Route::get('research/{id}', [PublicResearchController::class, 'show'])
        ->name('research.show');

    // Community Service (PKM) API
    Route::get('community-service', [PublicCommunityServiceController::class, 'index'])
        ->name('community-service.index');
    Route::get('community-service/{id}', [PublicCommunityServiceController::class, 'show'])
        ->name('community-service.show');

    // Stats API
    Route::get('stats', [PublicStatsController::class, 'index'])
        ->name('stats.index');

});
