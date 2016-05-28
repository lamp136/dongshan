<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodscatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodscates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->comment('分类名称');
            $table->string('pid',255)->comment('父级Id');
            $table->string('path',255)->comment('路径');
            $table->tinyInteger('status')->comment('状态');
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
        Schema::drop('goodscates');
    }
}
