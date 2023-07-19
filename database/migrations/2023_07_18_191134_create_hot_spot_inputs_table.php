<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotSpotInputsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hot_spot_inputs', function (Blueprint $table) {
            $table->id();
            $table->integer('input_left');
            $table->integer('input_top');
            $table->integer('content_left');
            $table->integer('content_top');
            $table->integer('label_left');
            $table->integer('label_top');
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('hot_spot_inputs');
    }
};
