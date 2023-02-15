<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('id_order')->unsigned();
            $table->integer('id_product')->unsigned()->nullable();
            $table->string('name', 100);
            $table->decimal('price', 10, 2)->unsigned();
            $table->integer('quantity')->unsigned()->default(1);
            $table->decimal('cost', 10, 2)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
