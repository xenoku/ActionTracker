<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class mySession extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::Class);
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::Class);
    }

    protected $fillable = [
        'user_id',
        'activity_id',
        'start_time',
        'end_time'
    ];
}