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
        Schema::create('res', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('collage_id');
//            $table->foreign('collage_id')->references('id')->on('collages')->onDelete('cascade');
//            $table->unsignedBigInteger('class_id');
//            $table->foreign('class_id')->references('id')->on('classrooms')->onDelete('cascade');
////            $table->unsignedBigInteger('teacher_id');
//            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->string('subject_name')->nullable();
            $table->string('date_day');
            $table->string('start');
            $table->string('end');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('res');
    }
};
