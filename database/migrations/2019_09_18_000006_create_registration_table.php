<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->bigIncrements('user_id')->unsigned();
            $table->string('event_id', 32);
            $table->integer('payment_id')->unsigned();
            $table->timestamp('registration_datetime_in')->nullable();
            $table->timestamp('registration_datetime_out')->nullable();
            $table->enum('registration_status', array('active', 'cancel', 'pending', 'finish'));

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration');
    }
}
