<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePerfis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // RODOU php artisan make:migration create_table_perfis    -- para criar este aquivo 
        // tirou o table da linha abaixo
        // definiu em Perfil.php   =  protected $table='perfis';
        //  Schema::create('table_perfis', function (Blueprint $table) {
        // Depois de tudo rodou para criar no banco:  php artisan migrate...
            
            Schema::create('perfis', function (Blueprint $table) {
            $table->bigIncrements('id'); // Se fosse apenas Increments criaria um campo inteiro.
            $table->string('nome',50);   // Cria um VARCHAR no banco...
            $table->timestamps();        // Cria no banco   created_at,updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfis');
    }
}
