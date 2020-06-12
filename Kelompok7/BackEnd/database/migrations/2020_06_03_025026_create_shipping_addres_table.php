<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->bigInteger('user_id');
            $table->string('address', 255);
            $table->integer("province");
            $table->integer("city");
            $table->integer("district");
            $table->smallInteger("is_primary")->default(0);
            $table->smallInteger('status');
            $table->string("postal_code");
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
        Schema::dropIfExists('shipping_address');
    }
}