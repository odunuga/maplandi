<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_type', ['pay_now', 'pay_on_delivery']);
            $table->string('user_id');
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->string('status')->nullable()->default(false);
            $table->longText('message')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('reference')->unique();
            $table->string('amount');
            $table->string('payment_message')->nullable();
            $table->string('gateway_response')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->string('channel')->nullable();
            $table->string('currency')->nullable();
            $table->longText('cart')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('tax_added')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->string('fees')->nullable();
            $table->longText('conditions')->nullable();
            $table->string('customer_code')->nullable();
            $table->boolean('transaction_confirmed')->nullable()->default(false);
            $table->integer('delivery_status')->nullable()->default(0);
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
        Schema::dropIfExists('orders');
    }
}
