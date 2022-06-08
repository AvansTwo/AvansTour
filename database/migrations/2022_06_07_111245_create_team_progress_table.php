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
            //CompositeKey
            $table->primary(['team_id', 'question_id']);
            //Table properties
            $table->foreignId('team_id')->constrained('team')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('question')->cascadeOnDelete();
            $table->foreignId('answer_id')->constrained('answer')->cascadeOnDelete();
            $table->timestamp('created_at');
            $table->unsignedInteger('points');
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
