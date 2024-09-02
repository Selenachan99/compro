<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_profile',
        'nama_bahasa',
        'tingkat_bahasa',
        'deskripsi',

    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'id_profile');
    }
    protected $table = 'language';
}
