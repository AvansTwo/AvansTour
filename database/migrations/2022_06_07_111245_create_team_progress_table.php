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
        Schema::create('team_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('team')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('question')->cascadeOnDelete();
            $table->foreignId('team_answer_id')->constrained('team_answer')->cascadeOnDelete();
            $table->unsignedInteger('points');
            $table->enum('status', ['Afwachting', 'Nagekeken']);
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
        Schema::dropIfExists('team_progress');
    }
};
