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
        //The defaultEmail column has a unique constraint. Remove it
        Schema::table('clients', function (Blueprint $table) {
            $table->string('defaultEmail')->nullable()->change();
            $table->dropUnique(['defaultEmail']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
