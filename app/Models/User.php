<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    use HasFactory;

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::Class, 'users_activities');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(mySession::Class);
    }

}
