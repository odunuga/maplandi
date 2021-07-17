<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_records', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->longText('cart')->nullable();
            $table->string('sub_total');
            $table->string('tax_added');
            $table->string('total');
            $table->string('payment_currency');
            $table->string('payment_symbol');
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
        Schema::dropIfExists('cart_records');
    }
}
