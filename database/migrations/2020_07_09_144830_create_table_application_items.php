<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableApplicationItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('item_type')->nullable();
            $table->string('item_type_justification')->nullable();
            $table->decimal('price_per_unit', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('uom')->nullable();
            $table->decimal('total_items_price', 8, 2)->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
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
        Schema::dropIfExists('application_items');
    }
}
