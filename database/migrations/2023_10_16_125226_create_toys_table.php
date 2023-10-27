<?php


// everytime a migration is run ive noticed that it forget the login details


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * creates the fake data that is passed from the seeder through a migration
     */
    public function up()
    {
        Schema::create('toys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('colour');
            $table->string('size');
            $table->string('type');
            $table->string('toy_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('toys');
    }
};
