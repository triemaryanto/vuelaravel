<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyPassword extends Model
{
    protected $fillable = [
        'validasi',
        'user_id',
    ];
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
