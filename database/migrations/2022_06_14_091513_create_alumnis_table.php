<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nim')->unique();
            $table->string('nama');
            $table->string('email');
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->string('no_telepon');
            $table->string('nik');
            $table->uuid('id_sso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
};
