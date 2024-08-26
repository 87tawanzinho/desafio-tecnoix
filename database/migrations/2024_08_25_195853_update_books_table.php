<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
       
            $table->dropColumn('publication_year');
         
            $table->string('publishedDate')->nullable();
            $table->string('language')->nullable()->after('publishedDate');
            $table->string('city')->nullable()->after('language');
            $table->string('state')->nullable()->after('city');
            $table->string('neighborhood')->nullable()->after('state');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
        });
    }
};
