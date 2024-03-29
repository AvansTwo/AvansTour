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
        Schema::enableForeignKeyConstraints();
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('description');
            $table->string('image_url')->nullable();
            $table->string('location');
            $table->foreignId('category_id')->nullable()->constrained('category')->restrictOnDelete();
            $table->boolean('active')->default(0);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
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
        Schema::dropIfExists('tour');
    }
};
