<?php

namespace App\Enums;

enum ReviewStatus: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'bg-azure',
            self::IN_PROGRESS => 'bg-warning',
            self::COMPLETED => 'bg-success',
            self::REJECTED => 'bg-danger',
        };
    }
}
