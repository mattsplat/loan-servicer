<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->string('method');
            $table->date('date');

            $table->integer('loan_id')->unsigned()->index();
            $table->foreign('loan_id')
                ->references('id')->on('loans')
                ->onDelete('cascade');

            $table->integer('customer_id')->unsigned()->index();
            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onDelete('cascade');

            $table->integer('principal');
            $table->integer('interest');
            $table->integer('tax');
            $table->integer('insurance');
            $table->integer('fee')->default(0);
            $table->integer('balance');
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
        Schema::dropIfExists('payments');
    }
}
