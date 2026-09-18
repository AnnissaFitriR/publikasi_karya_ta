<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karya';

    protected $primaryKey = 'id_karya';

    protected $fillable = [
        'id_mahasiswa',
        'id_kategori',
        'judul',
        'deskripsi',
        'file_karya',
        'status',
        'catatan',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}