<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->integer('term');
            $table->float('rate');
            $table->integer('start_amount');
            $table->integer('balance');
            $table->integer('payment_day');

            $table->integer('customer_id')->unsigned()->index();
            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');

            $table->integer('lender_id')->unsigned()->index();
            $table->foreign('lender_id')
                ->references('id')->on('lenders')
                ->onDelete('cascade');

            $table->integer('property_id')->unsigned()->index();
            $table->foreign('property_id')
                ->references('id')->on('properties')
                ->onDelete('cascade');

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
        Schema::dropIfExists('loans');
    }
}
