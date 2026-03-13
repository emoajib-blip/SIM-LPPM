<?php

namespace App\Enums;

enum ReviewStatus: string
{
    case PENDING = 'pending';
    case ACTIVE = 'active';
    case SUSPENDED = 'suspended';
    case UNVERIFIED = 'unverified';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Menunggu Verifikasi',
            self::ACTIVE => 'Aktif',
            self::SUSPENDED => 'Ditangguhkan',
            self::UNVERIFIED => 'Institusi Belum Terverifikasi',
        };
    }
}
