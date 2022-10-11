<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    
    protected $guarded = ['id'];

    // join table (dengan table sekolah) 1 to many (siswa 1)
    // Membuat fungsi dengan menggunakan nama tabel yang akan dijoin
    public function sekolah(){
        return $this->belongsTo(sekolah::class);
    }
}
