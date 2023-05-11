<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasRole extends Model
{
    use HasFactory;
    protected $fillable = ['mode_id', 'role_id'];

    public function modelHasRole()
    {
        return $this->belongsTo(User::class,'mode_id','id');
    }
}
