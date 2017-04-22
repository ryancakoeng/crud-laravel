<?php

use Illuminate\Database\Seeder;

class MahasiswasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Eloquent::unguard();
          DB::statement('SET FOREIGN_KEY_CHECKS=0;');
          \App\Mahasiswa::truncate();

        \App\Mahasiswa::insert([
          [
                  'nama'  => 'Ricky Sujana',
                  'jenis_kelamin' => 'laki-laki',
                  'alamat'          => 'Sumedang',
                  'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
                  'jurusan_id'         => 1
          ],
          [
                  'nama'  => 'Hadi Alisuwarna',
                  'jenis_kelamin' => 'laki-laki',
                  'alamat'          => 'Sumedang',
                  'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
                  'jurusan_id'         => 2
          ],
          [
                  'nama'  => 'Dini Rahayu',
                  'jenis_kelamin' => 'perempuan',
                  'alamat'          => 'Sumedang',
                  'created_at'      => \Carbon\Carbon::now('Asia/Jakarta'),
                  'jurusan_id'         => 3
          ],
        ]);

          DB::statement('SET FOREIGN_KEY_CHECKS=1;');
          Eloquent::reguard();
    }
}
