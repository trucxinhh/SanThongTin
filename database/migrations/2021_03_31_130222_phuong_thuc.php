<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhuongThuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PhuongThuc',function($table){
                $table->string('MaPhgThuc');
                $table->primary('MaPhgThuc');
                $table->string('TenPhgThuc');
                $table->string('DoiTuong');
                $table->text('ChiTiet');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PhuongThuc');
    }
}
