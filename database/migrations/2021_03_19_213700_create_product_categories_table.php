<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sort')->default(0);
            $table->integer('parent_id')->default(0);
            $table->string('slug')->unique();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('product_category_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_category_id')->unsigned();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('locale')->index();
            $table->unique(['product_category_id', 'locale']);
            $table->foreign('product_category_id')
                ->references('id')->on('product_categories')
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
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('product_category_translations');
    }
}
