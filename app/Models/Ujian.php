<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    public function opsis(){
        return $this->belongsTo(opsi::class);
    }
    public function soals(){
        return $this->belongsTo(soal::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function hasilUjian(){
        return $this->hasOne(hasilUjian::class);
    }
    
    protected $table = 'ujians';
    protected $fillable = [
        'user_id','soal_id','opsi_id', 'status', 'cek'
    ];
}
