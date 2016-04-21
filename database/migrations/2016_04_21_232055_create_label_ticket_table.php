<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabelTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('label_ticket', function ( Blueprint $table )
        {
            $table->incremets('id');
            $table->integer('label_id')->unsigned();
            $table->integer('ticket_id')->unsigned();

            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('label_ticket');
    }
}
