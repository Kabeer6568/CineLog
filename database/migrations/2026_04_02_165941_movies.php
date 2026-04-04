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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('original_title')->nullable();
            $table->text('overview');
            $table->year('release_year');
            $table->integer('run_time');
            $table->string('director');
            $table->string('country');
            $table->string('language');
            $table->decimal('budget', 15, 2)->nullable();
            $table->string('genre');
            $table->string('cast');
            $table->string('poster');
            $table->decimal('imdb_score', 3, 1)->nullable();
            $table->enum('content_rating', ['G','PG','PG-13','R','NC-17'])->nullable();
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
