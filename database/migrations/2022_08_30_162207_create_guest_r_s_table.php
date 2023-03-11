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
        Schema::create('guest_r_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('keadaan');
            $table->string('keadaan2');
            $table->string('keadaan3');
            $table->string('keadaan4');
            $table->string('komentar')->nullable();
            $table->string('hasil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guest_r_s');
    }
};
