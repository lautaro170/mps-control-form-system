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
        #add the json_values column to the forms table
        Schema::table('forms', function (Blueprint $table) {
            $table->json('json_values')->nullable()->after('description')->comment('JSON values for the form');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        #remove the json_values column from the forms table
        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn('json_values');
        });
    }
};
