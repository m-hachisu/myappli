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
        Schema::create('spots', function (Blueprint $table) {
            $table->id();
            $table->string('spot_name');
            $table->string('summary');
            $table->integer('prefecture_id');
            $table->string('area_city');
            $table->integer('target_start_age');
            $table->integer('target_end_age');
            $table->time('start_time_zone');
            $table->time('end_time_zone');
            $table->integer('stay_time');
            $table->integer('kinds');
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('spots');
    }
};
