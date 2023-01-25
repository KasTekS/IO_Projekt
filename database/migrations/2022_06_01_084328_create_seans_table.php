<?php

use App\Enums\Glos;
use App\Enums\RodzajSean;
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
        Schema::create('seans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_seansu');
            $table->enum('rodzaj',['2D','3D']);
            $table->enum('glos',['lektor','napisy','dubbing']);
            $table->bigInteger('film_id')->unsigned();
            $table->bigInteger('sala_id')->unsigned();
            $table->timestamps();


            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seans');
    }
};
