<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity'); //تعداد جای خالی
            $table->date('departure_date'); // تاریح رفت
            $table->boolean('is_best');// جزء بهترین ها هست یا نه
            $table->text('description');// توضیحات تور
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('image');// عکس تور
            $table->integer('reserved')->default(0); // چند جای خالی مانده
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
