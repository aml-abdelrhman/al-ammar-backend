<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('charity_initiatives', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // لتصنيف المبادرة (مشاريع عامة، الإسكان، إلخ)
            $table->string('title');
            $table->text('desc');
            $table->string('target');
            $table->string('remaining');
            $table->integer('progress');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('charity_initiatives');
    }
};