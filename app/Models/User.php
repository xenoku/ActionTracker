<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::Class, 'users_activities');
    }

    public function custom_activities(): HasMany
    {
        return $this->hasMany(Activity::Class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(mySession::Class);
    }

}
