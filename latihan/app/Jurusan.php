<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
  protected $table = 'jurusans';
  protected $fillable = [
    'nama_jurusan', 'created_at', 'updated_at'
  ];

  public function Mahasiswa()
    {
        return $this->hasOne('App\Mahasiswa');
    }
}
