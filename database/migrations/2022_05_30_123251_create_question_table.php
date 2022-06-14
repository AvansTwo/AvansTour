<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('description');
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('gps_location')->nullable();
            $table->integer('points')->default(0);
            $table->enum('type', ['Meerkeuze', 'Open', 'Media']);
            $table->foreignId('tour_id')->constrained('tour')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
};
