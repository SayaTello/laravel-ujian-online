<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opsi extends Model
{
    use HasFactory;
    public function soal(){
        return $this->belongsTo(soal::class);
    }
    public function ujians(){
        return $this->hasMany(Ujian::class);
    }

    protected $table = 'opsis';
    protected $fillable = [
        'pilihan', 'soal_id',
    ];
}
