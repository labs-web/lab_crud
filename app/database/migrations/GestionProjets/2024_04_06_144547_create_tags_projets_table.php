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
        Schema::create('tags_projets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('projet_id');
            $table->unsignedBiginteger('tag_id');
            $table->foreign('projet_id')->references('id')
                ->on('projets')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')
                ->on('tags')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_projets');
    }
};
