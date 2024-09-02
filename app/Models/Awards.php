<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awards extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_profile',
        'nama_penghargaan',
        'tahun_penghargaan',
        'deskripsi',

    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'id_profile');
    }
    protected $date = 'deleted_at';
}
