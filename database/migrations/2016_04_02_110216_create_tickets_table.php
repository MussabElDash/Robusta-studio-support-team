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
        Schema::create('tickets', function(Blueprint $table)
        {
            $table -> increments('id');
            $table -> string('name');
            $table -> text('description');
            $table -> timestamps();
            $table -> string('status');
            $table -> string('source');

            $table -> integer('priority_id') -> unsigned();
            $table -> integer('user_id') -> unsigned();
            $table -> integer('customer_id') -> unsigned();
            $table -> integer('creator_id') -> unsigned();
            $table -> integer('department_id') -> unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('creator_id')->references('id')->on('users');
            // $table->foreign('department_id')->references('id')->on('departments');
            // $table->foreign('priority_id')->references('id')->on('priorities');
            // $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function(Blueprint $table)
        {
            $table->dropForeign('tickets_user_id_foreign');
            $table->dropForeign('tickets_creator_id_foreign');

            // $table->dropForeign('tickets_department_id_foreign');
            // $table->dropForeign('tickets_priority_id_foreign');
            // $table->dropForeign('tickets_customer_id_foreign');
        });
        Schema::drop('tickets');
    }
}
