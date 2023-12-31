<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 class CreateProductsTable extends Migration {

     /**
      * Run the migrations.
      *
      * @return void
      */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('body')->nullable();
            $table->integer('dimensions')->nullable();
            $table->string('image');
            $table->integer('price')->nullable();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->boolean('new_arrival_product')->default(0);
            $table->boolean('referenced_product')->default(0);
            $table->timestamps();
        });
    }
     /**
      * Reverse the migrations.
      *
      * @return void
      */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
