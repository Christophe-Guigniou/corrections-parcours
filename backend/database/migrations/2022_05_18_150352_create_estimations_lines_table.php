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
        Schema::create('estimate_lines', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->integer('time');
            $table->string('type')->default('general');
            $table->unsignedBigInteger('estimate_id');
            $table->timestamps();

            $table->foreign('estimate_id')->references('id')->on('estimates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimates_lines');
    }
};
