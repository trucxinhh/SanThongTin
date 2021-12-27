<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Truong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('Truong',function($table){
                $table->string('MaTr');
                $table->primary('MaTr');
                $table->string('TenTr');
                $table->string('LoaiTr');
                $table->string('HeDaoTao');
                $table->string('KhuVuc');
                $table->string('Tinh');
                $table->string('DiaChi');
                $table->string('Sdt', 30);
                $table->string('Email');
                $table->string('Website');

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Truong');
    }
}
