<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('digital_library_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date')->nullable();
            $table->string('size')->default('12MB');
            $table->string('extension')->default('PDF');
$table->text('file_url')->nullable();            $table->text('description')->nullable();
            $table->json('chapters')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('digital_library_books');
    }
};