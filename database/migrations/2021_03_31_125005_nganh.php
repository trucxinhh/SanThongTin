<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nganh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Nganh',function($table){
                $table->string('MaNg');
                $table->primary('MaNg');
                $table->string('TenNg');
                $table->string('KhoiNganh');
                $table->text('ThongTin');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Nganh');
    }
}
