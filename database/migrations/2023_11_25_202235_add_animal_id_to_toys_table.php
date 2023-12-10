<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('toys', function (Blueprint $table) {
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animals')->onUpdate('cascade')->onDelete('cascade'); 
            // had to change ondelete restrict to cascade so it deletes the rest of the toys as it wasnt matching the integriy.
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */

    public function down(): void
    {
        Schema::table('toys', function (Blueprint $table) {
            $table->dropForeign(['animal_id']);//if table exists drop it. Has an isseu with this as the migrations would fully run and error on this, that was due it trying to drop a table that didn't exist. So down was commented out, ran without it, and finally seeded. Then it was commented back in and and migrated and seeded again. So we went around this issue
            $table->dropColumn('animal_id');
        });
    }
};