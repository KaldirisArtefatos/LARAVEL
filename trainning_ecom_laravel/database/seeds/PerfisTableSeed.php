<?php
// Comando que criou esse aquivo
// php artisan make:seeder PerfisTableSeed

// Incluiu use App\perfil

// Executou  para subir os caras no banco
// php artisan db:seed --class=PerfisTableSeed

use App\Perfil;
use Illuminate\Database\Seeder;

class PerfisTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create(["nome"=>"Administrador"]);
        Perfil::create(["nome"=>"Gerente"]);
        Perfil::create(["nome"=>"Vendedor"]);
    }
}
