<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as  Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    Use HasApiTokens;
    use HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        'gender',
        'dob',
        'phone',
        'marital_status_id',
        'estate_id',
        'ward',
        'cell_group_id',
        'employment_status_id',
        'born_again_id',
        'leadership_status_id',
        'ministry_id',
        'occupation_id',
        'education_level_id',
        'password',
        'token',
        'token_expire'
    ];

    public function hasAnyRole()
    {
        return $this->roles()->exists();
    }
    public function hasNoRoles()
    {
        return $this->roles->isEmpty();
    }
}
