<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer("user_id");
            $table->float("total_price",20,2)->default(0);
            $table->string("invoice_number");
            $table->integer("status");
            $table->float("postal_fee",20,2)->nullable()->default(0);
            $table->string("awb")->nullable();
            $table->string("courier")->nullable();
            $table->bigInteger('shipping_address_id');
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