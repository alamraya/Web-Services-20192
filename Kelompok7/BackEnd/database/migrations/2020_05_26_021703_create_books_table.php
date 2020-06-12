<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('author');
            $table->string('publisher');
            $table->string('cover');
            $table->float('price',20,2);
            $table->integer('views')->default(0);
            $table->integer('stock')->default(0);
            $table->enum('status', ['PUBLISH','DRAFT','DELETED']);
            $table->integer('create_by');
            $table->integer('deleted_by');
            $table->integer('updated_by');
            $table->timestamp('deleted_at');
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
        Schema::dropIfExists('books');
    }
}