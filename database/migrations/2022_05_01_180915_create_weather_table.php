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
        Schema::create('weathers', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');
            $table->string('name');
            $table->decimal('lat', 10, 7);
            $table->decimal('long', 10, 7);
            $table->integer('temp');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->integer('temp_min');
            $table->integer('temp_max');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather');
    }
};
