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
        Schema::create('expert', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('insta_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();        
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
        Schema::dropIfExists('expert');
    }
};
