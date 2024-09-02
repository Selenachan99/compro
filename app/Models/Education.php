<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_profile',
        'nama_sekolah',
        'jurusan',
        'deskripsi',
        'riwayat_pendidikan',

    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'id_profile');
    }
    protected $table = 'educations';
}
