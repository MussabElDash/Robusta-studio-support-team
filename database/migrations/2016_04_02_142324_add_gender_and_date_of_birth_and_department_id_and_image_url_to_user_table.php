<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenderAndDateOfBirthAndDepartmentIdAndImageUrlToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('gender')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');

            $table->string('image_url')->unique()->nullable();

            $table->string('slug')->unique();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('department_id');
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('department_id');
            $table->dropColumn('image_url');
            $table->dropColumn('slug');
        });
    }
}
