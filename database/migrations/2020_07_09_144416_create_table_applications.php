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
            $table->string('title')->nullable();
            $table->string('justification')->nullable();
            $table->integer('budget_type_id')->nullable();
            $table->integer('usage_type_id')->nullable();
            $table->decimal('total_price_applied', 8, 2)->nullable();
            $table->decimal('total_price_approved', 8, 2)->nullable();
            $table->integer('dean_status_id')->nullable();
            $table->string('dean_remark')->nullable()->nullable();
            $table->integer('bursary_status_id')->nullable();
            $table->string('bursary_remark')->nullable()->nullable();
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
        Schema::dropIfExists('applications');
    }
}
