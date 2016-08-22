<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->integer('harbor_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->dateTime('date');
            $table->bigInteger('netwt');
            $table->bigInteger('value');
            $table->timestamps();

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');

            $table->foreign('harbor_id')
                ->references('id')
                ->on('harbors')
                ->onDelete('cascade');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('imports');
    }
}
