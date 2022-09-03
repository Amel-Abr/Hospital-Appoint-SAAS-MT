<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlanFeature extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
