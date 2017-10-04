<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_number')->unique();
            $table->string('title');
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender')->nullable();
            $table->string('student_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('current_address')->nullable();
            $table->date('date_of_admission')->nullable();
            $table->date('date_of_completion')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
