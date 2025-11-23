<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;

    public function users(): BelongsToMany
    {
        return $this->belongsTo(User::Class, 'users_activities');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(mySession::Class);
    }
}
