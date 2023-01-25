<?php

use App\Enums\UserRang;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('imie',50);
            $table->string('nazwisko',50);
            $table->enum('rodzaj',['admin','user'])->default('user');
            $table->string('email',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('data_urodzenia');
            $table->string('password');
            $table->rememberToken();
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

        Schema::dropIfExists('users');
    }
};
