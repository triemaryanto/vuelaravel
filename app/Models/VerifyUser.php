<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $fillable = [
        'token',
        'user_id',
    ];
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
