<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // Назва події
            $table->text('content');     // Опис події
            $table->dateTime('event_time'); // Дата і час
            $table->string('location');    // Місце проведення
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Організатор
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Тип події
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
