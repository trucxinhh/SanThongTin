<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TinTuc',function($table){
                $table->increments('ID');
                $table->string('TieuDe');
                $table->text('MoTa');
                $table->text('NoiDung');
                $table->string('Thumnail');
                $table->number('NoiBat');
                $table->number('LuotXem');
                $table->string('ID_LoaiTin');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TinTuc');
    }
}
