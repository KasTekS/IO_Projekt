<?php

use App\Enums\KategoriaFilm;
use App\Enums\KategoriaWiekowa;
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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('tytul',50);
            $table->date('data_premiery');
            $table->enum('kategoria',['akcja','bajka','dokumentalny','dramat','fantastyka','historyczny','komedia','romantyczny']);
            $table->string('czas_trwania',15);
            $table->enum('kategoria_wiekowa',['0+','7+','13+','16+','18+',]);
            $table->longText('opis');

            $table->boolean('czy_jest_grany');
            $table->string('okladka_link');
            $table->string('duze_zdj_link');

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
        Schema::dropIfExists('films');
    }
};

