<?php
// php artisan make:migration alter_table_funcionarios_add_relationship
// criou esse arquivo zerado...  Digitamos o UP e DOWNphp 


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableFuncionariosAddRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('funcionarios', function(Blueprint $table){
            $table->bigInteger('perfil_id')->unsigned()->index();  // Força campo só receber positivo e coluna indexada
            $table->bigInteger('user_id')->unsigned()->index();    // BigInter porque foi criado assim antes no banco.
 
            $table->foreign('perfil_id')
            ->references('id')
            ->on('perfis');
 
            $table->foreign('user_id')
            ->references('id')
            ->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('funcionarios', function(Blueprint $table){
            $table->dropColumn('perfil_id');
            $table->dropColumn('user_id');
        });

    }




}
