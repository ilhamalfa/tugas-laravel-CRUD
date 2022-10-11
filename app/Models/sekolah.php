<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    use HasFactory;

    // Tidak usah ditulis, Jika menggunakan penulisan standard laravel pada migrasi (table pake s dibelakangnya)
    protected $table = 'sekolah';

    // Digunakan jika nama id bukan id (default dari laravel), ex = 'nis, nim'
    // protected $primarykey = 'nis';

    // Digunakan untuk memilih kolom mana yang dapat diisi
    // protected $fillable = ['nama_sekolah'];

    // Digunakan untuk memilih kolom mana yang tidak boleh diisi
    protected $guarded = ['id'];

    // join table (dengan table siswa) 1 to many (sekolah Many)
    // Membuat fungsi dengan menggunakan nama tabel yang akan dijoin
    public function siswa(){
        return $this->hasMany(siswa::class);
    }
}
