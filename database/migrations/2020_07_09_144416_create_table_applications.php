<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('justfication');
            $table->integer('budget_type_id');
            $table->integer('usage_type_id');
            $table->decimal('total_price_applied', 8, 2);
            $table->decimal('total_price_approved', 8, 2);
            $table->integer('dean_status_id');
            $table->string('dean_remark')->nullable();
            $table->integer('bursary_status_id');
            $table->string('bursary_remark')->nullable();
            $table->unsignedBigInteger('application_item_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
