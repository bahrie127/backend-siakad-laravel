<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    use HasFactory;

    //belong to mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(User::class);
    }

    //belong to matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Subject::class);
    }

    
}
