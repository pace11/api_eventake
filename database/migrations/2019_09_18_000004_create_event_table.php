<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->integer('categories_id')->unsigned();
            $table->string('event_name');
            $table->string('event_desc');
            $table->string('event_img')->nullable();
            $table->date('event_date_start');
            $table->date('event_date_end');
            $table->time('event_time_start');
            $table->time('event_time_end');
            $table->string('event_venue');
            $table->string('event_address');
            $table->decimal('event_latitude', 10, 8);
            $table->decimal('event_longitude', 11, 8);
            $table->text('event_organizer');
            $table->integer('event_registrant_quota');
            $table->enum('event_active', array('active', 'inActive'));
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
