<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('petstore_toy', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('petstore_id');
            $table->unsignedBigInteger('toy_id');

            $table->foreign('petstore_id')->references('id')->on('petstores')->onUpdate('cascade')->onDelete('restrict'); //restrict might need to be changed since it messes with the integrity
            $table->foreign('toy_id')->references('id')->on('toys')->onUpdate('cascade')->onDelete('restrict');

            $table->timestamps();
        });
    }

   //when migrating again migrations get dropped and creates a new one
    public function down(): void
    {
        Schema::dropIfExists('petstore_toy');
    }
};
