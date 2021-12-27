<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiemChuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DiemChuan',function($table){
                $table->string('ID_DC');
                $table->string('KhoiThi');
                $table->primary('KhoiThi','ID_DC');
                
                $table->string('DiemChuan');
                $table->string('GhiChu');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DiemChuan');
    }
}
