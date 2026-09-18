<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Karya;

class Mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'nipd',
        'nama',
        'email',
        'password',
        'program_studi',
        'foto',
    ];

    protected $hidden = [
        'password',
    ];

    public function karya()
    {
        return $this->hasMany(Karya::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}