<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::Class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(mySession::Class);
    }

    protected $fillable = [
        'user_id',
        'name',
        'description'
    ];
}
