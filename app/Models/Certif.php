<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certif extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_profile',
        'nama_sertifikat',
        'tahun_sertifikat',
        'deskripsi',
        // 'bukti_sertifikat',

    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'id_profile');
    }
    protected $table = 'certificates';
}
