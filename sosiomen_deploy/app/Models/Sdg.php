<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sdg extends Model
{
    protected $fillable = ['name', 'description'];

    public function proposals()
    {
        return $this->belongsToMany(Proposal::class, 'proposal_sdg');
    }
}
