<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nama', 'kelas', 'alamat', 'jenis_kelamin', 'tanggal_lahir']; // field yang bisa diisi
}
