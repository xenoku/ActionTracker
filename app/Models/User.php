<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    private function pr_activities(): HasMany
    {
        return $this->hasMany(Activity::Class);
    }

    public function activities()
    {
        // ->merge($this->pr_activities()->get())
        return Activity::where('user_id', NULL)->get()->merge($this->pr_activities()->get());
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(mySession::Class);
    }

}
