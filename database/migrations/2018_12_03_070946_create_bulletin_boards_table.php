<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulletinBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->text('title');
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
        Schema::table('bulletin_boards', function (Blueprint $table) {
            $table->dropForeign('bulletin_boards_classroom_id_foreign');
        });
        Schema::dropIfExists('bulletin_boards');
    }
}
