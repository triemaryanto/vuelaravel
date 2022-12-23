<?php

namespace App\Models;

use App\Models\Wilayah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Wilayahs()
    {
        return $this->belongsTo(Wilayah::class, 'id', 'id_cabang');
    }
}
