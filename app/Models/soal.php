<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    use HasFactory;
    public function opsis(){
        return $this->hasMany(opsi::class);
    }
    public function ujians(){
        return $this->hasMany(Ujian::class);
    }

    protected $table = 'soals';
    protected $fillable = [
        'pertanyaan',
    ];

}
