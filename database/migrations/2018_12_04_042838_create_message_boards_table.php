<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->integer('object');
            $table->text('content');
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
        Schema::table('message_boards', function (Blueprint $table) {
            $table->dropForeign('message_boards_classroom_id_foreign');
            $table->dropForeign('message_boards_student_id_foreign');
            $table->dropForeign('message_boards_teacher_id_foreign');
        });
        Schema::dropIfExists('message_boards');
    }
}
