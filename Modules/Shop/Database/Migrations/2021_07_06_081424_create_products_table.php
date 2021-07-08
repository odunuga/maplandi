<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('sku')->unique();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->boolean('featured')->nullable()->default(false);
            $table->boolean('hot')->nullable()->default(false);
            $table->boolean('published')->nullable()->default(false);
            $table->boolean('available')->nullable()->default(true);
            $table->integer('report_count')->nullable()->default(0);
            $table->enum('product_type', ['sell', 'rent'])->nullable()->default('sell');

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
