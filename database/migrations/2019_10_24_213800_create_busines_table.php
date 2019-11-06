<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image');
            $table->string('watsapp');
            $table->string('addres');
            $table->string('longitude');
            $table->string('latitude');
            $table->text('description');
            $table->string('site');
            $table->unsignedBigInteger('categoria_id');
            $table->longText('description_long');
            $table->unsignedBigInteger('user_id');
            $table->string('slug');
            $table->string('images');
            $table->string('busine_relation');
            $table->timestamps();

            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busines');
    }
}
