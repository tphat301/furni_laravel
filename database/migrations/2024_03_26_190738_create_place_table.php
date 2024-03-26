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
    Schema::create('place', function (Blueprint $table) {
      $table->id();
      $table->string('id_parent', 255)->nullable();
      $table->string('level', 255)->nullable();
      $table->string('title', 255);
      $table->string('type', 255)->nullable();
      $table->string('num', 255)->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('place');
  }
};
