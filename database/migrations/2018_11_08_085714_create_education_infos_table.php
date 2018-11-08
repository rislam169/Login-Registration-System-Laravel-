<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_infos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->unsigned()->index()->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');

            $table->string('degree',10);
            $table->string('degree_name')->nullable();
            $table->string('institute');
            $table->string('board')->nullable();
            $table->string('passing_year');
            $table->string('duration')->nullable();
            $table->double('gpa',8,2)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_infos');
    }
}
