<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //migrations for the petstore table creates (alongside model) and template, into which it'll push
    public function up()
    {
        Schema::create('petstores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('store_name');
            $table->string ('location');
            $table->string('phone');
            $table->string('email');
        });
    }

   //when migrating again migrations get dropped and creates a new one

    public function down(): void
    {
        Schema::dropIfExists('petstores');
    }
};
