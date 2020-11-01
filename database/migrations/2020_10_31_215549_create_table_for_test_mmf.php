<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableForTestMmf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->enum('jk', ['L', 'P']);
            $table->string('alamat');
            
            $table->timestamps();
        });

        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('status', ['ACTIVE', 'INACTIVE']);
            
            $table->timestamps();
        });

        Schema::create('mahasiswa_mata_kuliah', function (Blueprint $table) {
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('mata_kuliah_id');
            
            $table->timestamps();

            // Menyambungkan relasi dari mahasiswa_id
            $table->foreign('mahasiswa_id')
                ->references('id')
                ->on('mahasiswa')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // Menyambungkan relasi dari mata_kuliah_id
            $table->foreign('mata_kuliah_id')
                ->references('id')
                ->on('mata_kuliah')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });



        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_for_test_mmf');
    }
}
