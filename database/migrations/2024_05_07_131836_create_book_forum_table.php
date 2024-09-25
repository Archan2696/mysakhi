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
        Schema::create('book_forum', function (Blueprint $table) {
            $table->id();
            $table->string('ename')->nullable();
            $table->string('ecity')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('book_forum');
    }
};
