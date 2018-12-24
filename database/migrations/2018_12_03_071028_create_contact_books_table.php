<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->text('today_info');
            $table->text('tomorrow_info');
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
        Schema::table('contact_books', function (Blueprint $table) {
            $table->dropForeign('contact_books_classroom_id_foreign');
        });
        Schema::dropIfExists('contact_books');
    }
}
