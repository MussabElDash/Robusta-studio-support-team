<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table)
        {
            $table->increments('id');

            $table->string('name');
            $table->text('description');
            $table->boolean('open')->default(true);

            $table->integer('creator_id')->unsigned();
            $table->integer('priority_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('customer_id')->unsigned();

            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

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
        Schema::drop('tickets');
    }
}
