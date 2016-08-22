<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarborsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harbors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pod')->unique(); //kode pelabuhan
            $table->string('podname'); //nama pelabuhan
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
        Schema::drop('harbors');
    }
}
