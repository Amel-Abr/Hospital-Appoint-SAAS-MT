<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [ ];
    // protected $table = 'appointments';


    protected $fillable = [
        'patientName',
        'patientphone',
        'patientAddress',
        'patientEmail',
        'doctornName',
        'date',
        'time',
        'patientID',
        'doctorID',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
