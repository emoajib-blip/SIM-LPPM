<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Log Aktivitas Keamanan') }}</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter table-mobile-md card-table">
                <thead>
                    <tr>
                        <th>{{ __('Aktivitas') }}</th>
                        <th>{{ __('Keterangan') }}</th>
                        <th>{{ __('Alamat IP') }}</th>
                        <th>{{ __('Waktu') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td data-label="Aktivitas">
                                @if($log->activity === 'login')
                                    <span class="badge bg-green-lt">{{ __('Login') }}</span>
                                @elseif($log->activity === 'logout')
                                    <span class="badge bg-red-lt">{{ __('Logout') }}</span>
                                @else
                                    <span class="badge bg-blue-lt">{{ $log->activity }}</span>
                                @endif
                            </td>
                            <td data-label="Keterangan">
                                <div class="text-secondary small">{{ $log->description }}</div>
                                @if($log->url)
                                    <div class="text-muted extra-small text-truncate" style="max-width: 250px;" title="{{ $log->url }}">
                                        {{ $log->url }}
                                    </div>
                                @endif
                            </td>
                            <td data-label="Alamat IP">
                                <div class="small">{{ $log->ip_address }}</div>
                                <div class="text-muted extra-small text-truncate" style="max-width: 150px;" title="{{ $log->user_agent }}">
                                    {{ $log->user_agent }}
                                </div>
                            </td>
                            <td data-label="Waktu" class="text-secondary small">
                                {{ $log->created_at->translatedFormat('d M Y, H:i:s') }}
                                <div class="text-muted extra-small">{{ $log->created_at->diffForHumans() }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                {{ __('Belum ada log aktivitas.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($logs->hasPages())
            <div class="card-footer d-flex align-items-center">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
</div>
