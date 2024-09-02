<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_profile',
        'nama_skill',
        'sub_judul',
        'descriptions',

    ];
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'id_profile');
    }
    protected $table = 'skills';
}
