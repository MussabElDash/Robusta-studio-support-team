<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriorityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Priority', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');

            $table->text('description')->nullable();
            $table->string('background_color_id')->nullable();
            $table->string('name_color_id')->nullable();

            $table->string('slug')->unique();
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
        Schema::drop('Priority');
    }
}
