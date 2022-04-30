<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSeasonOfCropField extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('crop_fields_season', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crop_field_id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->foreign('crop_field_id')->references('id')->on('crop_fields');
            $table->unsignedBigInteger('cereal_id');
            $table->foreign('cereal_id')->references('id')->on('cereals');
            $table->string('variety_cereal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('crop_fields_season');
    }
}
