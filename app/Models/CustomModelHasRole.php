<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomModelHasRole extends Model
{
    use HasFactory;
    protected $fillable = ['mode_id', 'role_id'];

    public function customModelHasRole()
    {
        return $this->belongsTo(User::class,'mode_id','id');
    }
}
