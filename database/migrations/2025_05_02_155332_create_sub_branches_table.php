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
        Schema::create('sub_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id'); // Column ki name e hobe
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade'); // Branch er sathe link korlam
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_branches');
    }
};
