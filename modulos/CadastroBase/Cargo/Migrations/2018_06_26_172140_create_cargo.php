<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        
        Schema::create('tb_cadastro_base_cargo', function(Blueprint $table){

            $table->increments('CO_CADASTRO_BASE_CARGO')->comment('Codigo do cargo (Primary Key).');
            $table->timestamp('DT_CADAS')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data e Hora cadastro cargo.');
            $table->string('NO_CARGO', 80)->comment('Nome do cargo.');
            $table->text('DS_CARGO')->nullable()->comment('Descricao do cargo.');

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::drop('tb_cadastro_base_cargo');

    }
}
