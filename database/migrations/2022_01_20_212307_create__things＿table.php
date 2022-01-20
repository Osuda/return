<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThings＿table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('_things', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('thing', 50);
            $table->string('type', 50);
            $table->unsignedBigInteger('costs');
            $table->string('from_who', 50);
            $table->dateTime('from_when', 6);
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