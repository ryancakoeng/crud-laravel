<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingColoumnsInMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswas', function(Blueprint $table){
            $table->integer('jurusan_id') // type data integer
                  ->index() // index
                  ->unsigned()
                  ->after('alamat'); // setelah kolom buatan

            $table->foreign('jurusan_id') // foreignKey
                  ->references('id') // dari kolom id
                  ->on('jurusans') // di tabel users
                  ->onUpdate('cascade') // ketika terjadi perubahan di tabel users maka akan update
                  ->onDelete('cascade'); // ketika data users di hapus akan ikut hilang
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
