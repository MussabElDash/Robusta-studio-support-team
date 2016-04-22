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
            // Columns
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->boolean('open')->default(true);
            $table->boolean('vip')->default(false);

            // Required
            $table->integer('creator_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('customer_id')->unsigned();

            // Optional
            $table->integer('priority_id')->unsigned()->nullable()->default(null);
            $table->integer('assigned_to')->unsigned()->nullable()->default(null);

            // DB Relations
            $table->foreign('priority_id')->references('id')->on('priorities');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('assigned_to')->references('id')->on('users');

            // Cascading
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
