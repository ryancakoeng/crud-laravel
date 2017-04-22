<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
  protected $table = 'mahasiswas';
  protected $fillable = [
    'nama', 'jenis_kelamin', 'alamat', 'jurusan_id', 'created_at', 'updated_at'
  ];

  public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
