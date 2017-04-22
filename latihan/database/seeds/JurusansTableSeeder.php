<?php

use Illuminate\Database\Seeder;

class JurusansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Jurusan::insert([
      [
        'nama_jurusan'  => 'Application Development Professional',
        'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
      ],
      [
        'nama_jurusan'  => 'Creative Multimedia Professional',
        'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
      ],
      [
        'nama_jurusan'  => 'It Accounting Professional',
        'created_at'      => \Carbon\Carbon::now('Asia/Jakarta')
      ],
    ]);
    }
}
