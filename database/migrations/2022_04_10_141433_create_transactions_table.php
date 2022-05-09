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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->dateTime('timeout')->nullable();
            $table->string('address', 255);
            $table->string('regency', 255);
            $table->string('province', 255);
            $table->double('total')->nullable();
            $table->double('shipping_cost')->nullable();
            $table->double('sub_total');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('courier_id')->unsigned();
            $table->foreign('courier_id')->references('id')->on('couriers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('proof_of_payment', 255)->nullable();
            $table->enum('status', ['pending', 'unpaid', 'paid', 'admin_verified', 'admin_notverified', 'admin_deliver', 'success', 'expired', 'canceled'])->default('pending');
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
        Schema::dropIfExists('transactions');
    }
};
