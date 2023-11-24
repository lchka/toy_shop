<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('toys', function (Blueprint $table) {
            if (!Schema::hasColumn('toys', 'animal_id')) {
                $table->unsignedBigInteger('animal_id');
                $table->foreign('animal_id')->references('id')->on('animals')->onUpdate('cascade')->onDelete('restrict');
            }
        });
    }
    
    public function down()
    {
        Schema::table('toys', function (Blueprint $table) {
            // Specify the foreign key constraint name explicitly
            $table->dropForeign(['animal_id']);
            $table->dropColumn('animal_id');
        });
    }
};