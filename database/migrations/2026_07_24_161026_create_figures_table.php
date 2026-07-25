<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('figures', function (Blueprint $table) {
            $table->id();
            $table->string('name');         // اسم الشخصية
            $table->string('title')->nullable(); // اللقب أو الصفة
            $table->text('bio');            // النبذة التاريخية
            $table->string('image')->nullable(); // رابط أو مسار الصورة
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('figures');
    }
};