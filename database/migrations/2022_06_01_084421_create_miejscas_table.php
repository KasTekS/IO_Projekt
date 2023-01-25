<?php

use App\Enums\RodzajMiejsca;
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
        Schema::create('miejscas', function (Blueprint $table) {
            $table->id();
            $table->integer('nr');
            $table->integer('rzad');
            $table->integer('nr_na_grid');
            $table->enum('rodzaj',['vip','normalny','ulgowy']);
            $table->timestamps();
            $table->unsignedBigInteger('cennik_id');
            $table->unsignedBigInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
            $table->foreign('cennik_id')->references('id')->on('cenniks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miejscas');
    }
};
