<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100); // VARCHAR 100
            $table->text('description'); // TEXT NULL
            $table->decimal('price', 8, 2);
            $table->enum('size', ['small', 'medium', 'large', 'extra-large']);
            $table->string('url_image');
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
            $table->enum('code', ['solde', 'standard']);
            $table->string('reference', 200); // VARCHAR 200
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
