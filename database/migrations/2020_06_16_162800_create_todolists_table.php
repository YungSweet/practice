<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodolistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->integer('list_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('description');
            $table->integer('urgency');
            $table->boolean('done')->default(false);
            $table->timestamps();
        });

        Schema::table('todolists', function (Blueprint $table) {
            $table->foreign('list_id')->references('id')->on('listalls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todolists');
    }
}
