<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('thing', 50);
            $table->string('type', 50);
            $table->unsignedBigInteger('costs')->default(0);
            $table->string('from_who', 50);
            $table->dateTime('to_when', 6);
            $table->dateTime('from_when', 6);
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_things');
    }
}