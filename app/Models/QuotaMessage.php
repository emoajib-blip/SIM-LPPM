<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotaMessage extends Model
{
    protected $fillable = [
        'key',
        'message',
    ];
}
