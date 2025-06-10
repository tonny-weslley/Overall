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
        Schema::create('player_groups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->boolean('is_admin')->default(false);
            $table->foreignUuid('player_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('group_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_groups');
    }
};
