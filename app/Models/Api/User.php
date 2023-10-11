<?php

namespace App\Models\Api;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;

class User extends \App\Models\User
{ use HasRoles;
    public function getAbilityAttribute()
    {
        $ability = User::find(auth()->user()->id)->getAllPermissions()->pluck('name');
        return $ability;
    }
    public function guardName(){
        return "web";
    }
}
