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
        Schema::table('about_mes', function (Blueprint $table) {
            $table->renameColumn('introduction', 'about_me');
            $table->renameColumn('career_goal', 'future_goals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_mes', function (Blueprint $table) {
            $table->renameColumn('about_me', 'introduction');
            $table->renameColumn('future_goals', 'career_goal');
        });
    }
};
