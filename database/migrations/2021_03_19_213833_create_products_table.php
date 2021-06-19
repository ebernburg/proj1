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
            $table->bigIncrements('id');
            $table->string('image')->nullable()->default('/storage/photos/1/no_image.png');
            $table->integer('sort')->default(0);
            $table->unsignedBigInteger('product_category_id')->unsigned();
            $table->unsignedBigInteger('supplier_id')->unsigned();
            $table->double('price');
            $table->string('slug')->unique();
            $table->string('name');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
        });

        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['product_id', 'locale']);
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
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
        Schema::dropIfExists('product_translations');
    }
}
