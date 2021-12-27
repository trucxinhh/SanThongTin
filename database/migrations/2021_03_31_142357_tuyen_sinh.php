<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TuyenSinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TuyenSinh',function($table){
                $table->string('MaTr');
                $table->string('MaNg');
                $table->number('Nam');
                $table->string('MaPhgThuc');
                $table->string('ChiTieu');
                $table->string('HocPhi');
                $table->string('GhiChu');
                $table->string('ID_DC',30);
                //chưa tạo khóa gì cả
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TuyenSinh');
    }
}
