<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUjian extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo(User::class);
    }

    protected $table = 'hasil_ujians';
    protected $fillable = [
        'ujian_id', 'user_id', 'nilai'
    ];
}
