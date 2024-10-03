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
        Schema::create('book_areas', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('short_title')->nullable();
            $table->string('main_title')->nullable();
            $table->text('short_desc')->nullable();
            $table->string('link_url')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_areas');
    }
};
